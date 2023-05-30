<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check</title>
</head>
<body>
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (nanti diisi){
        $_SESSION['username'] = $username;
        header("location:LoginForm.php?pesan=login berhasil&role={$role['role']}")
    } else {
        header ("location:LoginForm.php?pesan=gagal")
    }
</body>
</html>