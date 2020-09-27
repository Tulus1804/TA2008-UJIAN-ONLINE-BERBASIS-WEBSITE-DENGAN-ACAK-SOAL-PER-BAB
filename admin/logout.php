<?php 

    session_start();
    unset($_SESSION["adminid"]);
    unset($_SESSION["namauser"]);
    header('location: login.php');

?>