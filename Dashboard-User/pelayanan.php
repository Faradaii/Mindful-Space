<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan</title>

    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/pelayanan.css">
    <link rel="stylesheet" href="styling/nav-pelayanan.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php 
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
        header("location: ../Login-Register/LoginForm.php");
    }
?>

<?php 

$navButton = "LOG IN";

session_start();
if (isset($_SESSION['role'])) {
    $navButton = "DASHBOARD";
}

?>
    
<nav>
        
    <div class="logo">
        <h1>MINDFUL <span>SPACE</span></h1>
    </div>

    <div class="navigation">

        <ul>

            <a href="../Homepage/HomePage-Visitor.php">
                <li class="beranda">Beranda</li>
            </a>
        
            <li class="fasilitas__hover">

                <input type="radio" name="nav" id="fasilitas">
                <label for="fasilitas" class="fasilitas__check">Fasilitas <i class="fa fa-chevron-down"></i></label>              

            </li>
            
            <li class="layanan__hover">

                <input type="radio" name="nav" id="layanan">
                <label for="layanan" class="layanan__check">Layanan <i class="fa fa-chevron-down"></i></label>

                <ul class="layanan__dropdown dropdown">
                    <a href="konseling.php">
                        <li>Konseling</li>
                    </a>
                    </a>
                    <a href="tesmental.php">
                        <li>Tes Kesehatan Mental</li>
                    </a>
                </ul>       

            </li>

            <li><hr></li>

            <a href="../Login-Register/LoginForm.php" class="login">
                <li><?php echo $navButton ?></li>
            </a>

            <!-- Garis biru dibawah navigasi -->
            <div class="underline"></div>

        </ul>

    </div>

</nav>

<br><br><br><br>
<br><br><br><br>

<main>

    <h1>Fasilitas Kami.</h1>

    <br><br><br>

    <div class="gambar_kiri">

        <div>
            <img src="https://img.freepik.com/free-vector/hand-drawn-collage-background_23-2149590537.jpg?t=st=1687683797~exp=1687684397~hmac=6b19ee673bc1328de79f4abc853a804b5464323721c2dddbe1dd95e4c5fd6e60" alt="">
        </div>

        <div class="text">

            <h3>Terbuka 24 jam</h3>
            <br>
            <p>24 jam menempatkan tim medis yang siap siaga setiap saat, termasuk dokter, perawat, petugas medis, 
                dan tenaga kesehatan lainnya. Mereka bekerja dalam shift yang berkesinambungan untuk memastikan 
                adanya personel yang tersedia untuk merespons keadaan darurat, memberikan perawatan mendesak, 
                dan memberikan perhatian medis kepada pasien</p>
        
        </div>
        
    </div>

    <br><br>

    <div class="gambar_kanan">

        <div class="text">

            <h3 style="text-align:right;">Rehabilitas</h3>
            <br>
            <p>Program rehabilitasi di rumah sakit melibatkan tim multidisiplin yang terdiri dari dokter, fisioterapis, 
                terapis okupasi, terapis bicara, psikolog, dan ahli lainnya yang bekerja sama untuk menyusun rencana 
                perawatan dan pemulihan yang sesuai dengan kebutuhan pasien</p>
            
        </div>

        <div>
            <img src="https://img.freepik.com/free-vector/hand-drawn-collage-background_23-2149590537.jpg?t=st=1687683797~exp=1687684397~hmac=6b19ee673bc1328de79f4abc853a804b5464323721c2dddbe1dd95e4c5fd6e60" alt="">
        </div>

    </div>

    <br><br>

    <div class="gambar_kiri">

        <div>
            <img src="https://img.freepik.com/free-vector/hand-drawn-collage-background_23-2149590537.jpg?t=st=1687683797~exp=1687684397~hmac=6b19ee673bc1328de79f4abc853a804b5464323721c2dddbe1dd95e4c5fd6e60" alt="">
        </div>

        <div class="text">

            <h3>Sigap dan cepat</h3>
            <br>
            <p>setiap petugas medis dan tenaga kesehatan dilatih untuk merespons dengan cepat dan efektif 
                terhadap situasi darurat atau kebutuhan mendesak pasien. Mereka siap siaga dan mampu 
                mengambil tindakan segera untuk mengatasi masalah kesehatan yang membutuhkan perhatian mendesak, 
                seperti kecelakaan, serangan jantung, atau kegawatdaruratan lainnya</p>

        </div>

    </div>

    <br><br>

    <div class="gambar_kanan">
        
        <div class="text">

            <h3 style="text-align:right;">Memiliki banyak tenaga kerja</h3>
            <br>
            <p>banyak tenaga kerja memiliki keunggulan dalam memberikan pelayanan kesehatan yang komprehensif dan berkualitas. 
                Tenaga kerja yang memadai dan beragam dalam rumah sakit memungkinkan penyediaan layanan medis yang luas, 
                perawatan yang personal, dan penanganan kondisi medis yang kompleks</p>

        </div>

        <div>
            <img src="https://img.freepik.com/free-vector/hand-drawn-collage-background_23-2149590537.jpg?t=st=1687683797~exp=1687684397~hmac=6b19ee673bc1328de79f4abc853a804b5464323721c2dddbe1dd95e4c5fd6e60" alt="">
        </div>

    </div>

</main>

<br><br><br><br><br><br>

<footer>

    <div class="top">

        <div class="logo footer">
            <h1>MINDFUL <span>SPACE</span></h1>
        </div>

        <div class="kontak">
            <h2>Ikuti kami di</h2>

            <div>
                <a target="_blank" href="https://wa.me/+628113978683"><i class="fa-brands fa-square-whatsapp"></i></a>
                <a target="_blank" href="https://www.instagram.com/Made_Budhi"><i class="fa-brands fa-square-instagram"></i></a>
                <a target="_blank" href="https://www.github.com/Made-Budhi"><i class="fa-brands fa-square-github"></i></a>
            </div>
        </div>
    
    </div>

        <div class="copyright">
            <p>	&#169; MINDFUL SPACE, 2023. ALL RIGHTS RESERVED</p>
        </div>

</footer>

<script src="styling/script.js"></script>

</body>
</html>