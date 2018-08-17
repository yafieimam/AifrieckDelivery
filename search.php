<?php
 include "conn.php";
 
 $title=$_POST["title"];
 
 
 $result=mysql_query("SELECT * FROM produk where nama_produk like '%$title%'");
 $found=mysql_num_rows($result);
 
 if($found>0){
 	while($row=mysql_fetch_array($result)){
 	echo "<li>$row[nama_produk]</li>";
    }   
 }else{
 	echo "<li>No Produk Found<li>";
 }
 // ajax search
?>