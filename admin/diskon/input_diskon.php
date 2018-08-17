<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Input Data Diskon</title>        
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
       <h1>Input Data Diskon</h1>
            <form action="proses.php" method="post">
            <table>
                <tr>
                    <td>NAMA DISKON</td>
                    <td>:</td>
                    <td><input type="text" name="nama_diskon" required></td>
                </tr>
                <tr>
                    <td>POTONGAN HARGA</td>
                    <td>:</td>
                    <td><input type="text" name="potongan_harga" required></td>
                </tr>
                <tr>
                    <td>TANGGAL MULAI</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_mulai" required></td>
                </tr>
                <tr>
                    <td>TANGGAL BERAKHIR</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_berakhir" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Masukkan" ></td>
                </tr>
            </table>
        </form></div>
        <div id="pencarian" style="margin: 10px 0px 0px 500px;" ></div> 
    </body>
</html>
