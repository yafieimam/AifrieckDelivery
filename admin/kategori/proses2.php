<?php
if(isset($_POST['id'])){
include "../../conn.php";

$id=$_POST['id'];
$nama_kategori = $_POST['nama_kategori'];

$query = mysqli_query($connect, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id'");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengupdate Data Kategori!!)\");
                location.href='lihat_kategori.php';
                }   
                kembali();
                </script>";
                exit;
}else{
        echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Belum Bisa Di Inputkan, Periksa Kembali!!\");
                location.href='lihat_kategori.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>