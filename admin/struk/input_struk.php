<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Input Data Struk</title>        
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
       <h1>Input Data Struk</h1>
            <form action="proses.php" method="post">
            <table>
                <tr>
                    <td>ALAMAT</td>
                    <td>:</td>
                    <td><input type="text" name="alamat" required></td>
                </tr>
                <tr>
                    <td>KECAMATAN</td>
                    <td>:</td>
                    <td><input type="text" name="kecamatan" required></td>
                </tr>
                <tr>
                    <td>KOTA</td>
                    <td>:</td>
                    <td><input type="text" name="kota" required></td>
                </tr>
                <tr>
                    <td>CATATAN</td>
                    <td>:</td>
                    <td><input type="text" name="catatan" required></td>
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
