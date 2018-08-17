<?php
    include 'fbconfig.php';
    if(!isset($_SESSION['username']) && !isset($accessToken))
    {
        echo "Redirecting...";
        echo "<script>
        function kembali()
        {
        alert(\"Maaf, Anda Harus Login Dahulu !\");
        location.href='index.php';
        }   
        kembali();
        </script>";
        exit;
    }
?>
