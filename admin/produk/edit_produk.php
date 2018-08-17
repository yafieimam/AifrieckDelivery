<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil=  mysqli_query($connect, "SELECT * FROM produk WHERE id_produk='$id'");

    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Edit Data Produk</title>        
        </head>
        <script>

    var xmlhttp = false;

    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }

    </script>

        <body>
            <div style="margin-left: 10px;float: left;">
           <h1>Edit Data Produk</h1>
                <?php
                while($baris=mysqli_fetch_row($hasil))
                {
                ?>
                <form action="proses2.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>KATEGORI</td>
                        <td>:</td>
                        <td>
                            <select name="kategori">
                                <?php
                                $kategori=  mysqli_query($connect, "SELECT * FROM kategori");
                                while($field=mysqli_fetch_row($kategori)){
                                    if($baris[1] == $field[0]){
                                        ?><option value="<?php echo $baris[1] ?>" selected><?php echo $field[1] ?></option><?php
                                    }else{
                                        ?><option value="<?php echo $field[0] ?>"><?php echo $field[1] ?></option><?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>NAMA PRODUK</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $baris[0] ?>">
                            <input type="text" name="nama_produk" value="<?php echo $baris[2] ?>"  required>
                        </td>
                    </tr>
                    <tr>
                        <td>FOTO</td>
                        <td>:</td>
                        <td>
                            <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                            <input type="file" name="gambar" id="gambar">
                        </td>
                    </tr>
                    <tr>
                        <td>DESKRIPSI</td>
                        <td>:</td>
                        <td><input type="text" name="deskripsi" value="<?php echo $baris[4] ?>" required></td>
                    </tr>
                    <tr>
                        <td>HARGA</td>
                        <td>:</td>
                        <td><input type="text" name="harga" value="<?php echo $baris[5] ?>" required></td>
                    </tr>
                    <tr>
                        <td>STOK</td>
                        <td>:</td>
                        <td><input type="text" name="stok" value="<?php echo $baris[6] ?>" required></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td><input type="submit" value="Masukkan" ></td>
                    </tr>
                </table>
            </form></div>
            <div id="pencarian" style="margin: 10px 0px 0px 500px;" ></div> 
        </body>
    </html>
<?php
}else{
    echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Belum Bisa Di Update, Periksa Kembali!!\");
                location.href='lihat_produk.php';
                }   
                kembali();
                </script>";
                exit;
}
?>