<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil=  mysqli_query($connect, "SELECT * FROM cart WHERE id_cart='$id'");

    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Edit Data Keranjang</title>        
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
           <h1>Edit Data Keranjang</h1>
                <?php
                while($baris=mysqli_fetch_row($hasil))
                {
                ?>
                <form action="proses2.php" method="post">
                <table>
                    <tr>
                        <td>PRODUK</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $baris[0] ?>" required>
                            <select name="produk">
                                <?php
                                $produk=  mysqli_query($connect, "SELECT * FROM produk");
                                while($field=mysqli_fetch_row($produk)){
                                    if($baris[1] == $field[0]){
                                        ?><option value="<?php echo $baris[1] ?>" selected><?php echo $field[2] ?></option><?php
                                    }else{
                                        ?><option value="<?php echo $field[0] ?>"><?php echo $field[2] ?></option><?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>JUMLAH</td>
                        <td>:</td>
                        <td><input type="text" name="jumlah" value="<?php echo $baris[2] ?>" required></td>
                    </tr>
                    <tr>
                        <td>TOTAL</td>
                        <td>:</td>
                        <td><input type="text" name="total" value="<?php echo $baris[3] ?>" required></td>
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
                location.href='lihat_keranjang.php';
                }   
                kembali();
                </script>";
                exit;
}
?>