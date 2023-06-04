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
    include "konek.php";

    $id = $_GET['id'];

    $data = mysqli_query($konek, "SELECT*FROM dashboard WHERE id = '$id'");
    
    $result = mysqli_fetch_array($data);
?>
<form action = "editUse.php" method = "post">
    <table>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $result['id']; ?>"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type ="text" name = "username" value="<?php echo $result['username']; ?>"></td>
        </tr>
        <tr>
        <td>
            <button type = "submit">Edit User</button>
        </td>
        </tr>
    <table>
</form>
<?php

?>
</body>
</html>