<?php
include "../cek_session.php";
include "../../conn.php";

$hasil=  mysqli_query($connect, "SELECT * FROM transaksi");

if(!$hasil){
    die("PERMINTAAN QUERY GAGAL");
}
print("<b><center><div class='judul'>LIST TRANSAKSI</div><center><br>");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Lihat Transaksi</title>
    </head>
        <style type="text/css">
body{
	font-size: 			14px;
	color: 				#000000;
	font-family: 			Arial;
	font-weight: 			bold;
}

.judul{
    font-family: cursive;
    font-size: large;
}

.dr_tabel{
background-color: #111;
background-image: -moz-linear-gradient(#444, #111);
background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111));	
background-image: -webkit-linear-gradient(#444, #111);	
background-image: -o-linear-gradient(#444, #111);
background-image: -ms-linear-gradient(#444, #111);
background-image: linear-gradient(#444, #111);
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-radius: 2px;
-moz-box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
-webkit-box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
color: lightgray;
}

.dr_row1 {
	padding:			10px 0;
	vertical-align:			top;
	border-bottom:			1px solid #dae0e4;
	text-align:			center;

}

.dr_row2 {
	padding:			10px 0;
	vertical-align:			top;
	border-bottom:			1px solid #dae0e4;
	text-align:			center;
	background-color: 		grey;
        color: white;
}
</style>
    <body>
            <table align=center>
            <?php
            $n=0;
            ?>
            <tr>
                <td class='dr_tabel'><center>NO</center></td>
                <td class='dr_tabel'><center>ID TRANSAKSI</center></td>
                <td class='dr_tabel'><center>USER</center></td>
                <td class='dr_tabel'><center>PRODUK</center></td>
                <td class='dr_tabel'><center>KUANTITAS</center></td>
                <td class='dr_tabel'><center>TOTAL HARGA</center></td>
                <td class='dr_tabel'><center>TANGGAL TRANSAKSI</center></td>
                <td class='dr_tabel'><center>ACTIONS</center></td>
            </tr>
            <?php
            while($baris=mysqli_fetch_row($hasil))
            {
                $n++;
            ?>
            <tr>
                <td class='dr_row2'><?php echo $n ?></td>
                <td class='dr_row2'><?php echo $baris[0] ?></td>
                <?php
                $user=  mysqli_query($connect, "SELECT * FROM user");
                while($field=mysqli_fetch_row($user)){
                    if($baris[1] == $field[0]){
                        ?><td class='dr_row2'><?php echo $field[1] ?></td><?php
                    }
                }
                $produk=  mysqli_query($connect, "SELECT * FROM produk");
                while($baris_produk=mysqli_fetch_row($produk)){
                    if($baris[2] == $baris_produk[0]){
                        ?><td class='dr_row2'><?php echo $baris_produk[2] ?></td><?php
                    }
                }
                ?>
                <td class='dr_row2'><?php echo $baris[3] ?></td>
                <td class='dr_row2'><?php echo $baris[4] ?></td>
                <td class='dr_row2'><?php echo $baris[5] ?></td>
                <td class='dr_row2'>
                    <a href="edit_transaksi.php?id=<?php echo $baris[0] ?>">Edit</a>
                    <a href="delete_transaksi.php?id=<?php echo $baris[0] ?>">Delete</a>
                </td>

            </tr>
            <?php
            }
            ?>
            </table>
    </body>
</html>
