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
    include "konek.php";
    
    $nama = $_POST["username"];
    $spesialis = $_POST["password"];
    $role = $_POST["role"];
    
    
    mysqli_query($konek, "INSERT INTO dashboard VALUES(DEFAULT, '$nama','$spesialis', '$role')");
    header("location:dashboard.php")
    ?>
</body>
</html>