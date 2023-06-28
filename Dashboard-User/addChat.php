<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("location: ../Login-Register/LoginForm.php");
}
include '../Helper/ConnectionUtil.php';
use Helper\ConnectionUtil;

date_default_timezone_set("Asia/Makassar"); 
$current_time = date("H:i");
$currentDate = date("d-m-Y");

$isiChat = $_POST['isiChat'];
$id_from = $_POST['idFrom'];
$id_to = $_POST['idTo'];
$ref = $_POST['ref'];

mysqli_query(ConnectionUtil::connect(), "INSERT INTO chats VALUES (DEFAULT, '$isiChat', '$id_from', '$id_to', '$ref', '$current_time','$currentDate')");

    header('location:chat.php');

?>