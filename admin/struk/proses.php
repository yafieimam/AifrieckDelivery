<?php
if(isset($_POST['alamat'])){
include "../../conn.php";

$total = $_POST['total'];
$alamat = $_POST['alamat'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$catatan = $_POST['catatan'];

$query = mysqli_query($connect, "INSERT INTO struk(alamat,kecamatan,kota,catatan,total) VALUES('$alamat','$kecamatan','$kota','$catatan','$total')");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Menginputkan Data Struk!!)\");
                location.href='input_struk.php';
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
                location.href='input_struk.php';
                }   
                kembali();
                </script>";
                exit;
}
?>
