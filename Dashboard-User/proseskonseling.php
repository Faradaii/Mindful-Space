
<?php 
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("location: ../Login-Register/LoginForm.php");
}
$myid = $_SESSION['id'];

$keluhan=$_POST['keluhan'];
$waktu=intval($_POST['waktu']);
$id_dokter = $_POST['dokter'];

$query = <<<SQL
    SELECT dokters.status, identitas.* FROM `identitas` JOIN `dokters` ON dokters.id_dokter = identitas.id_user WHERE `id_user` = '$id_dokter' AND `status` = '1'
SQL;
$data = mysqli_query(ConnectionUtil::connect(), $query);
$result = mysqli_fetch_array($data);

if(mysqli_num_rows($data) > 0){
    $_SESSION['namadokter'] = $result['namalengkap'];
    $_SESSION['waktukonsul'] = $waktu;
    $_SESSION['id_from'] = $id_dokter;
    
    date_default_timezone_set("Asia/Makassar"); 
    $currentDate = date("d-m-Y");
    
    $queryInsertAntrian = <<<SQL
        INSERT INTO antrian VALUES (DEFAULT, '$myid', '$id_dokter', 'menunggu', '$keluhan', '$waktu', '$currentDate')
    SQL;
    mysqli_query(ConnectionUtil::connect(), $queryInsertAntrian);
    header('location:konseling.php?message=sukses');
} else {
    header('location:konseling.php?message=gagal');
}