<?php 
use Helper\ConnectionUtil as Connect;
if (!isset($_SESSION)){
    session_start();
}
//get hours only 
function getHours(){
    date_default_timezone_set("Asia/Makassar"); 
    $realtime = date('H');
    echo $realtime;
}

if(isset($_SESSION['id_from'])){
    function getStatus(): string {
        $id_from = $_SESSION['id_from'];
        $id_to = $_SESSION['id'];
        $query = "SELECT * FROM antrian WHERE id_dokter = $id_from AND id_pasien = $id_to AND status != 'selesai'";
        $data = mysqli_query(Connect::connect(), $query);
        $result = mysqli_fetch_array($data);
        return $result['status'];
    }

    $statusnow = getStatus();
    // print_r($statusnow);
    
    // if (condition) {
    //     # code...
    // }
    $urlname =explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $lengthurl = sizeof($urlname)-1;
    if($urlname[$lengthurl] != "chat.php" || $urlname[$lengthurl] != "realtime.php"){
        if($statusnow == 'konsultasi'){
            header('location:chat.php');
        }
    }
    
    
}

if(isset($_SESSION['waktukonsul'])){
    if($realtime == $_SESSION['waktukonsul']){
        header('location:chat.php');
    }
}
getHours();
?>