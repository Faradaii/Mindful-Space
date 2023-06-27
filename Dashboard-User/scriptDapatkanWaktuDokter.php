<?php 
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;
if (isset($_GET['dapatkanWaktuDokter'])) {
    $id_dokter = $_GET['dapatkanWaktuDokter'];
    $query = <<<SQL
        SELECT waktu FROM `antrian` WHERE `id_dokter` = '$id_dokter'
    SQL;

    $arrayWaktuTidakTersedia = array();
    $datawaktu = mysqli_query(ConnectionUtil::connect(), $query);
    while($row = mysqli_fetch_array($datawaktu)){
        $arrayWaktuTidakTersedia[] = $row['waktu'];
    }
    // print_r($arrayWaktuTidakTersedia);
    for ($i=8; $i <= 20; $i++) { 
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