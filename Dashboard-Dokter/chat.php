<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="refreshChat.js"></script>
</head>
<body>
<a href="Dashboard.php">Kembali</a>
<h2>List Chats</h2>
<?php

//history chat
session_start();
include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;
echo $_SESSION['id'];
$myid = $_SESSION['id'];
$listchat = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM historychat WHERE id_to = '$myid' ORDER BY id DESC LIMIT 5");
// $historychat = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM chats WHERE id_from = '$myid'");

while ($fromWho = mysqli_fetch_array($listchat)) {
    $from = $fromWho['id_from'];
    $userdatas =  mysqli_query(ConnectionUtil::connect(), "SELECT * FROM users WHERE id = '$from'");
    while ($userdata = mysqli_fetch_array($userdatas)){
        $user_id = $userdata['id'];
        echo
        "<form method='post' action='scriptChat.php?'>
            <input type='text' name='id_from' hidden value='$user_id'>
            <input type='text' name='help' value='true' hidden>
            <button type='submit'>$userdata[$from]</button>
        </form>";
    }
}
?>
<hr/>
<h2>Chat</h2>

    <div id="chatAutoRefresh">
    </div>  
    
    <form method='post' action='addChat.php'>
        <input type='text' name='isiChat'>
        <button type='submit'>Send</button>
        <input type='text' name='idFrom' hidden value='<?php echo $myid?>'>
        <input type='text' name='idTo' hidden value='<?php echo $otherid?>'>
        <input type='text' name='ref' hidden value='<?php echo $ref?>'>
    </form>
    <hr>
    <h2>About</h2>
    <?php
    if (isset($_SESSION['fromWho'])) {
        $otherid = $_SESSION['fromWho'];

        $userData = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM users WHERE id = '$otherid'");
        while ($userAbout = mysqli_fetch_array($userData)){
            echo $userAbout['username'].'<br/>';
            echo $userAbout['password'].'<br/>';
            echo $userAbout['role'].'<br/>';
    }
}
?>

</body>
</html>



