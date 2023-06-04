<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <form action="dashboard.php" method="post">
    <table>
        <td><input type="submit" name = "showTable" value="user"></td>
    </tr>
    </table>
    </form>
    <?php 
    require_once "konek.php";
    $dataUser = mysqli_query($konek, "SELECT*FROM dashboard WHERE role = 'user'");
    $totalUser=0;
    while($arrayOfUser = mysqli_fetch_array($dataUser)){
        $totalUser++;
    };
    echo $totalUser;
    ?>
    <form action="dashboard.php" method="post">
    <table>
        <td><input type="submit" name = "showTable" value="dokter"></td>
    </tr>
    </table>
    </form>
    <?php 
    require_once "konek.php";
    $dataDokter = mysqli_query($konek, "SELECT*FROM dashboard WHERE role = 'dokter'");
    $totalDokter=0;
    while($arrayOfDokter = mysqli_fetch_array($dataDokter)){
        $totalDokter++;
    };
    echo $totalDokter;
    ?>
    <br>
    <button><a href="tambahDokter.php">Tambah Dokter</a></button>
    
    
    
    <form action="logout.php" method="post">
        <table>
            <tr>
                <td><input type="submit" value="Logout"></td>
            </tr>
        </table>
    </form>

    <?php
    $role = "user";
    if (isset($_POST["showTable"])) {
        $role = $_POST['showTable'];
    }
    ?>
    <table border = "1">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Spesialis</td>
        <td>Role</td>
    </tr>
<?php 
include "konek.php";

$no = 1;
$batas =5; // <-- Magic number
$halaman= @$_GET['halaman'];
if (empty($halaman)){
    $posisi= 0;
    $halaman= 1;
} else {
    $posisi = ($halaman-1)* $batas;
    $no = $posisi + 1;
}

$data = mysqli_query($konek, "SELECT*FROM dashboard WHERE role = '$role'");
$jmldata= mysqli_num_rows($data);
$jmlhal = ceil($jmldata/$batas);

echo "<br> halaman";

for ($i=1; $i <= $jmlhal; $i++) {
    if ($i != $halaman){
        echo "<a href=\"dashboard.php?halaman=$i\">$i</a> |";
    } else {
        echo "<b>$i</b> |";
    }
}
 
// kalo di klik berubah cok. 
$data = mysqli_query($konek, "SELECT*FROM dashboard WHERE role = '$role' LIMIT $posisi,$batas");
while ($result = mysqli_fetch_array($data)) {
?>
    <tr>
        <td> <?php echo $no++ ?></td>
        <td> <?php echo $result["username"] ?></td>
        <td> <?php echo $result["password"] ?></td>
        <td> <?php echo $result["role"] ?></td>
        <td>
            <button><a href="editUser.php?id=<?php echo $result['id']; ?>">Update <?php echo $role?></a></button>
            <button><a href="delUser.php?id=<?php echo $result['id']; ?>">Delete <?php echo $role?></a></button>
        </td> 
    </tr>
<?php 
}
?>
</table>

<h1>
Manajemen Artikel
</h1>
<form action="tambahNews.php" method="post">
<table>
<tr>
    <td><input type="submit" name = "news" value="Tambah news"></td>
</tr>
</table>
</form>

<table border = "1">
    <tr>
        <td>Gambar</td>
        <td>Judul</td>
        <td>Deskripsi</td>
        <td>Aksi</td>
    </tr>
<?php 
include "konek.php";
// kalo di klik berubah cok. 
$data = mysqli_query($konek, "SELECT*FROM newspaper"); // <-- Magic number
while ($result = mysqli_fetch_array($data)){
?>
    <tr>
        <td> <img src="<?php echo $result['url_image']?>" alt="" width="200px" height="300px"> </td>
        <td> <?php echo $result["judul"] ?></td>
        <td> <?php echo $result["deskripsi"] ?></td>
        <td>
            <button><a href="updateNews.php?id=<?php echo $result['id_news'];?>">Update news</a></button>
            <button><a href="delNews.php?id=<?php echo $result['id_news'];?>">Delete news</a></button>
        </td> 
    </tr>
<?php 
}
?>
</table>

</body>
</html>