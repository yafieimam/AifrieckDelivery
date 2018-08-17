<?php
    session_start();
    if(!isset($_SESSION['username']) && $_SESSION['level'] != "admin")
    {
        echo "Redirecting...";
        echo "<script>
        function kembali()
        {
        alert(\"Maaf, Anda Harus Login Dahulu !\");
        location.href='../index.php';
        }   
        kembali();
        </script>";
        exit;
    }
?>
