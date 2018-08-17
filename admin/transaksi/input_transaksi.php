<?php
include "../cek_session.php";
include "../../conn.php";

$hasil=  mysqli_query($connect, "SELECT * FROM user");
$hasil2=  mysqli_query($connect, "SELECT * FROM produk");

if(!$hasil && !$hasil2){
    die("PERMINTAAN QUERY GAGAL");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Input Data Transaksi</title>        
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
       <h1>Input Data Transaksi</h1>
            <form action="proses.php" method="post">
            <table>
                <tr>
                    <td>USER</td>
                    <td>:</td>
                    <td>
                        <select name="user">
                            <?php
                            while($baris=mysqli_fetch_row($hasil))
                            {
                            ?>
                            <option value="<?php echo $baris[0] ?>"><?php echo $baris[1] ?></option>
                            <?php
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
                            while($baris2=mysqli_fetch_row($hasil2))
                            {
                            ?>
                            <option value="<?php echo $baris2[0] ?>"><?php echo $baris2[2] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>KUANTITAS</td>
                    <td>:</td>
                    <td><input type="text" name="kuantitas" required></td>
                </tr>
                <tr>
                    <td>TOTAL HARGA</td>
                    <td>:</td>
                    <td><input type="text" name="total_harga" required></td>
                </tr>
                <tr>
                    <td>TANGGAL TRANSAKSI</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_transaksi" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Masukkan" ></td>
                </tr>
            </table>
        </form></div>
        <div id="pencarian" style="margin: 10px 0px 0px 500px;" ></div> 
    </body>
</html>
