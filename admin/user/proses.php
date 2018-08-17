<?php
if(isset($_POST['username'])){
include "../../conn.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];

$query = mysqli_query($connect, "INSERT INTO user(username,password,level,fullname,email) VALUES('$username','$password','$level','$fullname','$email')");

   

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Menginputkan Data User!!)\");
                location.href='input_user.php';
                }   
                kembali();
                </script>";
                exit;
}else{
                echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\Data Anda Belum Bisa Di Inputkan, Periksa Kembali!!\");
                location.href='input_user.php';
                }   
                kembali();
                </script>";
                exit;
}
?>
