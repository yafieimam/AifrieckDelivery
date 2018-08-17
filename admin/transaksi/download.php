<?php
include "../../conn.php";

$title = "<center>DATA TRANSAKSI</center>";
$content_header = "<table border='1'>";
$content_footer = "</table>";
$content_dalam = "";
$data =         "<tr>
                <td><center>ID TRANSAKSI</center></td>
                <td><center>USER</center></td>
                <td><center>PRODUK</center></td>
                <td><center>KUANTITAS</center></td>
                <td><center>TOTAL HARGA</center></td>
                <td><center>TANGGAL TRANSAKSI</center></td>
                </tr>"; 
 
$sql = "SELECT * FROM transaksi";
$q   = mysqli_query($connect, $sql);
while($r=mysqli_fetch_array($q)){
$data1 = "<tr>
            <td><center>$r[0]</center></td>";
            $user=  mysqli_query($connect, "SELECT * FROM user");
            while($field=mysqli_fetch_row($user)){
                if($r[1] == $field[0]){
                    $data2 = "<td><center>$field[1]</center></td>";
                }
            }
            $produk=  mysqli_query($connect, "SELECT * FROM produk");
            while($baris_produk=mysqli_fetch_row($produk)){
                if($r[2] == $baris_produk[0]){
                    $data3 = "<td><center>$baris_produk[2]</center></td>";
                }
            }
            $data5 = "<td><center>$r[3]</center></td>
            <td><center>$r[4]</center></td>
            <td><center>$r[5]</center></td>
         </tr>";
    $content_dalam = $content_dalam ."<br>". $data1 . "" . $data2 . "" . $data3 . "" . $data4 . "" . $data5;
}
 
$content_sheet = $title . "<br>" . $content_header . "<br>" . $data . "<br>" . $content_dalam . "<br>" . $content_footer;
 
 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Data_Transaksi.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $content_sheet;
?>