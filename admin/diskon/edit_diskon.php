<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil=  mysqli_query($connect, "SELECT * FROM diskon WHERE id_diskon='$id'");

    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Edit Data Diskon</title>        
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
           <h1>Edit Data Diskon</h1>
                <?php
                while($baris=mysqli_fetch_row($hasil))
                {
                ?>
                <form action="proses2.php" method="post">
                <table>
                    <tr>
                        <td>NAMA DISKON</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $baris[0] ?>">
                            <input type="text" name="nama_diskon" value="<?php echo $baris[1] ?>"  required>
                        </td>
                    </tr>
                    <tr>
                        <td>POTONGAN HARGA</td>
                        <td>:</td>
                        <td><input type="text" name="potongan_harga" value="<?php echo $baris[2] ?>" required></td>
                    </tr>
                    <tr>
                        <td>TANGGAL MULAI</td>
                        <td>:</td>
                        <td><input type="text" name="tanggal_mulai" value="<?php echo $baris[3] ?>" required></td>
                    </tr>
                    <tr>
                        <td>TANGGAL BERAKHIR</td>
                        <td>:</td>
                        <td><input type="text" name="tanggal_berakhir" value="<?php echo $baris[4] ?>" required></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td><input type="submit" value="Masukkan" ></td>
                    </tr>
                </table>
            </form></div>
            <div id="pencarian" style="margin: 10px 0px 0px 500px;" ></div> 
        </body>
    </html>
<?php
}else{
    echo "Redirecting......";
                echo "<script>
                function kembali()
                {
                alert(\"Data Anda Belum Bisa Di Update, Periksa Kembali!!\");
                location.href='lihat_diskon.php';
                }   
                kembali();
                </script>";
                exit;
}
?>