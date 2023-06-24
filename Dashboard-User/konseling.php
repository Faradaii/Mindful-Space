<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konseling</title>
</head>
<body>

<?php 
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;

$queryStatusDokter = <<<SQL
        SELECT id_dokter FROM dokters WHERE status = '1'
    SQL;

$data = mysqli_query(ConnectionUtil::connect(), $queryStatusDokter);
$result = mysqli_fetch_all($data);

print_r($result);
$randomNumber = rand(0, sizeof($result)-1);
echo $randomNumber;
echo "<br/>";
//random dokter
echo $result[$randomNumber];
?>

    <form action="konseling.php" method="post">
        <h3>Silahkan isi data berikut !</h3>
        <input type="text" name="keluhan"> Keluhan
        <input type="number" name="waktu"> Waktu
        <input type="submit" value="CariDokter" name="message">
    </form>

<?php
$searchDokter = $_POST['message']?? null;
?>
</body>
</html>