<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | User</title>

    <!-- Styling -->
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/nav-style.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">
    <link rel="stylesheet" href="styling/dashboard-style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
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

                <input type="radio" name="nav" id="fasilitas">
                <label for="fasilitas" class="fasilitas__check">Fasilitas <i class="fa fa-chevron-down"></i></label>

                <ul class="fasilitas__dropdown dropdown">
                    <a href="">
                        <li>Ruang Konseling</li>
                    </a>
                    <a href="">
                        <li>Farmasi</li>
                    </a>
                </ul>                        

            </li>
            
            <li class="layanan__hover">

                <input type="radio" name="nav" id="layanan">
                <label for="layanan" class="layanan__check">Layanan <i class="fa fa-chevron-down"></i></label>

                <ul class="layanan__dropdown dropdown">
                    <a href="konseling.php">
                        <li>Konseling</li>
                    </a>
                    <a href="">
                        <li>Rehabilitasi</li>
                    </a>
                    </a>
                    <a href="tesmental.php">
                        <li>Tes Kesehatan Mental</li>
                    </a>
                </ul>       

            </li>

            <li><hr></li>

            <a href="../Login-Register/LoginForm.php" class="logout">
                <li>LOG OUT</li>
            </a>

            <!-- Garis biru dibawah navigasi -->
            <div class="underline"></div>

        </ul>

    </div>
 
</nav>

<br><br><br><br>
<br><br><br><br>

<h1 style="font-family: 'Montserrat'; font-weight: 700;">Halo, <?php echo "BudhiPro" ?>!</h1>

<br><br>

<main>

    <section class="left__col">

        <div class="image">

            <img src="../image/BudhiSwag-removebg-preview.png" alt="">
    
        </div>

        <label for="change__profile">
            <img src="../image/CameraIcon.svg" alt="">
        </label>
        
        <form action="">
            
            <label for="nama__lengkap"><img src="../image/NamaLengkapIcon.svg" alt=""> Nama Lengkap</label>
            <input type="text" name="nama" id="nama__lengkap" value="" autocomplete="off">
        
            <label for="usia"><img src="../image/UsiaIcon.svg" alt=""> Usia (Tahun)</label>
            <input type="number" name="usia" id="usia" value="">

            <label for="gender"><img src="../image/GenderIcon.svg" alt=""> Jenis Kelamin</label>
            <select name="gender" id="gender">
                <option value="laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
            </select>

            <label class="save-button">
                <input type="button" class="thebutton" id="editbutton" value="Edit">
            </label>

        </form>

    </section>

    <section class="right__col">

        <div class="kanan">

            <a href="fasilitas.php" class="card">
                <img src="../image/FasilitasIcon.svg" alt="" class="gambar">
                <br>
                <p>Fasilitas</p>
            </a>
            
            <a href="konseling.php" class="card">
                <img src="../image/KonselingIcon.svg" alt="" class="gambar">
                <br>
                <p>Konseling</p>
            </a>

        </div>

        <div class="kiri">

            <a href="riwayatkonseling.php" class="card">
                <img src="../image/RiwayatKonselingIkon.svg" alt="" class="gambar">
                <br>
                <p>Riwayat Konseling</p>
            </a>

            <a href="tesmental.php" class="card">
                <img src="../image/TesKesehatanMentalIcon.svg" alt="" class="gambar">
                <br>
                <p>Tes Kesehatan</p>
            </a>

        </div>
        
    </section>

</main>

<br><br><br>

<script src="styling/script.js"></script>

</body>
</html>