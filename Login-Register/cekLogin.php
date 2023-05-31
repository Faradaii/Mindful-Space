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

    try {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $result = mysqli_fetch_array($data);
        $cek = mysqli_num_rows($data);

        if ($cek > 0){
            $_SESSION['username'] = $username;
            header("location:LoginForm.php?pesan=loginberhasil&role={$result['role']}");
        } else {
            header ("location:LoginForm.php?pesan=gagal");
        }
    } catch (mysqli_sql_exception $e) {
        var_dump($e);
    }
?>
</body>
</html>