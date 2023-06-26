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
    require_once '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

    $id = $_GET['id'];
    $show = isset($_GET['show'])? $_GET['show']: 'user';

    
    $data = mysqli_query(ConnectionUtil::connect(), "SELECT role FROM users WHERE id = $id");
    if(mysqli_fetch_array($data)['role'] == 'user') {
        $query = "DELETE FROM antrian WHERE id_pasien = $id";
    } else {
        $query = "DELETE FROM antrian WHERE id_dokter = $id";
        mysqli_query(ConnectionUtil::connect(), "DELETE FROM dokters WHERE id_dokter = $id");
    }
    

    mysqli_query(ConnectionUtil::connect(), $query);
    mysqli_query(ConnectionUtil::connect(), "DELETE FROM identitas WHERE id_user = $id");
    mysqli_query(ConnectionUtil::connect(), "DELETE FROM users WHERE id = $id");
    header("location:dashboard.php?show=".$show)
    ?>
</body>
</html>