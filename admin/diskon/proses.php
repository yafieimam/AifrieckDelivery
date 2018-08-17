<?php
if(isset($_POST['nama_diskon'])){
include "../../conn.php";

$nama_diskon = $_POST['nama_diskon'];
$potongan_harga = $_POST['potongan_harga'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_berakhir = $_POST['tanggal_berakhir'];

$query = mysqli_query($connect, "INSERT INTO diskon(nama_diskon,potongan_harga,tanggal_mulai,tanggal_berakhir) VALUES('$nama_diskon','$potongan_harga','$tanggal_mulai','$tanggal_berakhir')");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Menginputkan Data Diskon!!)\");
                location.href='input_diskon.php';
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
                location.href='input_diskon.php';
                }   
                kembali();
                </script>";
                exit;
}
?>
