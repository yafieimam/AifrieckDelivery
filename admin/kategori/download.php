<?php
include "../../conn.php";

$title = "<center>DATA KATEGORI</center>";
$content_header = "<table border='1'>";
$content_footer = "</table>";
$content_dalam = "";
$data =         "<tr>
                <td><center>ID KATEGORI</center></td>
                <td><center>NAMA KATEGORI</center></td>
                </tr>"; 
 
$sql = "SELECT * FROM kategori";
$q   = mysqli_query($connect, $sql);
while($r=mysqli_fetch_array($q)){
$data1 = "<tr>
            <td><center>$r[0]</center></td>
            <td><center>$r[1]</center></td>
         </tr>";
    $content_dalam = $content_dalam ."<br>". $data1;
}
 
$content_sheet = $title . "<br>" . $content_header . "<br>" . $data . "<br>" . $content_dalam . "<br>" . $content_footer;
 
 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Kategori.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $content_sheet;
?>