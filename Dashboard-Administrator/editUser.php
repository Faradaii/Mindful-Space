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
    include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

    $id = $_GET['id'];

    $data = mysqli_query(ConnectionUtil::connect(), "SELECT*FROM users WHERE id = '$id'");
    
    $result = mysqli_fetch_array($data);
?>
<form action = "editUserAction.php" method = "post">
    <table>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $result['id']; ?>"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type ="text" name = "username" value="<?php echo $result['username']; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type ="text" name = "password" value="<?php echo $result['password']; ?>"></td>
        </tr>
        <tr>
            <td>Role</td>
            <td>
                <select type ="text" name = "role" value="<?php echo $result['role']; ?>">
                    <?php 
                        if ($result['role'] == 'dokter') {?>
                        <option value="dokter" selected>Dokter</option>
                        <option value="user" >User</option>
                        <?php 
                        } else {?>
                        <option value="user" selected>User</option>
                        <option value="dokter" >Dokter</option>
                        <?php 
                        }?>
                    ?>
                </select>
            </td>
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