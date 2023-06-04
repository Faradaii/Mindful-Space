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
    include 'konek.php';

    
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    
    mysqli_query($konek, "UPDATE dashboard SET username='$username', password='$password', role='$role' WHERE id='$id'");
    header("location:dashboard.php")
    ?>
</body>
</html>