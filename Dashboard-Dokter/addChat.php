<?php
session_start();
include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

$time = time();
$current_time = date('h:i:s',$time +3600*6);

$isiChat = $_POST['isiChat'];
$id_from = $_POST['idFrom'];
$id_to = $_POST['idTo'];
$ref = $_POST['ref'];

mysqli_query(ConnectionUtil::connect(), "INSERT INTO chats VALUES (DEFAULT, '$isiChat', '$id_from', '$id_to', '$ref', '$current_time')");

    header('location:chat.php');

?>