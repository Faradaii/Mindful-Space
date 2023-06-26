<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konseling</title>

    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/nav-konseling.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">
    <link rel="stylesheet" href="styling/konseling.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
<?php
    session_start();
    if(isset($_GET['message'])){
        if($_GET['message'] == 'gagal'){
            echo '<script> alert("gagal mendapatkan dokter available atau waktu yang anda masukan tidak tersedia")</script>';
        }
    }

    if(isset($_SESSION['waktukonsul'])){
        header('location:dashboard.php?messagekonsul=sudahbooking&jam='.$_SESSION['waktukonsul']);
    }

    $queueTimeQuery = <<<SQL

    SQL;
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
            <div class="underline"></div>

        </ul>

    </div>
 
</nav>

<br><br><br><br><br><br><br><br>

<main>

    <br><br><br>

    <h1>Silahkan isi data berikut!</h1>

    <br><br><br>

    <form action="proseskonseling.php" method="post">

        <label for="keluhan">Keluhan</label>
        <input type="text" name="keluhan" id="keluhan">

        <br><br><br>

        <label for="waktu">Waktu</label>
        <select name="waktu" id="waktu">
            <?php 
            for ($i = 8; $i <= 19; $i++) {
                $d = strtotime("$i:00");
                $time = date("H", $d);
                echo <<<HTML
                <option value="$i">$time.00</option>
                HTML;
            }
            ?>
        </select>
        
        <br><br><br><br><br>

        <div>

            <a href="dashboard.php">Batal</a>    

            <input type="submit" value="Cari Dokter">

        </div>
        
    </form>

</main>

<script src="styling/script.js"></script>

</body>
</html>