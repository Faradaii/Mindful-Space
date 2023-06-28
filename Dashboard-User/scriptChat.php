
<html>

    <head>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            div.chat {
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                margin: 0 2rem;
                max-width: 60%;
                min-width: 10%;
                padding: .5rem 1rem;
                border-radius: .5rem;
                position: relative;
            }


            small {
                display: block;
                text-align: right;
                font-size: .8rem;
            }

            .left__chat {
                background-color: white;
                box-shadow: 1px 2px 1px var(--black-not-hover);
                display: inline-block;
                text-align: justify;
            }
            .right__chat {
                background-color: var(--secondary-blue);
                box-shadow: -1px 2px 1px var(--black-not-hover);
                display: inline-block;
                text-align: justify;
            }

            .right {
                width: 100%;
                display: flex;
                justify-content: end;
            }
            
            .left__chat .triangle {
                width:0;
                height: 0;
                border-right: 20px solid white;
                border-bottom: 15px solid transparent;
                position: absolute;
                left: -10px;
                top: 0;
            }
            .right__chat .triangle {
                width:0;
                height: 0;
                border-left: 20px solid var(--secondary-blue);
                border-bottom: 15px solid transparent;
                position: absolute;
                top: 0;
                right: -10px;
            }

            small {
                color: var(--black-not-hover);
            }

            #chat__kosong {
                position: absolute;
                display: flex;
                flex-direction: column;
                align-items: center;
                row-gap: 1rem;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: var(--black-not-hover);
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }
            #chat__kosong i {
                font-size: 3rem;
            }
            </style>

    </head>

    <body>
        
        <?php
            include '../Helper/ConnectionUtil.php';
            use Helper\ConnectionUtil as Connect;
            if (!isset($_SESSION)){
                session_start();
            }
            if (isset($_POST['id_from'])) {
                $_SESSION['id_from'] = $_POST['id_from'];
            }
            if (isset($_POST['help'])) {
                header('location:chat.php');
            }

            $myid = $_SESSION['id'];

            if (isset($_SESSION['id_from'])) {

                $otherid = $_SESSION['id_from'];
                $_SESSION['fromWho'] = $otherid;

                // bantuan referensi untuk membedakan chat dengan id lain dan 
                // bersifat unik. dibentuk dari menggabungkan dua id dengan 
                // ketentuan pembuatan, dibuat dari id terkecil + id terbesar
                if ($myid < $otherid) {
                    $ref = $myid.$otherid;
                }
                else {
                    $ref = $otherid.$myid;
                }

            } else {?>
                
            <?php 
            }
            date_default_timezone_set("Asia/Makassar"); 
            $currentDate = date("d-m-Y");
            $query = "SELECT * FROM chats WHERE referensi = '$ref' AND tanggal = '$currentDate'";
            $count = mysqli_fetch_row(mysqli_query(Connect::connect(), $query));
            
            if ($count > 0) {
            
                $query = "SELECT * FROM chats WHERE referensi = '$ref' AND tanggal = '$currentDate'";

                $ChatData = mysqli_query(Connect::connect(), $query); 

                while($chat = mysqli_fetch_array($ChatData)){

                    if ($chat['id_from'] == $myid) {?>

                        <br>

                        <div class="right">

                            <div class="right__chat chat">
    
                                <div class="triangle"></div>
    
                                <p><?php echo $chat['isi_chat'] ?></p>
                                <small><?php echo $chat['time'] ?></small>
    
                            </div>
                            

                        </div>

                        <br>

                    <?php

                    }
                    else {?>

                        <br>

                        <div class="left__chat chat">

                            <div class="triangle"></div>

                            <p><?php echo $chat['isi_chat']?></p>
                            <small><?php echo $chat['time'] ?></small>
                            
                        </div>
                        
                        <br>

                    <?php
                    }

                }
            } else {?>

                <div id="chat__kosong">

                    <i class="fa-solid fa-comment-slash"></i>
                    <h1>Belum ada pesan</h1>

                </div>
                
            <?php 
            }
        ?>

    </body>

</html>