<!DOCTYPE html>
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
    include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

    $id = $_GET['id'];

    $data = mysqli_query(ConnectionUtil::connect(), "SELECT*FROM users WHERE id = '$id'");
    
    $result = mysqli_fetch_array($data);
?>
    
<form action = "editUserAction.php" method = "post">
<div class="container">
<input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        <div class="left">
            <span style="margin-top: 0.6rem;"></span>
            <div>
                <p>Username</p>
            </div>
            <div>
                <p>Password</p>
            </div>
            <div>
                <p>Role</p>
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
            <input type ="text" name = "username" value="<?php echo $result['username']; ?>">
            </div>
            <div>
            <input type ="text" name = "password" value="<?php echo $result['password']; ?>">
            </div>
            <input type="text" name="roleBefore" value="<?php echo $result['role']; ?>" hidden>
            <div>
            <select type ="text" name = "role" value="<?php echo $result['role']; ?>" id="inputbutton">
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
            </div>
            <div class="editdiv">
                <button type = "submit" class="editbutton" style="color: white;">Edit User</button>
            </div>
        </div>
</div>
</form>

</body>
</html>