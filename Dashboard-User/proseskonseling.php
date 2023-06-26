
<?php 
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;
session_start();
$myid = $_SESSION['id'];

$keluhan=$_POST['keluhan'];
$waktu=intval($_POST['waktu']);

$queryStatusDokter = <<<SQL
        SELECT id_dokter FROM dokters WHERE status = '1'
    SQL;

$data = mysqli_query(ConnectionUtil::connect(), $queryStatusDokter);
$result = mysqli_fetch_all($data);
// Check kondisi jika dokter available tidak tersedia
if(mysqli_num_rows($data) < 1){
    header('location:konseling.php?message=gagal');
} 

else 
{
// Jika dokter available tersedia maka true kanjut
$randomNumber = rand(0, sizeof($result)-1);
$id_dokter = $result[$randomNumber][0];
print_r($id_dokter);

$_SESSION['waktukonsul'] = $waktu;
$_SESSION['id_from'] = $id_dokter;

$queryInsertAntrian = <<<SQL
    INSERT INTO antrian VALUES (DEFAULT, '$myid', '$id_dokter', 'menunggu', '$keluhan', '$waktu')
SQL;
mysqli_query(ConnectionUtil::connect(), $queryInsertAntrian);
header('location:konseling.php?message=sukses');
}



