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
    require_once 'konek.php';

    $id = $_POST['id_news'];
    $judul = $_POST['judul'];
    $desc = $_POST['deskripsi'];
    $url_image = $_POST['url_image'];

    mysqli_query($konek, "UPDATE newspaper SET judul='$judul', deskripsi='$desc', url_image='$url_image' WHERE id_news='$id'");
    header("location:dashboard.php");
    ?>
</body>
</html>