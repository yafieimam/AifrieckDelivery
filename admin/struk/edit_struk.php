<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil=  mysqli_query($connect, "SELECT * FROM struk WHERE id_struk='$id'");

    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Edit Data Struk</title>        
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
           <h1>Edit Data Struk</h1>
                <?php
                while($baris=mysqli_fetch_row($hasil))
                {
                ?>
                <form action="proses2.php" method="post">
                <table>
                    <tr>
                        <td>ALAMAT</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $baris[0] ?>">
                            <input type="text" name="alamat" value="<?php echo $baris[1] ?>"  required>
                        </td>
                    </tr>
                    <tr>
                        <td>KECAMATAN</td>
                        <td>:</td>
                        <td><input type="text" name="kecamatan" value="<?php echo $baris[2] ?>" required></td>
                    </tr>
                    <tr>
                        <td>KOTA</td>
                        <td>:</td>
                        <td><input type="text" name="kota" value="<?php echo $baris[3] ?>" required></td>
                    </tr>
                    <tr>
                        <td>CATATAN</td>
                        <td>:</td>
                        <td><input type="text" name="catatan" value="<?php echo $baris[4] ?>" required></td>
                    </tr>
                    <tr>
                        <td>TOTAL</td>
                        <td>:</td>
                        <td><input type="text" name="total" value="<?php echo $baris[5] ?>" required></td>
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
                location.href='lihat_struk.php';
                }   
                kembali();
                </script>";
                exit;
}
?>