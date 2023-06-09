<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once "Helper/ConnectionUtil.php";
use Helper\ConnectionUtil;

$id = $_GET['id'] ?? null;
$data = mysqli_query(ConnectionUtil::connect(), "SELECT*FROM newspaper WHERE id_news='$id'");
$result = mysqli_fetch_array($data);
?>
<form action = "editNews.php" method = "post">
    <table>
        <tr>
            <td><input type="hidden" name="id_news" value="<?php echo $result['id_news']; ?>"></td>
        </tr>
        <tr>
            <td>image</td>
            <td><input type ="text" name = "url_image" value="<?php echo $result['url_image']; ?>"></td>
        </tr>
        <tr>
            <td>judul</td>
            <td><input type ="text" name = "judul" value="<?php echo $result['judul']; ?>"></td>
        </tr>
        <tr>
            <td>deskripsi</td>
            <td><input type ="text" name = "deskripsi" value="<?php echo $result['deskripsi']; ?>"></td>
        </tr>
        <tr>
        <td>
            <button type = "submit">Edit News</button>
        </td>
        </tr>
    <table>
</form>
</body>
</html>