<?php 
session_start();
unset($_SESSION['id_from']);
unset($_SESSION['waktukonsul']);
unset($_SESSION['fromWho']);

header('location:dashboard.php');

?>