<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dokter</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styling -->
        <!-- <link rel="stylesheet" href="styling/nav-style.css">
        <link rel="stylesheet" href="styling/.css">
        <link rel="stylesheet" href="styling/.css">
        <link rel="stylesheet" href="styling/.css"> -->

</head>
<body>
<?php
    session_start();
    include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;
    if ($_SESSION['role'] != 'dokter') {
        header('location:../Login-Register/LoginForm.php');
    }
    //ini kalo keluar chat biar session sebelumnya keresets
    unset($_SESSION['fromWho']);
    unset($_SESSION['id_from']);

    //testing session
    echo $_SESSION['username'];
    $myId = $_SESSION['id'];
?>
    <a href="chat.php">Chat Section</a>
    <a href="statusSetting.php">Status Setting</a>
    <a href="infoakun.php">info akun</a>
    
    <nav>

        <div class="logo">
            <h1>MINDFUL <span>SPACE</span></h1>
        </div>

        <div>
            <?php echo $_SESSION['username']; ?>
        </div>
        <a href="../Login-Register/Logout.php" class="logout">
                    <li>Log Out</li>
                </a>

    </nav>

    <?php
    // <!-- fetch data dari table antrian where id_dokter = $_SESSION['id'] -->
    $myId = $_SESSION['id'];
    $data = mysqli_query(ConnectionUtil::connect(), "SELECT users.username, antrian.* 
                                                    FROM antrian JOIN users 
                                                    ON antrian.id_pasien = users.id
                                                    WHERE id_dokter = $myId ");
    // SELECT tb_buku.*, tb_kategori.name FROM tb_buku JOIN tb_kategori ON tb_buku.kategori_id = tb_kategori.id
    // while ($row = mysqli_fetch_array($data)){
    print_r(mysqli_fetch_all($data));
    // }
    ?>


</body>
</html>
