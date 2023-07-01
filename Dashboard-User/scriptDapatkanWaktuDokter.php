<?php 
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;

date_default_timezone_set("Asia/Makassar"); 
$currentDate = date("d-m-Y");

if (isset($_GET['dapatkanWaktuDokter'])) {
    $id_dokter = $_GET['dapatkanWaktuDokter'];
    $query = <<<SQL
        SELECT waktu FROM `antrian` WHERE `id_dokter` = '$id_dokter' AND `tanggal` = '$currentDate'
    SQL;

    $arrayWaktuTidakTersedia = array();
    $datawaktu = mysqli_query(ConnectionUtil::connect(), $query);
    while($row = mysqli_fetch_array($datawaktu)){
        $arrayWaktuTidakTersedia[] = $row['waktu'];
    }

    //time 
    $getWaktuNow = date('H');
    // print_r($arrayWaktuTidakTersedia);
    if($getWaktuNow >= 8){
        $i = $getWaktuNow;
    } else {
        $i = 8;
    }
    for ($i; $i <= 23; $i++) { 
        if(!in_array($i, $arrayWaktuTidakTersedia)){
            echo <<<HTML
                <option value="$i">
                    $i:00
                </option>
            HTML;
        } 
        
    }
    
}



?>