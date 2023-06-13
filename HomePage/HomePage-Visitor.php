<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page | Home</title>

    <!-- Styling -->
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/nav-style.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">
    <link rel="stylesheet" href="styling/section-one-styling.css">
    <link rel="stylesheet" href="styling/footer-style.css">

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

                <a href="">
                    <li class="beranda">Beranda</li>
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
                        <a href="">
                            <li>Konseling</li>
                        </a>
                        <a href="">
                            <li>Rehabilitasi</li>
                        </a>
                        </a>
                        <a href="">
                            <li>Tes Kesehatan Mental</li>
                        </a>
                    </ul>       

                </li>

                <li><hr></li>

                <a href="../Login-Register/LoginForm.php" class="login">
                    <li>LOG IN</li>
                </a>

                <!-- Garis biru dibawah navigasi -->
                <div class="underline"></div>

            </ul>

        </div>
    
    </nav>

    <br><br><br><br><br><br><br>

    <main>

        <section class="welcome">

            <div class="welcome__text">

                <h2>Hai, selamat datang!</h2>

                <h1>Kami ada untuk<br>
                <span>Kesehatan mental</span>
                <br>Kita semua.</h1>

                <br><br>

                <p><strong>Kesehatan Mental</strong> bukanlah kelemahan, 
                melainkan kekuatan yang mendalam. Berani hadapi perasaanmu, 
                terimalah dirimu apa adanya, dan bangunlah dengan kekuatan 
                yang baru setiap harinya.</p> 

            </div>

            <div class="welcome__image">
                <img src="../image/BudhiSwag-removebg-preview.png" alt="" class="blur">
                <img src="../image/BudhiSwag-removebg-preview.png" alt="" class="main__img">
            </div>

        </section>

        <section class="artikel">

            <h1>Baca artikel terbaru.</h1>

            <div class="list__artikel">
                <?php 
                    require_once "../Helper/ConnectionUtil.php";
                    use Helper\ConnectionUtil;

                    $data = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM newspaper ORDER BY id DESC LIMIT 3");
                    $result = mysqli_fetch_all($data);
                ?>

                <div class="artikel__satu">

                    <!-- <?php print_r($result) ?> -->
                    <img src="<?php echo $result[0][1] ?>" alt="">
                    
                    <h1><?php echo $result[0][2] ?></h1>

                    <p><?php echo $result[0][3] ?></p>
                    
                    <p>
                        <a href="<?php echo $result[0][4] ?>">
                            See artikel ->
                        </a>
                    </p>

                </div>

                <div class="artikel__dua">

                    <img src="<?php echo $result[1][1] ?>" alt="">
                    
                    <h1><?php echo $result[1][2] ?></h1>

                    <p><?php echo $result[1][3] ?></p>
                    
                    <p>
                        <a href="<?php echo $result[1][4] ?>">
                            See artikel ->
                        </a>
                    </p>

                </div>

                <div class="artikel__tiga">

                    <img src="<?php echo $result[2][1] ?>" alt="">
                    
                    <h1><?php echo $result[2][2] ?></h1>

                    <p><?php echo $result[2][3] ?></p>
                    
                    <p>
                        <a href="<?php echo $result[2][4] ?>">
                            See artikel ->
                        </a>
                    </p>

                </div>

            </div>

        </section>

    </main>

    <br><br><br><br><br><br><br>

    <footer>

        <div class="top">

            <div class="logo footer">
                <h1>MINDFUL <span>SPACE</span></h1>
            </div>
    
            <div class="kontak">
                <h2>Ikuti kami di</h2>
    
                <div>
                    <a target="_blank" href="https://wa.me/+628113978683"><i class="fa-brands fa-square-whatsapp"></i></a>
                    <a target="_blank" href="https://www.instagram.com/Made_Budhi"><i class="fa-brands fa-square-instagram"></i></a>
                    <a target="_blank" href="https://www.github.com/Made-Budhi"><i class="fa-brands fa-square-github"></i></a>
                </div>
            </div>
        
        </div>

        <div class="copyright">
            <p>	&#169; MINDFUL SPACE, 2023. ALL RIGHTS RESERVED</p>
        </div>

    </footer>

    <script src="styling/script.js"></script>
    
</body>
</html>