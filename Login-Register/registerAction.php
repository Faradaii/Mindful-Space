<?php 

include 'connection.php';

try{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if($confirmPassword!=$password){
        echo 
        "<script> 
            alert('Kata sandi tidak sama'); 
        </script>";
        header("location:RegisterForm.php");
    } else {
        mysqli_query($koneksi, "INSERT INTO users VALUES ('','$username','$password','user')");
        header("location:LoginForm.php");
    }

} catch (mysqli_sql_exception $e) {
    var_dump($e);
}