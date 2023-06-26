<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Dokter</title>
    <script src="refreshChat.js"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="styling/nav-style.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/chat-style.css">

</head>
<body>

<?php 
session_start();
include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

$myid = $_SESSION['id'];

if (isset($_POST['id_from'])) {
    $_SESSION['id_from'] = $_POST['id_from'];
    $_SESSION['fromWho'] = $_POST['id_from'];
}
$otherid = $_SESSION['id_from'];
if ($myid < $otherid) {
    $ref = $myid.$otherid;
}
else {
    $ref = $otherid.$myid;
} ?>


<?php
//ini untuk auto unavailable jika suatu konseling sedang berlangsung
mysqli_query(ConnectionUtil::connect(), "UPDATE dokters SET status = '0' WHERE id_dokter = '$myid'");
//untuk mengubah status di database antrian
mysqli_query(ConnectionUtil::connect(), "UPDATE antrian SET status = 'konsultasi' WHERE id_dokter = '$myid' AND id_pasien = '$otherid'");

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
                <input type="text" name="status" value="<?php echo $status == 1? 0 : 1 ?>" hidden>
                <div class="toggle"></div>
            </label>
            
            </form>
                
            

        </div>
        <a href="" class="profile__set">
            <li>Profile</li>
        </a>

        <a href="../Login-Register/Logout.php" class="logout">
            <li>Log Out</li>
        </a>
    </div>
        
    <nav>
    <?php 

    $datax = mysqli_query(ConnectionUtil::connect(), "SELECT users.role, identitas.* FROM identitas JOIN users ON users.id = identitas.id_user WHERE id_user = '$myid'");
    $result = mysqli_fetch_array($datax);
    ?>

        <div class="logo">
            <h1>MINDFUL <span>SPACE</span></h1>
        </div>

        <div class="profile">
            <div class="image">
                <img src="<?php echo $result['url_image']?>" alt="">
            </div>

            <div>
                <h2><?php echo $result['namalengkap']?></h2>
                <p><?php echo $result['role']?></p>
            </div>

            <div hidden>
                <label for="dropdown__setting">
                    <i class="fa fa-chevron-down dropdown__setting"></i>
                </label>
            </div>
        </div>

    </nav>

    <hr>
    
    <br><br><br><br><br>
    <br><br>
    <br><br>
    


    <main>

        <div class="left__col">
    
            <div id="chatAutoRefresh">
                <!-- ISI CHAT -->
            </div>  
            
            <br><br><br>

            <form method='post' action='addChat.php'>

                <div class="text__bar">

                    <input type='text' name='isiChat' autocomplete="off" placeholder="Ketik disini...">
                    <button type='submit'><i class="fa-solid fa-paper-plane"></i></button>

                </div>

                <input type='text' name='idFrom' hidden value='<?php echo $myid?>'>
                <input type='text' name='idTo' hidden value="<?php echo $otherid?>">
                <input type='text' name='ref' hidden value='<?php echo $ref?>'>

            </form>
    
        </div>
    
        <hr>
    
        <div class="right__col">

            <h1>PROFILE USER</h1>
    
            <div class="time">
                <p id="time"></p>
            </div>

            <div class="keluhan">
                <h2>KELUHAN</h2>
                <?php 
                $getKeluhan = mysqli_query(ConnectionUtil::connect(), "SELECT antrian.keluhan FROM antrian WHERE id_pasien = '$otherid'");
                $datakeluhan = mysqli_fetch_array($getKeluhan);
                ?>
                <h4><?php echo $datakeluhan['keluhan'] ?></h4>
            </div>

            <div class="user__profile">
                <?php 
                          $otherId = $_SESSION['fromWho'];
            
                          $userData = mysqli_query(ConnectionUtil::connect(), "SELECT users.username, identitas.* 
                          FROM identitas JOIN users 
                          ON identitas.id_user = users.id WHERE id_user = $otherId");
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

            <form action="clearQueue.php" method="post" id="backbutton">
                <input type="text" name="id_user" value="<?php echo $otherid?>" hidden>
                <button class="back" type="submit">
                    Back
                </button>
                <i class="fa-solid fa-arrow-left"></i>

            </form>
            
        </div>
    
    </main>

    <script src="styling/script.js"></script>
    <script src="timer.js"></script>


</body>
</html>



