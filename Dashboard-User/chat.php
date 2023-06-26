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

if (isset($_SESSION['id_from'])) {
    $_SESSION['fromWho'] = $_SESSION['id_from'];
}

$otherid = $_SESSION['id_from'];
if ($myid < $otherid) {
    $ref = $myid.$otherid;
}
else {
    $ref = $otherid.$myid;
} ?>


    <input type="checkbox" name="dropdown__setting" id="dropdown__setting">
   
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
    <br><br><br><br>
    
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
                $getKeluhan = mysqli_query(ConnectionUtil::connect(), "SELECT antrian.keluhan FROM antrian WHERE id_pasien = '$myid' AND status != 'selesai'");
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
            
        </div>

        <form action="clearSessionChat.php" method="post" id="clearSessionChat"></form>
    
    </main>
    <input type="text" id="statuskonsultasihidden" hidden>

    <script src="styling/script.js"></script>
    <script src="timer.js"></script>
    <script src="refreshTime.js"></script>


</body>
</html>



