<?php 
// memasukkan data database pada variabel
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "admin";

// menggunakan $konek sebagai perantara
$konek = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// mengecek jika koneksi berhasil
if (mysqli_connect_errno()){
    echo "koneksi gagal";
} else {
    echo "";
}
?>