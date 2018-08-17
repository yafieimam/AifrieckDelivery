<?php
    session_start();
    include 'conn.php';
    include "cek_session.php";
    if ($_SESSION[level] == "admin") { 
        header('location:admin/index.php');
    }
    if ($_SESSION[level] == "user"){
        header('location:index.php');
    }
?>