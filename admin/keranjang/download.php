<?php
include "../../conn.php";

$title = "<center>DATA KERANJANG</center>";
$content_header = "<table border='1'>";
$content_footer = "</table>";
$content_dalam = "";
$data =         "<tr>
                <td><center>ID CART</center></td>
                <td><center>PRODUK</center></td>
                <td><center>JUMLAH</center></td>
                <td><center>TOTAL</center></td>
                </tr>"; 
 
$sql = "SELECT * FROM cart";
$q   = mysqli_query($connect, $sql);
while($r=mysqli_fetch_array($q)){
$data1 = "<tr>
            <td><center>$r[0]</center></td>";
            $produk=  mysqli_query($connect, "SELECT * FROM produk");
            while($field=mysqli_fetch_row($produk)){
                if($r[1] == $field[0]){
                    $data2 = "<td><center>$field[2]</center></td>";
                }
            }
            $data3 = "<td><center>$r[2]</center></td>
            <td><center>$r[3]</center></td>
         </tr>";
    $content_dalam = $content_dalam ."<br>". $data1 . "" . $data2 . "" . $data3;
}
 
$content_sheet = $title . "<br>" . $content_header . "<br>" . $data . "<br>" . $content_dalam . "<br>" . $content_footer;
 
 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Keranjang.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $content_sheet;
?>