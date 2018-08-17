<?php
include 'conn.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$login    = mysqli_query($connect, "select * from user where username='$username' and password='$password'");
$result   = mysqli_num_rows($login);
if($result>0){
    $user = mysqli_fetch_array($login);
    session_start();
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['fullname'] = $user['fullname'];
    $_SESSION['level'] = $user['level'];
    header('location:cek.php');
}else{
    echo "Redirecting...";
    echo "<script>
         function kembali()
         {
         alert(\"Data Yang Anda Masukkan Salah :D\");
         location.href='login.php';
         }   
         kembali();
         </script>";
    exit;
}