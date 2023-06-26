<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | User</title>

    <!-- Styling -->
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/nav-style.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">
    <link rel="stylesheet" href="styling/dashboard-style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
session_start();
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;

include 'realtime.php';
// if hours real == session waktukonsul then redirect to chat.php


if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("location: ../Login-Register/LoginForm.php");
}

if(isset($_GET['messagekonsul'])){
    if($_GET['messagekonsul'] == 'sudahbooking'){
        echo '<script>alert("anda sudah booking konsultasi sebelumnya di jam '.$_SESSION['waktukonsul'].'dengan id dokter'.$_SESSION['id_from'].', silahkan menunggu")</script>';
        // header('location:dashboard.php');
    }
}

$sql = <<<SQL
        SELECT * FROM identitas WHERE id_user = '$_SESSION[id]'
    SQL;
$data = mysqli_query(ConnectionUtil::connect(), $sql);
$result = mysqli_fetch_array($data);

function resultGender(): bool {
    global $result;
    if ($result['jeniskelamin'] == 'Laki - Laki') {
        return true;
    }

    return false;
}

$urlname =explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// $urlname = explode("/", __DIR__);
$lengthurl = sizeof($urlname)-1;

?>
    
<nav>
        
    <div class="logo">
        <h1>MINDFUL <span>SPACE</span></h1>
    </div>

    <div class="navigation">

        <ul>

            <a href="../Homepage/HomePage-Visitor.php" class="beranda">
                Beranda
            </a>
        
            <li class="fasilitas__hover">

                <a href="Fasilitas.php" class="fasilitas__check">Fasilitas</a>                   

            </li>
            
            <li class="layanan__hover">

                <input type="radio" name="nav" id="layanan">
                <label for="layanan" class="layanan__check">Layanan <i class="fa fa-chevron-down"></i></label>

                <ul class="layanan__dropdown dropdown">
                    <a href="konseling.php">
                        <li>Konseling</li>
                    </a>
                    <a href="">
                        <li>Rehabilitasi</li>
                    </a>
                    </a>
                    <a href="tesmental.php">
                        <li>Tes Kesehatan Mental</li>
                    </a>
                </ul>       

            </li>

            <li><hr></li>

            <a href="../Login-Register/Logout.php" class="logout">
                <li>LOG OUT</li>
            </a>

            <!-- Garis biru dibawah navigasi -->
            <!-- <div class="underline"></div> -->

        </ul>

    </div>
 
</nav>

<br><br><br><br>
<br><br><br><br>

<h1 style= "font-family: 'Montserrat'; 
            font-weight: 700;
            letter-spacing: 0.03rem;">Halo, <?php echo $urlname[$lengthurl]?>!</h1>

<br><br>
<main>

    <section class="left__col">

        <div class="image">

            <img src="<?php echo $result['url_image']?>" alt="">
    
        </div>
        
        <form action="../Dashboard-User/updateAction.php" method="post" enctype="multipart/form-data">
            <label for="change__profile">
                <img src="../image/CameraIcon.svg" alt="">
            </label>
            <input type="file" name="image_user" id="change__profile" disabled>
            
            <label for="nama__lengkap"><img src="../image/NamaLengkapIcon.svg" alt=""> Nama Lengkap</label>
            <input id="inputbutton" disabled type="text" name="nama" id="nama__lengkap" value="<?php echo $result['namalengkap']; ?>" autocomplete="off">
        
            <label for="usia"><img src="../image/UsiaIcon.svg" alt=""> Usia (Tahun)</label>
            <input id="inputbutton" disabled type="number" name="usia" id="usia" value="<?php echo $result['umur']; ?>">

            <label for="gender"><img src="../image/GenderIcon.svg" alt=""> Jenis Kelamin</label>
            <select name="gender" id="gender">
                <option value="Laki - Laki" <?php echo resultGender() ? "selected" : ""?> >Laki-Laki</option>
                <option value="Perempuan" <?php echo resultGender() ? "" : "selected"?> >Perempuan</option>
            </select>

            <label class="save-button">
                <input type="button" class="thebutton" id="editbutton" value="Edit">
            </label>

        </form>

    </section>

    <section class="right__col">

        <div class="kanan">

            <a href="fasilitas.php" class="card">
                <img src="../image/FasilitasIcon.svg" alt="" class="gambar">
                <br>
                <p>Fasilitas</p>
            </a>
            
            <a href="konseling.php" class="card">
                <img src="../image/KonselingIcon.svg" alt="" class="gambar">
                <br>
                <p>Konseling</p>
            </a>

        </div>

        <div class="kiri">

            <a href="riwayatkonseling.php" class="card">
                <img src="../image/RiwayatKonselingIkon.svg" alt="" class="gambar">
                <br>
                <p>Riwayat Konseling</p>
            </a>

            <a href="tesmental.php" class="card">
                <img src="../image/TesKesehatanMentalIcon.svg" alt="" class="gambar">
                <br>
                <p>Tes Kesehatan</p>
            </a>

        </div>
        
    </section>

</main>

<br><br><br>

<script src="styling/script.js"></script>
<script src="refreshTime.js"></script>


</body>
</html>