<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Kesehatan Mental</title>

    <!-- CSS STYLING -->
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/nav-konseling.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">
    <link rel="stylesheet" href="styling/tesmental-styling.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php 
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("location: ../Login-Register/LoginForm.php");
}
?>

<nav>

    <div class="logo">
        <h1>MINDFUL <span>SPACE</span></h1>
    </div>

    <div class="navigation">

        <ul>

            <a href="../Homepage/HomePage-Visitor.php" class="beranda">
                Beranda
            </a>
        
            <li class="fasilitas__hover">

                <a href="../HomePage/Fasilitas.php" class="fasilitas__check">Fasilitas</a>                   

            </li>
            
            <li class="layanan__hover">

                <input type="radio" name="nav" id="layanan">
                <label for="layanan" class="layanan__check">Layanan <i class="fa fa-chevron-down"></i></label>

                <ul class="layanan__dropdown dropdown">
                    <a href="konseling.php">
                        <li>Konseling</li>
                    </a>
                    <a href="tesmental.php">
                        <li>Tes Kesehatan Mental</li>
                    </a>
                </ul>       

            </li>

            <li><hr></li>

            <a href="../Login-Register/Logout.php" class="logout">
                <li>LOG OUT</li>
            </a>

            <!-- Garis biru dibawah navigasi -->
            <!-- <div class="underline"></div> -->

        </ul>

    </div>
 
</nav>

<script src="styling/script.js"></script>

<br><br><br><br><br><br><br>

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
    
    <h3>
        <!-- disini bagian showing pertanyaan  -->
        <?php echo $result['pertanyaan'];?>
    </h3>

    <br><br>

    <form action="tesmental.php?halaman=<?php echo $no + 1?>" method="post">

        <input type="number" name="points" value="<?php echo $points ?>" hidden>
        <br>

        <input type="radio" name="point" id="sangat-setuju" value="1" hidden required>
        <label for="sangat-setuju">Sangat Setuju</label>

        <input type="radio" name="point" id="setuju" value="2" hidden required>
        <label for="setuju">Setuju</label>

        <input type="radio" name="point" id="tidak-setuju" value="3" hidden required>
        <label for="tidak-setuju">Tidak Setuju</label>

        <input type="radio" name="point" id="sangat-tidak-setuju" value="4" hidden required>
        <label for="sangat-tidak-setuju">Sangat Tidak Setuju</label>
        
        <input type="submit" value="Next"> 

    </form>
    
</div>

<div class="hasil" style="<?php echo ($_GET['halaman'] == 0)? '': 'display:none;'?>">
    <!-- hasil result  -->
    <!-- <p>skor anda: <?php $points = $_GET['points'];?></p> -->
     
    <p class="hasil-tes">

        <?php 
            if ($points > 36) {
                echo 'Kesehatan mental anda sangat sehat!';
                echo '<span>Ada baiknya untuk memperhatikan aspek-aspek penting dalam menjaga kesehatan mental, seperti menjaga keseimbangan antara pekerjaan dan waktu luang, dan menjaga hubungan sosial yang positif. Aktivitas fisik, olahraga, dan mengembangkan kebiasaan tidur yang sehat juga dapat berdampak positif pada kesehatan mental.</span>';
            } else if ($points > 24){
                echo 'Kesehatan mental anda normal!';
                echo '<span>Kondisi kesehatan mental kamu mungkin sedang tidak buruk, tapi juga tidak begitu baik. Saat ini kamu mengalami tekanan lebih banyak dari biasanya. Kamu mungkin mulai merasa ragu apakah kamu dapat menangani tekanan yang kamu rasakan sekarang.</span>';
            } else if ($points > 12){
                echo 'Kesehatan mental anda tidak sehat!';
                echo '<span>Bicarakan perasaan dan pengalaman Anda kepada orang-orang terpercaya, seperti keluarga atau teman dekat. Mereka dapat memberikan dukungan emosional dan praktis, serta membantu mengurangi beban yang Anda rasakan.</span>';
            } else {
                echo 'Kesehatan mental anda sangat tidak sehat!';
                echo '<span>Segera menghubungi profesional kesehatan mental, seperti psikolog atau psikiater, untuk mendapatkan penilaian dan perawatan yang tepat. Mereka memiliki pengetahuan dan pengalaman yang diperlukan untuk membantu memahami dan mengatasi tantangan kesehatan mental.</span>';
            }
        ?>

    </p>
    
    <a href="dashboard.php">Kembali</a>
</div>

</body>
</html>