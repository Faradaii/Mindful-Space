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
    date_default_timezone_set("Asia/Makassar"); 

    $id = $_POST['id_user'];
    
    $querySelectTable = <<<SQL
        SELECT * FROM antrian WHERE id_pasien= '$id' AND status != 'selesai'
    SQL;
    $dataSelect = mysqli_query(ConnectionUtil::connect(), $querySelectTable); //fetch data agar bisa mendapat data keluhan dan

    $queryUpdate = <<<SQL
        UPDATE antrian SET status='selesai' WHERE id_pasien='$id'
    SQL;
    mysqli_query(ConnectionUtil::connect(), $queryUpdate); //update antrian agar queue terselesaikan 
    
    $result = mysqli_fetch_array($dataSelect);
    print_r($result);
    $currentDate = date("d-m-Y");
    $queryInsertHistory = <<<SQL
        INSERT INTO historychat (id_from,id_to,tanggal,keluhan) VALUES ('$result[id_dokter]', '$result[id_pasien]', '$currentDate', '$result[keluhan]')
    SQL;    
    mysqli_query(ConnectionUtil::connect(), $queryInsertHistory);
    

    header("location:dashboard.php");
    ?>
</body>
</html>