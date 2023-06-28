<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
                    header("location:LoginForm.php");
                }
                
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == 'registerberhasil') {
                        header("location:LoginForm.php");
                    } else {
                        ?>
                        <script>
                            alert("Wrong password, Try again!");
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

                    <ul class="layanan__dropdown">
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


        <form action="cekRegister.php" method="post">

            <h1>SIGN UP</h1>

            <div class="form__group field">
                <input class="form__field" type="text" name="username" id="" required placeholder="Username" autocomplete="off">
                <label class="form__label" for="username">Username</label>
            </div>
    
            <br>
    
            <div class="form__group field">
                <input class="form__field" type="password" name="password" id="" required placeholder="Password">
                <label class="form__label" for="password">Password</label>
            </div>

            <br>

            <div class="form__group field">
                <input class="form__field" type="password" name="confirmPassword" id="" required placeholder="Confirm Password">
                <label class="form__label" for="password">Confirm Password</label>
            </div>
    
            <br>
            <br>
            <br>
    
            <input type="submit" value="Register">
            
            <br>

            <p>Sudah memiliki akun? <span><a href="LoginForm.php">Masuk disini.</a></span></p>

        </form>

    </div>
    
    <script src="../Dashboard-User/styling/script.js"></script>

</body>
</html>