<?php
if(isset($_POST['nama_paket'])){
include "../../conn.php";

$nama_paket = $_POST['nama_paket'];
$foto = $_FILES['foto']['name'];
$type = $_FILES['foto']['type'];
$ukuran = $_FILES['foto']['size'];
$tmp_file = $_FILES['foto']['tmp_name'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$path = "../../image/".$foto;
if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg"){
        if($ukuran <= 1000000){
                if(move_uploaded_file($tmp_file, $path)){
                        $query = mysqli_query($connect, "INSERT INTO paket(nama_paket,foto,deskripsi,harga,stok) VALUES('$nama_paket','$foto','$deskripsi','$harga','$stok')");
                        echo "SUCCESS......";
                        echo "<script>
                        function kembali()
                        {
                        alert(\"Anda Telah Berhasil Menginputkan Data Paket!!)\");
                        location.href='input_paket.php';
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
                        location.href='input_paket.php';
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
                location.href='input_paket.php';
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
        location.href='input_paket.php';
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
                location.href='input_paket.php';
                }   
                kembali();
                </script>";
                exit;
}
?>
