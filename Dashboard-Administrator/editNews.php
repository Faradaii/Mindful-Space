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

    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $desc = $_POST['deskripsi'];
    $link = $_POST['link'];
    $url_image = $_POST['url_image'];

    mysqli_query(ConnectionUtil::connect(), "UPDATE newspaper SET judul='$judul', deskripsi='$desc', link='$link' WHERE id='$id'");
    
    if ($_FILES["gambar"]["tmp_name"]) {
        chmod($url_image,0755); 
        unlink($url_image);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $url_image);
    }

    header("location:dashboard.php");
    ?>
</body>
</html>