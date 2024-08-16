<?php
    session_start();
    session_destroy();   //lgsg menghaspus semua session user

    header('location:login.php');
?>