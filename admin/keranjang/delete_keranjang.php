<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil =  mysqli_query($connect, "DELETE FROM cart WHERE id_cart='$id'");
    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }else{

        echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Berhasil Dihapus!!\");
                location.href='lihat_keranjang.php';
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
                location.href='lihat_keranjang.php';
                }   
                kembali();
                </script>";
                exit;
}
?>