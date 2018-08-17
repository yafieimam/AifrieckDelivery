<?php
if(isset($_POST['id'])){
include "../../conn.php";

$id=$_POST['id'];
$produk = $_POST['produk'];
$user = $_POST['user'];
$kuantitas = $_POST['kuantitas'];
$total_harga = $_POST['total_harga'];
$tanggal_transaksi = $_POST['tanggal_transaksi'];

$query = mysqli_query($connect, "UPDATE transaksi SET id_user='$user', id_produk='$produk', harga_satuan='$kuantitas', total_harga='$total_harga', tanggal_transaksi='$tanggal_transaksi' WHERE id_transaksi='$id'");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengupdate Data Transaksi!!)\");
                location.href='lihat_transaksi.php';
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
                location.href='lihat_transaksi.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>