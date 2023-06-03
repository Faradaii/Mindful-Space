<?php

require_once __DIR__ . "/../Service/RegisterService.php";
require_once __DIR__ . "/../Helper/ConnectionUtil.php";

use Helper\ConnectionUtil;
use Service\RegisterService;

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if($confirmPassword != $password) {
    header("location:../Login-Register/RegisterForm.php?pesan=failed");
} else {
    RegisterService::initialize(ConnectionUtil::connect(), $username, $password);
    header("location:../Login-Register/LoginForm.php");
}

