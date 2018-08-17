<?php
if(isset($_POST['id'])){
include "../../conn.php";

$id=$_POST['id'];
$username = $_POST['username'];
$passwordlama = md5($_POST['password_lama']);
$passwordbaru = md5($_POST['password_baru']);
$konfirmasipasswordbaru = md5($_POST['konfirmasi_password_baru']);
$level = $_POST['level'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];

$cekuser = mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id' AND password='$passwordlama'");
$count = mysqli_num_rows($cekuser);

if($count == 1){
        if($passwordbaru == $konfirmasipasswordbaru){
                $query = mysqli_query($connect, "UPDATE user SET username='$username', password='$passwordbaru', level='$level', fullname='$fullname', email='$email' WHERE id_user='$id'");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengupdate Data User!!)\");
                location.href='lihat_user.php';
                }   
                kembali();
                </script>";
                exit;
        }else{
        echo "<script>
                function kembali()
                {
                alert(\"Password Dan Konfirmasi Password Berbeda\");
                location.href='lihat_user.php';
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
                alert(\"Data Anda Belum Bisa Di Inputkan, Periksa Kembali!!\");
                location.href='lihat_user.php';
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
                alert(\"Data Anda Belum Bisa Di Inputkan, Periksa Kembali!!\");
                location.href='lihat_user.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>