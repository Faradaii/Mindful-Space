<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tes mental</title>
</head>
<body>
<?php 
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;

if (isset($_POST['point'])){
    $points = intval($_POST['points']);
    $points += intval($_POST['point']);
}

if (isset($_GET['halaman']) && $_GET['halaman'] > 12){
    header ('location: tesmental.php?halaman=0&points='.$points);
}
    
$no = 1;
$batas = 1; // <-- Magic number
$halaman= @$_GET['halaman'];
if (!isset($halaman)){
    $posisi= 0;
    $halaman= 1;
    header('location: tesmental.php?halaman=' . $halaman);
} else {
    $posisi = ($halaman-1)* $batas;
    $no = $posisi + 1;
}

$query = "SELECT * FROM pertanyaan WHERE id = '$no'";
$data = mysqli_query(ConnectionUtil::connect(), $query);
$result = mysqli_fetch_array($data);
$jmldata= mysqli_num_rows($data);
$jmlhal = ceil($jmldata/$batas);

?>


<div <?php echo($_GET['halaman'] == 0)? 'hidden': ''?> >      
    <form action="tesmental.php?halaman=<?php echo $no + 1?>" method="post">
        <input type="number" name="points" value="<?php echo $points ?>" hidden>
        <!-- disini bagian showing pertanyaan  -->
        <h3>
            <?php echo $result['pertanyaan'];?>
        </h3>
        <input type="radio" name="point" id="" value="4">Sangat Setuju
        <input type="radio" name="point" id="" value="3">Setuju
        <input type="radio" name="point" id="" value="2">Tidak Setuju
        <input type="radio" name="point" id="" value="1">Sangat Tidak Setuju
        <input type="submit" value="Next"> 
    </form>
</div>

<div <?php echo ($_GET['halaman'] == 0)? '': 'hidden'?>>
    <!-- hasil result  -->
    <p>skor anda: <?php $points = $_GET['points']; echo $points?></p>
    <p>Indikator anda : 
        <?php 
            if ($points > 36) {
                echo 'Kesehatan mental anda sangat sehat !';
            } else if ($points > 24){
                echo 'Kesehatan mental anda normal !';
            } else if ($points > 12){
                echo 'Kesehatan mental anda tidak sehat ! segera konsultasikan dengan dokter kami :>';
            } else {
                echo 'Kesehatan mental anda sangat tidak sehat ! segera konsultasikan dengan dokter kami :>';
            }
        ?>
    </p>
    <a href="dashboard.php">Kembali</a>
</div>

</body>
</html>