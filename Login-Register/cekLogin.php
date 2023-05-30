<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check</title>
</head>
<body>
    <?php
    session_start();
    include 'connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE `username` = $username AND `password` = $password");
    $role = mysqli_fetch_array($data);

    if (isset($role)){
        $_SESSION['username'] = $username;
        header("location:LoginForm.php?pesan=loginberhasil&role={$role['role']}");
    } else {
        header ("location:LoginForm.php?pesan=gagal");
    }
?>
</body>
</html>