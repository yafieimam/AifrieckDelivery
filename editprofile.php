<?php
session_start();
include "conn.php";
include 'fbconfig.php';
include 'user.php';
if(isset($_SESSION['username']))
{
if(isset($_POST['id_user'])){

$id_user=$_POST['id_user'];
$username = $_POST['username'];
$password_lama = md5($_POST['password_lama']);
$password_baru = md5($_POST['password_baru']);
$confirm_password_baru = md5($_POST['confirm_password_baru']);
$fullname = $_POST['fullname'];
$email = $_POST['email'];

$cekuser = mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id_user' AND password='$password_lama'");
$count = mysqli_num_rows($cekuser);

if($count == 1){
        if($password_baru == $confirm_password_baru){
                $query = mysqli_query($connect, "UPDATE user SET username='$username', password='$password_baru', fullname='$fullname', email='$email' WHERE id_user='$id_user'");

                                echo "SUCCESS......";
                                echo "<script>
                                function kembali()
                                {
                                alert(\"Anda Telah Berhasil Mengupdate Data Profile!!)\");
                                location.href='index.php';
                                }   
                                kembali();
                                </script>";
                                exit;
        }else{
                echo "<script>
                function kembali()
                {
                alert(\"Password Dan Konfirmasi Password Berbeda\");
                location.href='index.php';
                }   
                kembali();
                </script>";
                exit;
        }
}else{
        echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Belum Bisa Di Update, Periksa Kembali!!\");
                location.href='index.php';
                }   
                kembali();
                </script>";
                exit;   
}
}else{
        echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Belum Bisa Di Update, Periksa Kembali!!\");
                location.href='index.php';
                }   
                kembali();
                </script>";
                exit;   
}
}else if(isset($accessToken)){
if(isset($_POST['oauth_uid'])){
        
$oauth_uid=$_POST['oauth_uid'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

$query = mysqli_query($connect, "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE oauth_uid='$oauth_uid'");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengupdate Data Profile!!)\");
                location.href='index.php';
                }   
                kembali();
                </script>";
                exit;
}else{
        echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Belum Bisa Di Update, Periksa Kembali!!\");
                location.href='index.php';
                }   
                kembali();
                </script>";
                exit;   
}
}else{
        echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Maaf Edit Profile Mengalami Error. Silahkan Coba beberapa saat lagi!!\");
                location.href='index.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>