<?php
include "../../conn.php";

$title = "<center>DATA PAKET</center>";
$content_header = "<table border='1'>";
$content_footer = "</table>";
$content_dalam = "";
$data =         "<tr>
                <td><center>ID PAKET</center></td>
                <td><center>NAMA PAKET</center></td>
                <td><center>FOTO</center></td>
                <td><center>DESKRIPSI</center></td>
                <td><center>HARGA</center></td>
                <td><center>STOK</center></td>
                </tr>"; 
 
$sql = "SELECT * FROM paket";
$q   = mysqli_query($connect, $sql);
while($r=mysqli_fetch_array($q)){
$data1 = "<tr>
            <td><center>$r[0]</center></td>
            <td><center>$r[1]</center></td>
            <td><center>$r[2]</center></td>
            <td><center>$r[3]</center></td>
            <td><center>$r[4]</center></td>
            <td><center>$r[5]</center></td>
         </tr>";
    $content_dalam = $content_dalam ."<br>". $data1;
}
 
$content_sheet = $title . "<br>" . $content_header . "<br>" . $data . "<br>" . $content_dalam . "<br>" . $content_footer;
 
 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Paket.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $content_sheet;
?>