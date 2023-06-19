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
    $save = @$_GET['save'];
    if ($save) {
        echo "<script>alert('berhasil disimpan')</script>";
    }
?>

<?php

include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

session_start();
$myid = $_SESSION['id'];

$data = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM dokters WHERE id_dokter = '$myid'");
$result = mysqli_fetch_array($data);
?>

<form action="setStatus.php" method="post">
    <select type="text" name="status">
        <?php 
        if ($result['status'] == 'available') {?>
            <option value="available" selected>Available</option>
            <option value="notAvailable">not Available</option> 
        <?php 
        }else {?>
            <option value="notAvailable" selected>not Available</option> 
            <option value="available">Available</option>
        <?php 
        }
        ?>
        
    </select>
    <button type="submit">Save</button>
    <a href="dashboard.php">Kembali</a>
</form>
</body>
</html>