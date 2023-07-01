<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="styling/nav-style.css">
    <link rel="stylesheet" href="styling/update-style.css">
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">
    <link rel="stylesheet" href="styling/main-style.css">



</head>
<body>
<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'dokter') {
    header("location: ../Login-Register/LoginForm.php");
}
include '../Helper/ConnectionUtil.php';
use Helper\ConnectionUtil;


unset($_SESSION['fromWho']);
unset($_SESSION['id_from']);
$myid = $_SESSION['id'];
?>


<?php
$data = mysqli_query(ConnectionUtil::connect(), "SELECT * 
FROM dokters WHERE id_dokter = $myid ");
$result = mysqli_fetch_array($data);
$status = $result['status'];
?>
    
<input type="checkbox" name="dropdown__setting" id="dropdown__setting">
    <div class="setting">

        <p>Availability Status</p>

        <br><br>

        <div id="availability__box">

            <p class="available__status"><!-- Javascript --></p>
            
            <form action="setStatus.php" method="POST" id="setStatus">
            <label for="available__status">
                <!-- PHP selected dibawah -->
                <input type="checkbox" name="available__status" onchange="document.getElementById('setStatus').submit()" id="available__status" <?php echo $status == 1 ? 'checked' : ''  ?>>
                <div class="toggle"></div>
                <input type="text" name="status" value="<?php echo $status == 1? 0 : 1 ?>" hidden>
            </label>
            
            </form>
                
            

        </div>
        <a href="updateProfile.php" class="profile__set">
            <li>Profile</li>
        </a>

        <a href="../Login-Register/Logout.php" class="logout">
            <li>Log Out</li>
        </a>
    </div>

    
<nav>

<?php
$iniHTMLDiDalemPHP = <<<HTML
    <div class="logo">
        <h1>MINDFUL <span>SPACE</span></h1>
    </div>
HTML;

echo $iniHTMLDiDalemPHP;
?>

<?php 

$datax = mysqli_query(ConnectionUtil::connect(), "SELECT users.role, identitas.* FROM identitas JOIN users ON users.id = identitas.id_user WHERE id_user = '$myid'");
$result = mysqli_fetch_array($datax);
?>

<div class="profile">

    <div class="image">
        <img src="<?php echo $result['url_image']?>" alt="">
    </div>

    <div>
        <h2><?php echo $result['namalengkap']?></h2>
        <p><?php echo $result['role']?></p>
    </div>

    <div>
        <label for="dropdown__setting">
            <i class="fa fa-chevron-down dropdown__setting"></i>
        </label>
    </div>

</nav>
<?php
                $data = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM identitas WHERE id_user = '$myid'");
                $result = mysqli_fetch_array($data);
            ?>
<form action="updateAction.php" method="post" enctype="multipart/form-data">
<main class="container">
    <div class="left">
        <img id="image" src="<?php echo $result['url_image']?>">
        <input type="text" hidden name="url_image" value="<?php echo $result['url_image']?>">
        <label class="label-upload">
            <input type="file" id="inputbuttonfile" disabled name="image_user" accept=".png, .jpg">Upload File
        </label>
        <small id="name_image"></small>
    </div>
    <div class="right">
        <div>
            <p for="name">Nama Lengkap</p>
            <p for="jk">Jenis Kelamin</p>
            <p for="umur">Umur</p>
        </div>
        <div>
            <input type="text" name="namalengkap" id="inputbutton" disabled value="<?php echo $result['namalengkap']?>">
            <select  name="jeniskelamin" id="inputbutton" disabled>
                <?php if ($result['jeniskelamin'] == 'Perempuan'){?>
                <option selected value="<?php echo $result['jeniskelamin']?>"><?php echo $result['jeniskelamin']?></option>
                <option value="Laki - Laki">Laki - Laki</option>
                <?php } else {?>
                <option selected value="<?php echo $result['jeniskelamin']?>"><?php echo $result['jeniskelamin']?></option>
                <option value="Perempuan">Perempuan</option>
                <?php }?>
            </select>
            <input type="number" name="umur" id="inputbutton" disabled value="<?php echo $result['umur']?>">
            <label class="save-button" style="color: white;">
                <input type="button" class="thebutton" id="editbutton">Edit
            </label>
        </div>
    </div>
</form>
</main>
<form action="Dashboard.php">

    <button class="back" style="color: white;">
        <i class="fa-solid fa-arrow-left" style="margin-inline: 5%; color: white;"></i>
        Back
    </button>

</form>

<script src="styling/script.js"></script>
</body>
</html>