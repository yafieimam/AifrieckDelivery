<?php
if(isset($_POST['id'])){
include "../../conn.php";

$id=$_POST['id'];
$nama_paket = $_POST['nama_paket'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

if(isset($_POST['ubah_foto'])){
    $foto = $_FILES['gambar']['name'];
    $type = $_FILES['gambar']['type'];
    $ukuran = $_FILES['gambar']['size'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "../../image/".$foto;
    if($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg"){
        if($ukuran <= 1000000){
            if(move_uploaded_file($tmp_file, $path)){
                $query2 = mysqli_query($connect, "SELECT * FROM paket WHERE id_paket='$id'");
                $baris = mysqli_fetch_array($query2);
                unlink("../../image/".$baris['foto']);
                $query = mysqli_query($connect, "UPDATE paket SET nama_paket='$nama_paket', foto='$foto', deskripsi='$deskripsi', harga='$harga', stok='$stok' WHERE id_paket='$id'");
                echo "SUCCESS......";
                echo "<script>
                function kembali()
                {
                alert(\"Anda Telah Berhasil Mengupdate Data Paket!!)\");
                location.href='lihat_paket.php';
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
                location.href='lihat_paket.php';
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
            location.href='lihat_paket.php';
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
        location.href='lihat_paket.php';
        }   
        kembali();
        </script>";
        exit;
    }
}else{
    $query = mysqli_query($connect, "UPDATE paket SET nama_paket='$nama_paket', deskripsi='$deskripsi', harga='$harga', stok='$stok' WHERE id_paket='$id'");
    echo "SUCCESS......";
    echo "<script>
    function kembali()
    {
    alert(\"Anda Telah Berhasil Mengupdate Data Paket!!)\");
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
                alert(\"Data Anda Belum Bisa Di Inputkan, Periksa Kembali!!\");
                location.href='lihat_paket.php';
                }   
                kembali();
                </script>";
                exit;   
}
?>