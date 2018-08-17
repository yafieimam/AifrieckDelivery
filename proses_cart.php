<?php
if(isset($_GET['id'])){
include 'conn.php';
$id_produk = $_GET['id'];
$id = 0;
$jumlah=0;
$harga=0;
$hasil2 = mysqli_query($connect, "SELECT id_cart FROM cart ORDER BY id_cart ASC");
$hasil3 = mysqli_query($connect, "SELECT * FROM cart WHERE id_produk='$id_produk'");
$hasil4 = mysqli_query($connect, "SELECT * FROM produk WHERE id_produk='$id_produk'");
$result   = mysqli_num_rows($hasil3);
if($result>0){
    while($baris=mysqli_fetch_array($hasil3)){
        $id = $baris['id_cart'];
        $jumlah = $baris['jumlah'] + 1;
        while($baris2=mysqli_fetch_array($hasil4)){
            $harga = $baris2['harga'] * $jumlah;
        }
    }
    $hasil = mysqli_query($connect, "UPDATE cart SET jumlah='$jumlah', total='$harga' WHERE id_cart='$id'");
}else{
    while($res=mysqli_fetch_array($hasil2))
    {
        $id = $res['id_cart'];
    }
    $id++;
    $jumlah = 1;
    while($baris2=mysqli_fetch_array($hasil4)){
        $harga = $baris2['harga'];
    }
    $hasil = mysqli_query($connect, "INSERT INTO cart(id_cart,id_produk,jumlah,total) VALUES('$id','$id_produk','$jumlah','$harga')");
}

echo "Redirecting...";
echo "<script>
function kembali()
{
alert(\"Barang telah masuk keranjang\");
location.href='shop.php';
}   
kembali();
</script>";
exit;
}else{
    echo "Redirecting...";
    echo "<script>
         function kembali()
         {
         alert(\"Pemasukan barang ke keranjang mengalami error, mohon ulangi lagi\");
         location.href='shop.php';
         }   
         kembali();
         </script>";
    exit;
}