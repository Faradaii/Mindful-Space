<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- styling -->
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/nav-style.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
    <?php
    session_start();
    if (isset($_SESSION['role'])) {
        header("location:LoginForm.php?pesan=loginberhasil&role=".$_SESSION['role']);
    }
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'loginberhasil') {
                switch ($_SESSION['role']) {
                    case 'user':
                        header("location:../Dashboard-User/dashboard.php");
                        break;
                    case 'admin':
                        header("location:../Dashboard-Administrator/dashboard.php");
                        break;
                    case 'dokter':
                        header("location:../Dashboard-Dokter/dashboard.php");
                        break;
                }
            } else {
                ?>
                <script>
                    alert("login tidak berhasil");
                </script>
                <?php
            }
        }
    ?>


<div class="form">

        <nav>
        
            <div class="logo">
                <h1>MINDFUL <span>SPACE</span></h1>
            </div>
        
            <div class="navigation">

                <ul>

                    <a href="../Homepage/HomePage-Visitor.php">
                        <li class="beranda">Beranda</li>
                    </a>
                
                    <li class="fasilitas__hover">

                        <a href="../HomePage/Fasilitas.php" class="fasilitas__check">Fasilitas</a>

                    </li>
                    
                    <li>

                        <input type="radio" id="layanan">
                        <label for="layanan" class="layanan__check">Layanan <i class="fa fa-chevron-down"></i></label>

                        <ul class="layanan__dropdown dropdown">
                            <a href="../Dashboard-User/konseling.php">
                                <li>Konseling</li>
                            </a>
                            <a href="../Dashboard-User/tesmental.php">
                                <li>Tes Kesehatan Mental</li>
                            </a>
                        </ul>       

                    </li>

                </ul>

            </div>
        
        </nav>
        
        <img src="https://img.freepik.com/free-photo/beautiful-architecture-office-business-building-with-glass-window-shape_74190-6438.jpg?size=626&ext=jpg&ga=GA1.1.629320682.1661959596&semt=sph" alt="">
        
        <form action="cekLogin.php" method="post">

            <h1>SIGN IN</h1>

            <br>

            <div class="form__group field">
                <input type="text" name="username" id="" class="form__field" placeholder="Username" required autocomplete="off">
                <label for="username" class="form__label">Username</label>
            </div>
    
            <br>
            <br>
    
            <div class="form__group field">
                <input type="password" name="password" id="" class="form__field" placeholder="Password" required>
                <label for="password" class="form__label">Password</label>
            </div>
    
            <br><br><br>
    
            <input type="submit" value="Log In">
            
            <br>

            <p>Tidak memiliki akun? <span><a href="RegisterForm.php">Daftar disini.</a></span></p>

        </form>

    </div>

    <script src="../Dashboard-User/styling/script.js"></script>
    
</body>
</html>