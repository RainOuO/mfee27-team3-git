<?php

session_start();
if(isset($_SESSION["user"])){
    session_destroy();
}

header("location: 03.login.php");
?>