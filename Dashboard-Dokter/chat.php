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
    
    <hr>
    
    <br><br><br><br><br>
    <br><br><br><br>


    <main>

        <div class="left__col">
    
            <div id="chatAutoRefresh">
                <!-- ISI CHAT -->
            </div>  
            
            <br>

            <form method='post' action='addChat.php'>
                <input type='text' name='isiChat'>
                <button type='submit'>Send</button>
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

                <?php
        
                    session_start();
            
                    include '../Helper/ConnectionUtil.php';
                    use Helper\ConnectionUtil;
            
                    if (isset($_SESSION['fromWho'])) {
                        $otherid = $_SESSION['fromWho'];
            
                        $userData = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM users WHERE id = '$otherid'");
                        while ($userAbout = mysqli_fetch_array($userData)){
                            echo '<p>' . $userAbout['username'] . '</p>';
                            echo '<p>' . $userAbout['password'].'</p>';
                            echo '<p>' . $userAbout['role'].'</p>';
            
                        }
                        
                    }
        
                ?>

            </div>

            <button class="back">
                Back <i class="fa-sharp fa-solid fa-circle-arrow-left" style="color: #000000;"></i>
            </button>
            
        </div>
    
    </main>

    <script src="styling/script.js"></script>

</body>
</html>



