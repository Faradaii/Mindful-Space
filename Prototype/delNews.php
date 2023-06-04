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
    include 'konek.php';

    $id = $_GET['id'];

    mysqli_query($konek, "DELETE FROM newspaper WHERE `newspaper`.`id_news` = $id");
    header("location:dashboard.php");
    ?>
</body>
</html>