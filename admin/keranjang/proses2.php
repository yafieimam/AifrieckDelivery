<?php
if(isset($_POST['id'])){
include "../../conn.php";

$id=$_POST['id'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

$query = mysqli_query($connect, "UPDATE cart SET id_produk='$produk', jumlah='$jumlah', total='$total' WHERE id_cart='$id'");
echo "SUCCESS......";
echo "<script>
function kembali()
{
alert(\"Anda Telah Berhasil Mengupdate Data Keranjang!!)\");
location.href='lihat_keranjang.php';
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
                location.href='lihat_keranjang.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>