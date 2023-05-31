<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- styling -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="form">
        
        <form action="registerAction.php" method="post">

            <h1>Sign Up</h1>

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

            <div class="input-box">
                <input type="password" name="confirmPassword" id="" required>
                <label for="password">Confirm Password</label>
            </div>
    
            <br>
            <br>
    
            <input type="submit" value="Register">
            
            <br>
            <br>
            <br>

            <p>Sudah memiliki akun? <span><a href="LoginForm.php">Masuk disini.</a></span></p>

        </form>

    </div>
    
</body>
</html>