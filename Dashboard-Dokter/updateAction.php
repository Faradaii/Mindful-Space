<?php 
include '../Helper/ConnectionUtil.php';
use Helper\ConnectionUtil;
session_start();
$myId = $_SESSION['id'];
if ($_SESSION['role'] != 'dokter') {
    header('location:../Login-Register/LoginForm.php');
}

$namalengkap = $_POST['namalengkap'];
$jk = $_POST['jeniskelamin'];
$umur = $_POST['umur'];

$renamedFile = $_POST['url_image'];

if (is_uploaded_file($_FILES['image_user']['tmp_name'])) {
    $target_dir = "../uploads/user/";
    $target_file = $target_dir . basename($_FILES["image_user"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $renamedFile = $target_dir ."profile-user-".$myId.".".$imageFileType;
    move_uploaded_file($_FILES["image_user"]["tmp_name"], $renamedFile);
}


mysqli_query(ConnectionUtil::connect(), "UPDATE identitas SET 
    namalengkap = '$namalengkap',
    jeniskelamin = '$jk',
    umur = '$umur',
    url_image = '$renamedFile'
 WHERE id_user = $myId");


 header('location: updateProfile.php');

?>