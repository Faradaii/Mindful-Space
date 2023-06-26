<?php 
session_start();
include '../Helper/ConnectionUtil.php';
use Helper\ConnectionUtil;

if ($_SESSION['role'] != 'user') {
    header('location:../Login-Register/LoginForm.php');
}

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
    <title>Document</title>
    
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styling -->

        <link rel="stylesheet" href="styling/style.css">
        <link rel="stylesheet" href="styling/nav-style.css">
        <link rel="stylesheet" href="styling/main-style.css">
        <link rel="stylesheet" href="styling/dropdown-style.css">
</head>
<body>
<div class="right__col">

<h1>PROFILE USER</h1>
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

    <?php
                echo '<p class="data">' . $userAbout['username'] . '</p>';
                echo '<p class="nama__asli">' . $userAbout['namalengkap'] . '</p>';
                echo '<p class="sub__data">' . $userAbout['jeniskelamin'].' | ';
                echo '<span>' . $userAbout['umur'].'</span></p>';   

    ?>

</div>
</div>

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
    
</body>
</html>