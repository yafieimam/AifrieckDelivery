<?php
if(isset($_POST['nama_kategori'])){
include "../../conn.php";

$nama_kategori = $_POST['nama_kategori'];

$query = mysqli_query($connect, "INSERT INTO kategori(nama_kategori) VALUES('$nama_kategori')");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Menginputkan Data Kategori!!)\");
                location.href='input_kategori.php';
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
                location.href='input_kategori.php';
                }   
                kembali();
                </script>";
                exit;
}
?>
