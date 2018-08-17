<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Input Data Paket</title>        
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
        <h1>Input Data Paket</h1>
            <form action="proses.php" enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <td>NAMA PAKET</td>
                    <td>:</td>
                    <td><input type="text" name="nama_paket" required></td>
                </tr>
                <tr>
                    <td>FOTO</td>
                    <td>:</td>
                    <td><input type="file" name="foto" id="foto" required></td>
                </tr>
                <tr>
                    <td>DESKRIPSI</td>
                    <td>:</td>
                    <td><input type="text" name="deskripsi" required></td>
                </tr>
                <tr>
                    <td>HARGA</td>
                    <td>:</td>
                    <td><input type="text" name="harga" required></td>
                </tr>
                <tr>
                    <td>STOK</td>
                    <td>:</td>
                    <td><input type="text" name="stok" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Masukkan" ></td>
                </tr>
            </table>
        </form></div>
        <div id="pencarian" style="margin: 10px 0px 0px 500px;" ></div> 
    </body>
</html>
