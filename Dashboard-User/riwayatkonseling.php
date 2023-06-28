<?php 
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("location: ../Login-Register/LoginForm.php");
}
include '../Helper/ConnectionUtil.php';
use Helper\ConnectionUtil;

$myId = $_SESSION['id'];

$queryHistoryChat = <<<SQL
        SELECT * FROM `historychat` JOIN `identitas` ON `historychat`.`id_from` = `identitas`.`id_user` WHERE `id_to` = '$myId'   
    SQL;
$data = mysqli_query(ConnectionUtil::connect(), $queryHistoryChat);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Konseling</title>
    
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styling -->

        <link rel="stylesheet" href="styling/style.css">
        <link rel="stylesheet" href="styling/nav-konseling.css">
        <link rel="stylesheet" href="styling/main-style.css">
        <link rel="stylesheet" href="styling/dropdown-style.css">
        <link rel="stylesheet" href="styling/riwayatkonseling.css">

</head>
<body>

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

                <a href="../HomePage/Fasilitas.php" class="fasilitas__check">Fasilitas</a>                   

            </li>
            
            <li class="layanan__hover">

                <input type="radio" name="nav" id="layanan">
                <label for="layanan" class="layanan__check">Layanan <i class="fa fa-chevron-down"></i></label>

                <ul class="layanan__dropdown dropdown">
                    <a href="konseling.php">
                        <li>Konseling</li>
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
<br><br><br>    

<h1>RIWAYAT KONSELING</h1>

<br>

<main>

<div class="left_col">
    

<div class="user__profile">
    <?php 
        $userData = mysqli_query(ConnectionUtil::connect(), "SELECT users.username, identitas.* 
        FROM identitas JOIN users 
        ON identitas.id_user = users.id WHERE id_user = $myId");
        $userAbout = mysqli_fetch_array($userData)
    ?>

    <div class="image">
        <img src="<?php echo $userAbout['url_image']?>" alt="">
    </div>

    <br>

    <?php
                echo '<p class="data">' . $userAbout['username'] . '</p>';
                echo '<p class="nama__asli">' . $userAbout['namalengkap'] . '</p>';
                echo '<p class="sub__data">' . $userAbout['jeniskelamin'].' | ';
                echo '<span>' . $userAbout['umur'].'</span></p>';   

    ?>

</div>

    <br>

    <a href="dashboard.php" id="backbutton">
        <button class="back" type="button">
            Back
            <i class="fa-solid fa-arrow-left"></i>
        </button>
    </a>
</div>
<br><br><br><br>

<div class="right_col">
    <table>
        
        <thead>

            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
            </tr>

        </thead>
        
        <tbody>
        <?php
            $no = 1;
            while ($row = mysqli_fetch_array($data)){
        ?>
            <tr>
                <td class="center"><?php echo $no++?></td>
                <td><?php echo $row['namalengkap'];?></td>
                <td class="center"><?php echo $row['tanggal']?></td> 
                <td class="center"><?php echo $row['keluhan']?></td> 
            </tr>
        <?php 
        }
        ?>
        </tbody>

    </table>

</div>
    
</main>

</body>
</html>