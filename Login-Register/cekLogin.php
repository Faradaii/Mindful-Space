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
    include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

    try {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $result = mysqli_fetch_array($data);
        $cek = mysqli_num_rows($data);

        if ($cek > 0){
            $id_user = $result['id'];
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result['id'];
            $_SESSION['role'] = $result['role'];

            //otomatis membentuk identitas jika baru pertama kali login
            $dataIsExist = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM identitas WHERE id_user = '$id_user'");
            $isExist = mysqli_num_rows($dataIsExist);
            if ($isExist == 0){
                if ($result['role'] == 'dokter') {
                    mysqli_query(ConnectionUtil::connect(), "INSERT INTO dokters (id_dokter, status) VALUES ('$id_user', '0')");
                }
                mysqli_query(ConnectionUtil::connect(), "INSERT INTO identitas (id, id_user, namalengkap) VALUES (DEFAULT, '$id_user', '$username')");
            }
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