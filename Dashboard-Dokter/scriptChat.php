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
    if (isset($_SESSION['id_from'])){
        $otherid = $_SESSION['id_from'];
        $_SESSION['fromWho'] = $otherid;
        // bantuan referensi untuk membedakan chat dengan id lain dan bersifat unik. dibentuk dari menggabungkan dua id dengan ketentuan pembuatan, dibuat dari id terkecil + id terbesar
        if ($myid < $otherid) {
            $ref = $myid.$otherid;
        }
        else {
            $ref = $otherid.$myid;
        }
    } else {?>
        
    <?php 
    }


    if (isset($_SESSION['fromWho'])) {
       
        $query = "SELECT * FROM chats WHERE referensi = '$ref'";

        $ChatData = mysqli_query(Connect::connect(), $query); 

        while($chat = mysqli_fetch_array($ChatData)){
            if ($chat['id_from'] == $myid){?>
                <div style='float:right;'>
                <?php echo $chat['isi_chat']?>
                <br>
                <small><?php echo $chat['time'] ?></small>
                </div>
                <br/>

            <?php
            }
            else{?>
                <div style='float:left;'>
                <?php echo $chat['isi_chat']?>
                <br>
                <small><?php echo $chat['time'] ?></small>
                </div>
                <br/>
            <?php
            }
        }
    } else {?>
        <h1>Silahkan Mulai Chat dengan menekan chat list di kiri!</h1>
    <?php 
    }?>
    