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
    
    $nama = $_POST["username"];
    $password = $_POST["password"];
    $role = 'dokter';
    
    
    mysqli_query(ConnectionUtil::connect(), "INSERT INTO users VALUES(DEFAULT, '$nama','$password', '$role')");

    $currentshow = $_POST["currentshow"];
    header("location:dashboard.php?show=".$currentshow);

    ?>
</body>
</html>