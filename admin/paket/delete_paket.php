<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil2 =  mysqli_query($connect, "SELECT * FROM paket WHERE id_paket='$id'");
    $hasil =  mysqli_query($connect, "DELETE FROM paket WHERE id_paket='$id'");
    $baris=mysqli_fetch_row($hasil2);
    unlink("../../image/".$baris[2]);
    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }else{

        echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Berhasil Dihapus!!\");
                location.href='lihat_paket.php';
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
                location.href='lihat_paket.php';
                }   
                kembali();
                </script>";
                exit;
}
?>