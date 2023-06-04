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
   
    $url_image = $_POST["url_image"];
    $judul = $_POST["judul"];
    $desc = $_POST["deskripsi"];
    
    
    mysqli_query($konek, "INSERT INTO newspaper VALUES (DEFAULT, '$url_image','$judul', '$desc')");
    header("location:dashboard.php");
    ?>
</body>
</html>