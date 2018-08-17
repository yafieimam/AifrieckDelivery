<?php
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['level'])){
include 'conn.php';
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$level = $_POST['level'];
$password = md5($_POST['password']);
$cek = mysqli_query($connect, "select * from user where username='$username'");
$result   = mysqli_num_rows($cek);
if($result>0){
    echo "Redirecting...";
    echo "<script>
    function kembali()
    {
    alert(\"Username telah terdaftar, silahkan daftar menggunakan username lain\");
    location.href='login.php';
    }   
    kembali();
    </script>";
}else{
    $signup = mysqli_query($connect, "INSERT INTO user(username,password,fullname,email,level) VALUES('$username','$password','$fullname','$email','$level')");
    echo "Redirecting...";
    echo "<script>
    function kembali()
    {
    alert(\"Anda Berhasil Mendaftar, Silahkan Login\");
    location.href='login.php';
    }   
    kembali();
    </script>";
exit;
}
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