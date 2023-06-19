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

   <?php $status = 0 ?>

    <input type="checkbox" name="dropdown__setting" id="dropdown__setting">
    <div class="setting">

        <p>Availability Status</p>

        <br><br>

        <div id="availability__box">

            <p class="available__status"><!-- Javascript --></p>
            
            <label for="available__status">
                <!-- PHP selected dibawah -->
                <input type="checkbox" name="available__status" id="available__status" <?php echo $status == 1 ? 'checked' : ''  ?>>
                <div class="toggle"></div>
            </label>

        </div>


    </div>
        
    <nav>

        <div class="logo">
            <h1>MINDFUL <span>SPACE</span></h1>
        </div>

        <div class="profile">

            <div class="image">
                <img src="../image/BudhiSwag-removebg-preview.png" alt="">
            </div>

            <div>
                <h2>BUDHI</h2>
                <p>The Rapist</p>
            </div>

            <div>
                <label for="dropdown__setting">
                    <i class="fa fa-chevron-down dropdown__setting"></i>
                </label>
            </div>

        </div>

    </nav>
    
    <?php

        // //history chat
        session_start();
        include '../Helper/ConnectionUtil.php';
            use Helper\ConnectionUtil;

        echo $_SESSION['id'];
        $myid = $_SESSION['id'];
        $otherid = $_SESSION['id_from'];
        if ($myid < $otherid) {
            $ref = $myid.$otherid;
        }
        else {
            $ref = $otherid.$myid;
        }


        $listchat = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM historychat WHERE id_to = '$myid' ORDER BY id DESC LIMIT 5");
        // $historychat = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM chats WHERE id_from = '$myid'");

        while ($fromWho = mysqli_fetch_array($listchat)) {

            $from = $fromWho['id_from'];
            $userdatas =  mysqli_query(ConnectionUtil::connect(), "SELECT * FROM users WHERE id = '$from'");

            while ($userdata = mysqli_fetch_array($userdatas)){

                $user_id = $userdata['id'];
                echo
                "<form style='z-index: 6;' method='post' action='scriptChat.php?'>
                    <input type='text' name='id_from' hidden value='$user_id'>
                    <input type='text' name='help' value='true' hidden>
                    <button type='submit'>$userdata[$from]</button>
                </form>";

            }

        }

    ?>

    <hr>
    
    <br><br><br><br><br>
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
                <input type='text' name='idTo' hidden value='<?php echo $otherid?>'>
                <input type='text' name='ref' hidden value='<?php echo $ref?>'>

            </form>
    
        </div>
    
        <hr>
    
        <div class="right__col">

            <h1>PROFILE USER</h1>
    
            <div class="time">
                <p>00:00:69</p>
            </div>

            <div class="keluhan">
                <h2>KELUHAN</h2>
                <h4>MASALAH HIDUP</h4>
            </div>

            <div class="user__profile">

                <div class="image">
                    <img src="../image/BudhiSwag-removebg-preview.png" alt="">
                </div>

                <?php
            
                    if (isset($_SESSION['fromWho'])) {
                        $otherid = $_SESSION['fromWho'];
            
                        $userData = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM users WHERE id = '$otherid'");
                        while ($userAbout = mysqli_fetch_array($userData)){
                            echo '<p class="data">' . $userAbout['username'] . '</p>';
                            echo '<p class="nama__asli">' . 'I Made Bagus Mahatma Budhi' . '</p>';
                            echo '<p class="sub__data">' . $userAbout['password'].' | ';
                            echo '<span>' . $userAbout['role'].'</span></p>';
            
                        }
                        
                    }
        
                ?>

            </div>

            <form action="Dashboard.php">

                <button class="back">
                    Back
                </button>
                <i class="fa-solid fa-arrow-left"></i>

            </form>
            
        </div>
    
    </main>

    <script src="styling/script.js"></script>

</body>
</html>



