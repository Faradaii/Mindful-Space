<?php

require_once __DIR__ . "/../Service/LoginService.php";
require_once __DIR__ . "/../Helper/ConnectionUtil.php";

use Helper\ConnectionUtil;
use Service\LoginService;

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['login-button'])) {
    LoginService::initialize(ConnectionUtil::connect(), $username, $password);
}