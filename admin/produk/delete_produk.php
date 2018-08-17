<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil2 =  mysqli_query($connect, "SELECT * FROM produk WHERE id_produk='$id'");
    $hasil =  mysqli_query($connect, "DELETE FROM produk WHERE id_produk='$id'");
    $baris=mysqli_fetch_row($hasil2);
    unlink("../../image/".$baris[3]);
    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }else{

        echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Berhasil Dihapus!!\");
                location.href='lihat_produk.php';
                }   
                kembali();
                </script>";
                exit;
    }
}else{
    echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Belum Bisa Di Hapus, Periksa Kembali!!\");
                location.href='lihat_produk.php';
                }   
                kembali();
                </script>";
                exit;
}
?>