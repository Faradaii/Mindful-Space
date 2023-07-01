<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("location: ../Login-Register/LoginForm.php");
    }
    require_once '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

    
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roleBefore = $_POST['roleBefore'];
    $role = $_POST['role'];

    if ($roleBefore != $role){
        if ($role == 'dokter') {
            $query = "DELETE FROM antrian WHERE id_pasien = $id";
            mysqli_query(ConnectionUtil::connect(), "INSERT INTO dokters (id_dokter, status) VALUES ('$id', '0')");
        } else if ($role == 'user'){
            $query = "DELETE FROM antrian WHERE id_dokter = $id";
            mysqli_query(ConnectionUtil::connect(), "DELETE FROM dokters WHERE id_dokter = $id");
        }
        mysqli_query(ConnectionUtil::connect(), $query);
    }
    
    mysqli_query(ConnectionUtil::connect(), "UPDATE users SET username='$username', password='$password', role='$role' WHERE id='$id'");
    header("location:dashboard.php?show=".$role)
    ?>
</body>
</html>