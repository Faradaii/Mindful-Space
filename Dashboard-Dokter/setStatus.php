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
include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;
session_start();
$status = $_POST['status'];
$id = $_SESSION['id'];

mysqli_query(ConnectionUtil::connect(), "UPDATE dokters SET status = '$status' WHERE id_dokter = '$id'");?>

<?php
header("location:statusSetting.php?save=true");
?>
</body>
</html>