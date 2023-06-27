
<?php 
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;
session_start();
$myid = $_SESSION['id'];

$keluhan=$_POST['keluhan'];
$waktu=intval($_POST['waktu']);
$id_dokter = $_POST['dokter'];

$_SESSION['waktukonsul'] = $waktu;
$_SESSION['id_from'] = $id_dokter;

$queryInsertAntrian = <<<SQL
    INSERT INTO antrian VALUES (DEFAULT, '$myid', '$id_dokter', 'menunggu', '$keluhan', '$waktu')
SQL;
mysqli_query(ConnectionUtil::connect(), $queryInsertAntrian);
header('location:konseling.php?message=sukses');




