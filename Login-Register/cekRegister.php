<?php 
session_start();
include 'connection.php';

try{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if($confirmPassword!=$password) {
        header("location:RegisterForm.php?pesan=registergagal");
    } else {
        mysqli_query($koneksi, "INSERT INTO users VALUES (DEFAULT,'$username','$password','user')");
        header("location:LoginForm.php");
    }

} catch (mysqli_sql_exception $e) {
    var_dump($e);
}