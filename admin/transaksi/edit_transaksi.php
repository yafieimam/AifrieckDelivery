<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil=  mysqli_query($connect, "SELECT * FROM transaksi WHERE id_transaksi='$id'");

    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Edit Data Transaksi</title>        
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
           <h1>Edit Data Transaksi</h1>
                <?php
                while($baris=mysqli_fetch_row($hasil))
                {
                ?>
                <form action="proses2.php" method="post">
                <table>
                    <tr>
                        <td>USER</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $baris[0] ?>">
                            <select name="user">
                                <?php
                                $user=  mysqli_query($connect, "SELECT * FROM user");
                                while($field=mysqli_fetch_row($user)){
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
                        <td>PRODUK</td>
                        <td>:</td>
                        <td>
                            <select name="produk">
                                <?php
                                $produk=  mysqli_query($connect, "SELECT * FROM produk");
                                while($baris_produk=mysqli_fetch_row($produk)){
                                    if($baris[2] == $baris_produk[0]){
                                        ?><option value="<?php echo $baris[2] ?>" selected><?php echo $baris_produk[2] ?></option><?php
                                    }else{
                                        ?><option value="<?php echo $baris_produk[0] ?>"><?php echo $baris_produk[2] ?></option><?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>KUANTITAS</td>
                        <td>:</td>
                        <td><input type="text" name="kuantitas" value="<?php echo $baris[3] ?>" required></td>
                    </tr>
                    <tr>
                        <td>TOTAL HARGA</td>
                        <td>:</td>
                        <td><input type="text" name="total_harga" value="<?php echo $baris[4] ?>" required></td>
                    </tr>
                    <tr>
                        <td>TANGGAL TRANSAKSI</td>
                        <td>:</td>
                        <td><input type="text" name="tanggal_transaksi" value="<?php echo $baris[5] ?>" required></td>
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
                location.href='lihat_transaksi.php';
                }   
                kembali();
                </script>";
                exit;
}
?>