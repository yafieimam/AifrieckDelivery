<?php
if(isset($_POST['produk'])){
include "../../conn.php";

$id = $_POST['id'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

$query = mysqli_query($connect, "INSERT INTO cart(id_cart,id_produk,jumlah,total) VALUES('$id','$produk','$jumlah','$total')");
echo "SUCCESS......";
echo "<script>
function kembali()
{
alert(\"Anda Telah Berhasil Menginputkan Data Keranjang!!)\");
location.href='input_keranjang.php';
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
                location.href='input_keranjang.php';
                }   
                kembali();
                </script>";
                exit;
}
?>
