<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dokter</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styling -->
        <link rel="stylesheet" href="styling/nav-style.css">
        <link rel="stylesheet" href="styling/.css">
        <link rel="stylesheet" href="styling/.css">
        <link rel="stylesheet" href="styling/.css">

</head>
<body>
<?php
    session_start();
    if ($_SESSION['role'] != 'dokter') {
        header('location:../Login-Register/LoginForm.php');
    }
   ?>
    
    <nav>

        <div class="logo">
            <h1>MINDFUL <span>SPACE</span></h1>
        </div>

        <div>
            Dokter Budhi
        </div>
        <a href="../Login-Register/Logout.php" class="logout">
                    <li>Log Out</li>
                </a>

    </nav>


</body>
</html>
