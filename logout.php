<?php 
  include "conn.php";
  include 'fbConfig.php';
  // include 'gpConfig.php';
  unset($_SESSION['facebook_access_token']);
  // unset($_SESSION['token']);
  unset($_SESSION['userData']);
  // $gClient->revokeToken();
  session_destroy();
  $hasil = mysqli_query($connect, "DELETE FROM cart");
  echo "Redirecting...";
        echo "<script>
        function kembali()
        {
        alert(\"Berhasil Logout !\");
        location.href='index.php';
        }   
        kembali();
        </script>";
        exit;
?>
