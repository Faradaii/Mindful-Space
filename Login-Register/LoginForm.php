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

</head>
<body>
    
    <?php
    session_start();

    if (isset($_SESSION['username'])) {
        // todo ubah ini inget
        header("location:dashboard.php");
    }

    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'success') {
            // todo ubah ini inget
            header("location:dashboard.php");
        } else {
            ?>
            <script>

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
                    <a href="">
                        <li>Home</li>
                    </a>
                    
                    <a href="">
                        <li>Fasilitas</li>
                    </a>
                    
                    <a href="">
                        <li>Layanan</li>
                    </a>
                </ul>
            </div>
        
        </nav>
        
        <img src="https://img.freepik.com/free-photo/beautiful-architecture-office-business-building-with-glass-window-shape_74190-6438.jpg?size=626&ext=jpg&ga=GA1.1.629320682.1661959596&semt=sph" alt="">
        
        <form action="../Action/LoginAction.php" method="post">

            <h1>SIGN IN</h1>

            <br>

            <div class="form__group field">
                <input type="text" name="username" id="" class="form__field" placeholder="Username" required>
                <label for="username" class="form__label">Username</label>
            </div>
    
            <br>
            <br>
    
            <div class="form__group field">
                <input type="password" name="password" id="" class="form__field" placeholder="Password" required>
                <label for="password" class="form__label">Password</label>
            </div>
    
            <br><br><br>
    
            <input type="submit" name="login-button" value="Log In">
            
            <br>

            <p>Tidak memiliki akun? <span><a href="RegisterForm.php">Daftar disini.</a></span></p>

        </form>

    </div>
    
</body>
</html>