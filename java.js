// script.js — JS-driven infinite spin (wrap) + deceleration to center matched card
document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.slider');
  const track = document.querySelector('.slider-track');
  let cards = Array.from(track.querySelectorAll('.card'));
  const userDivision = (document.body.dataset.userDivision || '').trim();

  if (!slider || !track || cards.length === 0) {
    console.warn('Missing .slider, .slider-track or .card elements.');
    return;
  }
  if (!userDivision) {
    console.warn('data-user-division kosong.');
    return;
  }

  // --- remove any CSS keyframe autoplay if masih ada ---
  track.style.animation = 'none';
  track.style.willChange = 'transform';
  track.style.transition = ''; // pastikan tidak ada transition saat spin

  // --- sizes & cloning for looping ---
  const cardWidth = cards[0].offsetWidth || 250;
  const originalCount = cards.length;
  const originalSetWidth = cardWidth * originalCount;

  // clone original set and append to allow seamless wrap
  const clones = cards.map(c => c.cloneNode(true));
  clones.forEach(clone => track.appendChild(clone));

  // refresh cards (now includes clones)
  cards = Array.from(track.querySelectorAll('.card'));

  // Optional: set explicit track width so layout stabil
  track.style.width = `${cardWidth * cards.length}px`;

  // --- spin params (tweak as needed) ---
  const autoplayMs = 3000;   // waktu muter bebas sebelum decel
  const decelMs = 1000;      // durasi deceleration
  const cardsPerSecond = 8;  // tuning feel spin speed
  let speed = (cardWidth * cardsPerSecond) / 1000; // px per ms

  // state
  let translate = 0; // current translateX (px)
  let last = performance.now();
  let rafId = null;
  let spinning = true;

  // manual spin loop
  function spinFrame(now) {
    const dt = now - last;
    last = now;
    if (spinning) {
      translate -= speed * dt; // bergerak ke kiri

      // wrap: jika sudah melewati satu set asli, tambahkan originalSetWidth
      if (translate <= -originalSetWidth) {
        // tambahkan untuk 'mengembalikan' posisi ke awal set secara seamless
        translate += originalSetWidth;
        // apply transform immediately (no transition)
        track.style.transform = `translateX(${translate}px)`;
      } else {
        track.style.transform = `translateX(${translate}px)`;
      }

      rafId = requestAnimationFrame(spinFrame);
    }
  }

  // mulai spin
  rafId = requestAnimationFrame(spinFrame);

  // ketika autoplay selesai -> stop spin dan lakukan deceleration ke kartu target
  setTimeout(() => {
    spinning = false;
    if (rafId) cancelAnimationFrame(rafId);

    // current translate sudah ada di variable translate
    const currentTranslate = translate;

    // cari semua instance kartu yang cocok (termasuk clones)
    const matches = cards.filter(c => ((c.dataset.division || '').trim() === userDivision));
    if (matches.length === 0) {
      console.warn('No matching cards for division:', userDivision);
      return;
    }

    // hitung centre slider (viewport coords)
    const sliderRect = slider.getBoundingClientRect();
    const sliderCenter = sliderRect.left + sliderRect.width / 2;

    // pilih instance match yang paling dekat dengan tengah saat ini
    let best = null;
    let bestDist = Infinity;
    matches.forEach(c => {
      const r = c.getBoundingClientRect();
      const cCenter = r.left + r.width / 2;
      const dist = Math.abs(cCenter - sliderCenter);
      if (dist < bestDist) {
        bestDist = dist;
        best = { el: c, center: cCenter };
      }
    });

    if (!best) {
      console.warn('Tidak dapat menemukan instance terbaik.');
      return;
    }

    // hitung delta px supaya center kartu == center slider
    const deltaPx = sliderCenter - best.center;
    const targetTranslate = currentTranslate + deltaPx;

    // lakukan deceleration (easeOutCubic)
    const startTime = performance.now();
    function decelFrame(now) {
      const t = Math.min(1, (now - startTime) / decelMs);
      const ease = 1 - Math.pow(1 - t, 3);
      const tx = currentTranslate + (targetTranslate - currentTranslate) * ease;
      track.style.transform = `translateX(${tx}px)`;
      if (t < 1) {
        requestAnimationFrame(decelFrame);
      } else {
        // finalize exact position and beri highlight
        track.style.transform = `translateX(${targetTranslate}px)`;
        best.el.classList.add('is-active');
      }
    }
    requestAnimationFrame(decelFrame);

  }, autoplayMs);

  // optional: jika ingin recompute ukuran saat resize
  window.addEventListener('resize', () => {
    // recompute basic sizes jika diperlukan (bisa diperluas)
  });
});
