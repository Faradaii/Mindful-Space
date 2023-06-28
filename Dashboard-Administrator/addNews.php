<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("location: ../Login-Register/LoginForm.php");
    }
    include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;
   
    $judul = $_POST["judul"];
    $desc = $_POST["deskripsi"];
    $link = $_POST["link"];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$data = mysqli_query(ConnectionUtil::connect(), "SELECT id FROM newspaper");
$idResult = 1;

if (is_null($idResult)) {
    $idResult=1;
}
while ($result = mysqli_fetch_array($data)){
    $idResult = $result['id']+1;
}

//renaming file dengan id didapat dari id database newspaper 
$renamedFile = $target_dir ."article-image-".$idResult.".".$imageFileType;
// ini juga nanti distore ke database mindful-space table newspaper field url
//todo buat query sql insert into database table field url

    mysqli_query(ConnectionUtil::connect(), "INSERT INTO newspaper VALUES (DEFAULT, '$renamedFile','$judul', '$desc', '$link')");
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $renamedFile)) {
        echo 'berhasil upload';
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
    $currentshow = $_POST['currentshow'];
    header("location:dashboard.php?show=".$currentshow);
    ?>
</body>
</html>