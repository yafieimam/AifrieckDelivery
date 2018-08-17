<?php
if(isset($_POST['produk'])){
include "../../conn.php";

$produk = $_POST['produk'];
$user = $_POST['user'];
$kuantitas = $_POST['kuantitas'];
$total_harga = $_POST['total_harga'];
$tanggal_transaksi = $_POST['tanggal_transaksi'];

$query = mysqli_query($connect, "INSERT INTO transaksi(id_user,id_produk,kuantitas,total_harga,tanggal_transaksi) VALUES('$user','$produk','$kuantitas','$total_harga','$tanggal_transaksi')");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Menginputkan Data Transaksi!!)\");
                location.href='input_transaksi.php';
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
                location.href='input_transaksi.php';
                }   
                kembali();
                </script>";
                exit;
}
?>
