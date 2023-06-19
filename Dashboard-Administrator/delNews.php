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
    $url_image = $_GET['url_image'];
    
    chmod($url_image,0755); 
    unlink($url_image);
    mysqli_query(ConnectionUtil::connect(), "DELETE FROM newspaper WHERE id = $id");
    header("location:dashboard.php");
    ?>
</body>
</html>