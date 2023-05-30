<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- styling -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'login berhasil') {
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
        
        <form action="CekLogin.php" method="post">

            <h1>Sign In</h1>

            <br>

            <div class="input-box">
                <input type="text" name="username" id="" required>
                <label for="username">Username</label>
            </div>
    
            <br>
    
            <div class="input-box">
                <input type="password" name="password" id="" required>
                <label for="password">Password</label>
            </div>
    
            <br>
            <br>
    
            <input type="submit" value="Log In">
            
            <br>
            <br>
            <br>

            <p>Tidak memiliki akun? <span><a href="RegisterForm.php">Daftar disini.</a></span></p>

        </form>

    </div>
    
</body>
</html>