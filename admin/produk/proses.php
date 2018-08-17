<?php
if(isset($_POST['nama_produk'])){
include "../../conn.php";

$nama_produk = $_POST['nama_produk'];
$foto = $_FILES['foto']['name'];
$type = $_FILES['foto']['type'];
$ukuran = $_FILES['foto']['size'];
$tmp_file = $_FILES['foto']['tmp_name'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];

$path = "../../image/".$foto;
if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg"){
        if($ukuran <= 1000000){
                if(move_uploaded_file($tmp_file, $path)){
                        $query = mysqli_query($connect, "INSERT INTO produk(id_kategori,nama_produk,foto,deskripsi,harga,stok) VALUES('$kategori','$nama_produk','$foto','$deskripsi','$harga','$stok')");
                        echo "SUCCESS......";
                        echo "<script>
                        function kembali()
                        {
                        alert(\"Anda Telah Berhasil Menginputkan Data Produk!!)\");
                        location.href='input_produk.php';
                        }   
                        kembali();
                        </script>";
                        exit;
                }else{
                        echo "SUCCESS......";
                        echo "<script>
                        function kembali()
                        {
                        alert(\"Maaf Foto Gagal Diupload!!)\");
                        location.href='input_produk.php';
                        }   
                        kembali();
                        </script>";
                        exit;  
                }
        }else{
                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Maaf Ukuran Gambar tidak boleh melebihi 1 MB!!)\");
                location.href='input_produk.php';
                }   
                kembali();
                </script>";
                exit;
        }
}else{
        echo "SUCCESS......";
        echo "<script>
        function kembali()
        {
        alert(\"Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG!!)\");
        location.href='input_produk.php';
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
                alert(\"Data Anda Belum Bisa Di Inputkan, Periksa Kembali!!\");
                location.href='input_produk.php';
                }   
                kembali();
                </script>";
                exit;
}
?>
