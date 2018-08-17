<?php
if(isset($_POST['id'])){
include "../../conn.php";

$id=$_POST['id'];
$nama_diskon = $_POST['nama_diskon'];
$potongan_harga = $_POST['potongan_harga'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_berakhir = $_POST['tanggal_berakhir'];

$query = mysqli_query($connect, "UPDATE diskon SET nama_diskon='$nama_diskon', potongan_harga='$potongan_harga', tanggal_mulai='$tanggal_mulai', tanggal_berakhir='$tanggal_berakhir' WHERE id_diskon='$id'");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengupdate Data Diskon!!)\");
                location.href='lihat_diskon.php';
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
                location.href='lihat_diskon.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>