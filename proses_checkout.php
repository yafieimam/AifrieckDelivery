<?php
include 'conn.php';
$id_user = $_POST['id_user'];
$total_seluruh = $_POST['total_seluruh'];
$alamat = $_POST['alamat'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$catatan = $_POST['catatan'];

$hasil = mysqli_query($connect, "INSERT INTO struk(alamat,kecamatan,kota,catatan,total) VALUES('$alamat','$kecamatan','$kota','$catatan','$total_seluruh')");
if(!$hasil){
    die("PERMINTAAN QUERY GAGAL");
}
$hasil2 = mysqli_query($connect, "SELECT * FROM cart");
if(!$hasil2){
    die("PERMINTAAN QUERY GAGAL");
}
while($baris=mysqli_fetch_array($hasil2))
{
	$id_produk = $baris['id_produk'];
	$kuantitas = $baris['jumlah'];
	$total = $baris['total'];

	$hasil3 = mysqli_query($connect, "INSERT INTO transaksi(id_user,id_produk,kuantitas,total_harga,tanggal_transaksi) VALUES('$id_user','$id_produk','$kuantitas','$total',CURDATE())");
	if(!$hasil3){
    	die("PERMINTAAN QUERY GAGAL");
	}
}
$hasil4 = mysqli_query($connect, "DELETE FROM cart");
if(!$hasil4){
    die("PERMINTAAN QUERY GAGAL");
}
echo "Redirecting...";
echo "<script>
function kembali()
{
alert(\"Pesanan telah diproses, silahkan tunggu. Pegawai kami akan mengirimkan ke alamat tersebut. Terima Kasih.\");
location.href='index.php';
}   
kembali();
</script>";
exit;
?>