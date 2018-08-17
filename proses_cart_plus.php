<?php
if(isset($_GET['id'])){
include 'conn.php';
$id_produk = $_GET['id'];
$id = 0;
$jumlah=0;
$harga=0;
$hasil3 = mysqli_query($connect, "SELECT * FROM cart WHERE id_produk='$id_produk'");
$hasil4 = mysqli_query($connect, "SELECT * FROM produk WHERE id_produk='$id_produk'");
while($baris=mysqli_fetch_array($hasil3)){
    $id = $baris['id_cart'];
    $jumlah = $baris['jumlah'] + 1;
    while($baris2=mysqli_fetch_array($hasil4)){
        $harga = $baris2['harga'] * $jumlah;
    }
}
$hasil = mysqli_query($connect, "UPDATE cart SET jumlah='$jumlah', total='$harga' WHERE id_cart='$id'");
echo "Redirecting...";
echo "<script>
function kembali()
{
location.href='cart.php';
}   
kembali();
</script>";
exit;
}else{
    echo "Redirecting...";
    echo "<script>
         function kembali()
         {
         alert(\"update barang di keranjang mengalami error, mohon ulangi lagi\");
         location.href='cart.php';
         }   
         kembali();
         </script>";
    exit;
}