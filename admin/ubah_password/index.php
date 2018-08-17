<?php
include "../cek_session.php";
include "../../conn.php";

if($_SESSION['level'] == "admin"){
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Ubah Password</title>        
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
           <h1>Ubah Password</h1>
                <form action="proses.php" method="post">
                <table>
                    <tr>
                        <td>PASSWORD LAMA</td>
                        <td>:</td>
                        <td><input type="password" name="password_lama" required></td>
                    </tr>
                    <tr>
                        <td>PASSWORD BARU</td>
                        <td>:</td>
                        <td><input type="password" name="password_baru" required></td>
                    </tr>
                    <tr>
                        <td>KONFIRMASI PASSWORD BARU</td>
                        <td>:</td>
                        <td><input type="password" name="konfirmasi_password_baru" required></td>
                    </tr>
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
                location.href='lihat_user.php';
                }   
                kembali();
                </script>";
                exit;
}
?>