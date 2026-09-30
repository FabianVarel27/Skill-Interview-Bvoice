<?php
include "config.php";
$noujian = $_POST['noujian']; // Get the value from the form

// Prepare the SQL query
$sql = "SELECT * FROM skill WHERE noujian LIKE ?";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Interview Result</title>
    <link rel="stylesheet" href="style2.css"/>
    <link rel="icon" href="aset/GONENG-01.png" type="image/png">


    <script defer src="script.js"></script>
</head>

<body>
    <header>
        <a class="logo" href="index.php#home">
            <img src="/aset/BVOICE LOGO.png" width="120" alt="logo" />
        </a>
        <nav>
            <ul class="nav__links">
                <li><a href="index.php#home">Home</a></li>
                <li><a href="#contact">Contact Person</a></li>
                <li><a href="https://www.bvoiceradio.com/">Official Website</a></li>
            </ul>
        </nav>
        <div class="hamburger-container">
            <button id="hamburger-btn">
                <div class="hamburger-icon">
                    <span></span><span></span><span></span><span></span>
                </div>
            </button>
        </div>
    </header>

    <!-- <div id="mobile-menu">
        <button id="close-menu-btn"></button>
        <ul>
            <li><a href="#home" class="mobile-menu-link">Home</a></li>
            <li><a href="#contact" class="mobile-menu-link">Contact Us</a></li>
            <li><a href="https://www.bvoiceradio.com/" target="_blank" class="mobile-menu-link">Official Website</a></li>
        </ul>
    </div> -->
    <div>

    <div class="hero">
        <h1>RESULT</h1>
        <h3>
            <!-- <?php  
            if ($stmt = $conn->prepare($sql)) {
                // Bind the parameter
                $stmt->bind_param("s", $noujian);

                // Execute the query
                $stmt->execute();

                // Get the result set
                $result = $stmt->get_result();
                
                // Check the number of rows
                $num_rows = $result->num_rows;

                if ($num_rows == 0) {
                    // No results found, display the failure message inside the title
                    echo "<br><span style='color: red; font-size: 24px;'>
                            Harap masukkan ulang NIM anda atau coba hubungi Contact Person.
                        </span>";
                } else {
                    // Results found, display the interview result
                    while ($data = $result->fetch_assoc()) {
                        $ket = $data['ket'];
                        $nama = strtoupper(htmlspecialchars($data['name']));
                        $divisi = strtoupper(htmlspecialchars($data['jurusan']));
                        $msg = '';

                        if (strtolower(trim($ket)) == "lolos") {
                            // Passed the interview (gacha style)
                            $msg = "
                            <div style='text-align: center; color: white; font-size: 26px; font-weight: bold;'>
                                <p>🎰 <span style='color: #FFD700;'>ROLLING...</span> 🎰</p>
                                <p>✨ Selamat, <span style='color: #4E9EFF;'>$nama</span>! ✨</p>
                                <p>Kamu lolos skill interview sebagai 👉 
                                    <span style='color: #02DCA2;'>DIVISI $divisi</span> 👈
                                </p>
                            </div>";

                            $slider = '<div class="body-slider">
                                <div class="slider">
                                    <div class="slider-track">
                                        <div class="card-track" data-division="ANNOUNCER">
                                            <h1>Announcer</h1>
                                            <img src="/aset/ANNOUNCER.png" alt="">
                                        </div>
                                        <div class="card-track" data-division="REPORTER">
                                            <h1>Reporter</h1>
                                            <img src="/aset/REPORTER.png" alt="">
                                        </div>
                                        <div class="card-track" data-division="MUSIC LISTER">
                                            <h1>Music Lister</h1>
                                            <img src="/aset/MUSIC LISTER.png" alt="">
                                        </div>
                                        <div class="card-track" data-division="CREATIVE">
                                            <h1>Creative</h1>
                                            <img src="/aset/CREATIVE.png" alt="">
                                        </div>
                                        <div class="card-track" data-division="MARKETING">
                                            <h1>Marketing</h1>
                                            <img src="/aset/Marketing.png" alt="">
                                        </div>
                                        <div class="card-track" data-division="OPERATOR">
                                            <h1>Operator</h1>
                                            <img src="/aset/OPERATOR.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>';

                        } else {
                            // Failed the interview
                            $msg = "
                            <div style='text-align: center; color: white; font-size: 24px; font-weight: bold;'>
                                <p>😢 Mohon maaf, <span style='color: #FF5555;'>$nama</span>.</p>
                                <p>Kamu <span style='color: red;'>BELUM BERHASIL LOLOS</span> pada tahap Skill Interview.</p>
                            </div>";
                        }

                        // Output message
                        echo "<br>$msg";
                    }
                }

                // Close the statement
                $stmt->close();
            }
            ?> -->
        </h3>
        
        <div class="polygon">
            <img src="/aset/Polygon 2.png" alt="" class="polygon1">
            <img src="/aset/Polygon 2.png" alt="" class="polygon2">
        </div>
    </div>

    <div class="balok">.</div>

    <div class="division">
        <h1>DIVISION</h1>
        
        <div class="card-division">
            <div class="card">
                <h1>Announcer</h1>
                <div class="image">
                    <img src="/aset/ANNOUNCER.png" alt="" class="">
                </div>

                <div class="text">
                    <ol>
                        <li>Enhance your announcing & public speaking skills.</li>
                        <li>Discover more about voice over.</li>
                        <li>Gain MC experience at various events.</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <h1>Creative</h1>

                <div class="image">
                    <img src="/aset/CREATIVE.png" alt="" class="">
                </div>

                <div class="text">
                    <ol>
                        <li>Design engaging visual. </li>
                        <li>Master your editing skills. </li>
                        <li>Showcase creativity through impactful visuals. </li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <h1>Marketing</h1>

                <div class="image">
                    <img src="/aset/Marketing.png" alt="">
                </div>

                <div class="text">
                    <ol>
                        <li>Create sponsorship and digital marketing strategies. </li>
                        <li>Building external relationships with media and brands. </li>
                        <li>Sharpen your negotiations skills. </li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <h1>Music Lister</h1>
                
                <div class="image">
                    <img src="/aset/MUSIC LISTER.png" alt="">
                </div>

                <div class="text">
                    <ol>
                        <li>curate playlist for broadcast</li>
                        <li>Build Connection with musicians and music labels. </li>
                        <li>Approach guest stars. </li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <h1>Operator</h1>

                <div class="image">
                    <img src="/aset/OPERATOR.png" alt="">
                </div>

                <div class="text">
                    <ol>
                        <li>Develop your audio mixing skills.</li>
                        <li>Create remixe of jingles and songs. </li>
                        <li>Manage Sound installation On-Air & Off-Air. </li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <h1>Reporter</h1>

                <div class="image">
                    <img src="/aset/REPORTER.png" alt="">
                </div>

                <div class="text">
                    <ol>
                        <li>Upgrade your copywriting skills.</li>
                        <li>Elevate your journalism skills. </li>
                        <li>Live report at various events for free. </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="text-contact">
            <h1>CONTACT PERSON</h1>
            <p>If you have any inquiries, please contact our team below:</p>
        </div>

        <div class="box-contact">
            <h1>Bella Alexandria</h1>

            <div class="medsos">
                <div class="email">
                    <img src="/aset/icon_email-removebg-preview.png" alt="">
                    <p>anandadona123@gmail.com</p>
                </div>
                
                <div class="whatsapp">
                    <img src="/aset/c7aac02f70336a4669ba3c370f26448e.jpg" alt="">
                    <p>081298977599</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="logo-big">
                <a href="https://www.bvoiceradio.com/"><img src="../aset/logo.png" alt="Logo Big"></a>
            </div>
            <div class="info">
                <h1>Media Informasi Audio Universitas Bina Nusantara - BVoice Radio</h1>
                <p>First Floor, Binus University Kampus Anggrek</p>
                <p>Jl. Kebon Jeruk Raya No, 27, Kemanggisan,</p>
                <p>Jakarta Barat 15130</p>
            </div>
        </div>
        <h2>Copyright 2025. Made with ♥️ by IT & Web Development</h2>
    </footer>
</body>
</html>

<?php
// Close the MySQLi connection
$conn->close();
?>