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
    require_once "../Helper/ConnectionUtil.php";
    use Helper\ConnectionUtil;
    if(isset($_GET['message'])){
        $alertgagal = <<<JAVASCRIPT
        <script>
            alert('gagal mendapatkan dokter available atau waktu yang anda masukan tidak tersedia');
            window.location = 'konseling.php';
        </script>
        JAVASCRIPT;
        $alertsukses = <<<JAVASCRIPT
        <script>
            alert('Telah berhasil mendaftar ke dokter $_SESSION[namadokter] di jam $_SESSION[waktukonsul]');
            window.location = 'dashboard.php';
        </script>
        JAVASCRIPT;
        if($_GET['message'] == 'gagal'){
            echo $alertgagal;
        } else if($_GET['message'] == 'sukses'){
            echo $alertsukses;
        }
    }

    if (isset($_SESSION['waktukonsul'])){
        $autodirect = <<<JAVASCRIPT
        <script>
            window.location = 'dashboard.php?messagekonsul=sudahbooking&jam=$_SESSION[waktukonsul]';
        </script>
        JAVASCRIPT;
        echo $autodirect;
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
        
        <label for="dokter">Pilih Dokter</label>
        <select name="dokter" id="dokter" required>
            <option selected value="">Silahkan Pilih Dokter Anda</option>
            <?php 
            $queryShowAvailableDokters = <<<SQL
                SELECT identitas.namalengkap, dokters.* FROM `dokters` JOIN identitas ON dokters.id_dokter = identitas.id_user AND `status` = '1'
            SQL;
            $queryShowDokterName = <<<SQL
                SELECT namalengkap, id_user FROM `identitas`
            SQL;
            $data = mysqli_query(ConnectionUtil::connect(), $queryShowAvailableDokters);
            while ($result = mysqli_fetch_array($data)) {
                echo <<<HTML
                <option value="$result[id_dokter]">$result[namalengkap]</option>
                HTML;
            }
            ?>
        </select>

        <br><br><br>

        <label for="waktu">Waktu</label>
        <select name="waktu" id="waktu" disabled required>
            <script>
                let pilihdokter = document.querySelector("#dokter");
                let waktu = document.querySelector("#waktu");
                pilihdokter.addEventListener("change", function(){
                    if (!pilihdokter.value == "") {
                        waktu.disabled = false;
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                waktu.innerHTML = (this.responseText);
                            }
                        };
                        xhttp.open("GET", "scriptDapatkanWaktuDokter.php?dapatkanWaktuDokter="+pilihdokter.value, true);
                        xhttp.send();
                    } else {
                        waktu.value = "";
                        waktu.disabled = true;
                    }
                });
            </script>
        </select>
        <small>*beberapa waktu mungkin tidak tersedia</small>
        
        <br><br><br><br><br>

        <div>

            <a href="dashboard.php">Batal</a>    

            <input type="submit" value="Booking">

        </div>
        
    </form>

</main>

<script src="styling/script.js"></script>

</body>
</html>