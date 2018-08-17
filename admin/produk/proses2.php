<?php
if(isset($_POST['id'])){
include "../../conn.php";

$id=$_POST['id'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];

if(isset($_POST['ubah_foto'])){
    $foto = $_FILES['gambar']['name'];
    $type = $_FILES['gambar']['type'];
    $ukuran = $_FILES['gambar']['size'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "../../image/".$foto;
    if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg"){
        if($ukuran <= 1000000){
            if(move_uploaded_file($tmp_file, $path)){
                $query2 = mysqli_query($connect, "SELECT * FROM produk WHERE id_produk='$id'");
                $baris = mysqli_fetch_array($query2);
                unlink("../../image/".$baris['foto']);
                $query = mysqli_query($connect, "UPDATE produk SET id_kategori='$kategori', nama_produk='$nama_produk', foto='$foto', deskripsi='$deskripsi', harga='$harga', stok='$stok' WHERE id_produk='$id'");
                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengupdate Data Produk!!)\");
                location.href='lihat_produk.php';
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
                location.href='lihat_produk.php';
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
            location.href='lihat_produk.php';
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
        location.href='lihat_produk.php';
        }   
        kembali();
        </script>";
        exit;
    }
}else{
    $query = mysqli_query($connect, "UPDATE produk SET id_kategori='$kategori', nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', stok='$stok' WHERE id_produk='$id'");
    echo "SUCCESS......";
    echo "<script>
    function kembali()
    {
    alert(\"Anda Telah Berhasil Mengupdate Data Produk!!)\");
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
                alert(\"Data Anda Belum Bisa Di Inputkan, Periksa Kembali!!\");
                location.href='lihat_produk.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>