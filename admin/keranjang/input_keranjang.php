<?php
include "../cek_session.php";
include "../../conn.php";

$hasil=  mysqli_query($connect, "SELECT * FROM produk");
$hasil2 = mysqli_query($connect, "SELECT id_cart FROM cart ORDER BY id_cart ASC");

if(!$hasil && !$hasil2){
    die("PERMINTAAN QUERY GAGAL");
}

$id = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Input Data Keranjang</title>        
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
        <h1>Input Data Keranjang</h1>
            <form action="proses.php" method="post">
            <table>
                <tr>
                    <td>NO</td>
                    <td>:</td>
                    <?php
                    while($res=mysqli_fetch_array($hasil2))
                    {
                        $id = $res['id_cart'];
                    }
                    $id++;
                    ?>
                    <td><input type="text" name="id" value="<?php echo $id ?>" readonly></td>
                </tr>
                <tr>
                    <td>PRODUK</td>
                    <td>:</td>
                    <td>
                        <select name="produk">
                            <?php
                            while($baris=mysqli_fetch_row($hasil))
                            {
                            ?>
                            <option value="<?php echo $baris[0] ?>"><?php echo $baris[2] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>JUMLAH</td>
                    <td>:</td>
                    <td><input type="text" name="jumlah" required></td>
                </tr>
                <tr>
                    <td>TOTAL</td>
                    <td>:</td>
                    <td><input type="text" name="total" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Masukkan" ></td>
                </tr>
            </table>
        </form></div>
        <div id="pencarian" style="margin: 10px 0px 0px 500px;" ></div> 
    </body>
</html>
