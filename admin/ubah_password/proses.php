<?php
if(isset($_POST['password_lama'])){
include "../../conn.php";

$passwordlama = md5($_POST['password_lama']);
$passwordbaru = md5($_POST['password_baru']);
$konfirmasipasswordbaru = md5($_POST['konfirmasi_password_baru']);

$cekuser = mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id' AND password='$passwordlama'");
$count = mysqli_num_rows($cekuser);

if($count == 1){
        if($passwordbaru == $konfirmasipasswordbaru){
                $query = mysqli_query($connect, "UPDATE user SET password='$passwordbaru' WHERE id_user='$id'");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengubah Password!!)\");
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
                alert(\"Password Anda Belum Bisa Di Ubah, Periksa Kembali!!\");
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
                alert(\"Password Anda Belum Bisa Di Ubah, Periksa Kembali!!\");
                location.href='index.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>