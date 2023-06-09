<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action = "addNews.php" method = "post">
    <table>
        <tr>
            <td>url image</td>
            <td><input type ="text" name = "url_image"></td>
        </tr>
        <tr>
            <td>judul</td>
            <td><input type="text" name = "judul"></td>
        </tr>
        <tr>
            <td>deskripsi</td>
            <td><textarea name="deskripsi" rows="3"></textarea></td>
        </tr>
    <table>
    <br>
    <button type = "submit">Tambah news</button>
</body>
</html>