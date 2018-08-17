<!DOCTYPE html>
<?php
include 'cek_session.php'; 
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>| SELAMAT DATANG ADMIN |</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div id="judul">[MANAJEMEN AIFRIECK DELIVERY]</div>
<ul id="menu">
<li><a href="index.php">Home</a></li>
<li><a href="">Input Data</a>
    <ul>
        <li><a href="user/input_user.php" target="iframe">User</a></li>
        <li><a href="produk/input_produk.php" target="iframe">Menu Makanan</a></li>
        <li><a href="transaksi/input_transaksi.php" target="iframe">Transaksi</a></li>
        <li><a href="kategori/input_kategori.php" target="iframe">Kategori Menu</a></li>
        <li><a href="diskon/input_diskon.php" target="iframe">Diskon</a></li>
        <li><a href="paket/input_paket.php" target="iframe">Paket Makanan</a></li>
        <li><a href="keranjang/input_keranjang.php" target="iframe">Keranjang</a></li>
        <li><a href="struk/input_struk.php" target="iframe">Struk</a></li>
    </ul>
</li>
<li><a href="">View dan Edit Data</a>
    <ul>
        <li><a href="user/lihat_user.php" target="iframe">User</a></li>
        <li><a href="produk/lihat_produk.php" target="iframe">Menu Makanan</a></li>
        <li><a href="transaksi/lihat_transaksi.php" target="iframe">Transaksi</a></li>
        <li><a href="kategori/lihat_kategori.php" target="iframe">Kategori Menu</a></li>
        <li><a href="diskon/lihat_diskon.php" target="iframe">Diskon</a></li>
        <li><a href="paket/lihat_paket.php" target="iframe">Paket Makanan</a></li>
        <li><a href="keranjang/lihat_keranjang.php" target="iframe">Keranjang</a></li>
        <li><a href="struk/lihat_struk.php" target="iframe">Struk</a></li>
    </ul>
</li>
<li><a href="" >Download</a>
    <ul>
        <li><a href="user/download.php" target="iframe">User</a></li>
        <li><a href="produk/download.php" target="iframe">Menu Makanan</a></li>
        <li><a href="transaksi/download.php" target="iframe">Transaksi</a></li>
        <li><a href="kategori/download.php" target="iframe">Kategori Menu</a></li>
        <li><a href="diskon/download.php" target="iframe">Diskon</a></li>
        <li><a href="paket/download.php" target="iframe">Paket Makanan</a></li>
        <li><a href="keranjang/download.php" target="iframe">Keranjang</a></li>
        <li><a href="struk/download.php" target="iframe">Struk</a></li>
    </ul>
</li>
<!-- <li><a href="" target="iframe">Laporan</a></li> -->
<li><a href="ubah_password/index.php" target="iframe">Edit Password</a></li>
<li><a href="../logout.php">Logout</a></li>
</ul>
        <div id="tampil">
            <iframe name="iframe" src="" width="100%" height="100%" frameborder="0" scrolling="yes" allowtransparency="100%"></iframe>    
        </div>
        <div id="footer">
            <center><h5>Copyright &copy; 2017 - All Rights Reserved - by Yafie Imam Achmad - Aifrieck Delivery</h5></center>
        </div>
       
    </body>
</html>
