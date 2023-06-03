<?php
session_start();
session_destroy();
header("location:../Login-Register/LoginForm.php");