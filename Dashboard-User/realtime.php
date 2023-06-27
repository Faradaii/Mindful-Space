<?php 
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil as Connect;
if (!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['id_from'])){
    function getStatus() {
        $id_from = $_SESSION['id_from'];
        $id_to = $_SESSION['id'];
        $waktu = $_SESSION['waktukonsul'];
        $query = "SELECT * FROM antrian WHERE id_dokter = $id_from AND id_pasien = $id_to AND waktu = $waktu AND status != 'selesai'";
        $data = mysqli_query(Connect::connect(), $query);
        $result = mysqli_fetch_array($data);
        return $result['status']?? 'selesai';
    }

    $statusnow = getStatus();
    echo $statusnow;
    
}

?>