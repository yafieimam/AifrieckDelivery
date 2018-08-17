<?php
if(isset($_POST['id'])){
include "../../conn.php";

$id=$_POST['id'];
$total = $_POST['total'];
$alamat = $_POST['alamat'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$catatan = $_POST['catatan'];

$query = mysqli_query($connect, "UPDATE struk SET alamat='$alamat', kecamatan='$kecamatan', kota='$kota', catatan='$catatan', total='$total' WHERE id_struk='$id'");

                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengupdate Data Struk!!)\");
                location.href='lihat_struk.php';
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
                location.href='lihat_struk.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>