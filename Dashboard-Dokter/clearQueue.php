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

    $id = $_POST['id_user'];

    mysqli_query(ConnectionUtil::connect(), "UPDATE antrian SET status='selesai' WHERE id_pasien='$id'");
    
    header("location:dashboard.php");
    ?>
</body>
</html>