<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="styling/nav-style.css">
    <link rel="stylesheet" href="styling/update-style.css">
    <link rel="stylesheet" href="styling/style.css">
    <link rel="stylesheet" href="styling/dropdown-style.css">
    <link rel="stylesheet" href="styling/main-style.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("location: ../Login-Register/LoginForm.php");
}
require_once "../Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;

$id = $_GET['id'] ?? null;
$data = mysqli_query(ConnectionUtil::connect(), "SELECT*FROM newspaper WHERE id='$id'");
$result = mysqli_fetch_array($data);
?>
   
   
<form action = "editNews.php" method = "post" enctype="multipart/form-data">
<div class="container">
<input type="hidden" name="id" value="<?php echo $result['id']?>">
<input type="text" hidden name="url_image" value="<?php echo $result['url_image']?>">


        <div class="left">
            <div>
                <p>image</p>
            </div>
            <div>
                <p>judul</p>
            </div>
            <div>
                <p>deskripsi</p>
            </div>
            <div>
                <p>Link</p>
            </div>
            <div>
                <form action="Dashboard.php">

                <button class="back" style="color: white;">
                    <i class="fa-solid fa-arrow-left" style="margin-inline: 5%; color: white;"></i>
                    Back
                </button>

                </form>
            </div>
        </div>
        <div class="right">
            <div>
                <label class="label-upload">
                    <input type="file" name="gambar" id="gambar" accept=".png, .jpg">
                    Upload File
                </label>
            </div>
            <div>
                <input type ="text" name = "judul" value="<?php echo $result['judul']; ?>">
            </div>
            <div>
                <input type ="text" name = "deskripsi" value="<?php echo $result['deskripsi']; ?>">
            </div>
            <div>
                <input type ="text" name = "link" value="<?php echo $result['link']; ?>">
            </div>
            <div class="editdiv">
                <button type="submit" class="editbutton" style="color: white;">Edit News</button>
            </div>
        </div>
       
    </div>
</form>

</body>
</html>