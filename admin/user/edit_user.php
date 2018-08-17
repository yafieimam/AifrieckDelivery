<?php
include "../cek_session.php";
include "../../conn.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $hasil=  mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id'");

    if(!$hasil){
        die("PERMINTAAN QUERY GAGAL");
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Input Data User</title>        
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
           <h1>Input Data User</h1>
                <?php
                while($baris=mysqli_fetch_row($hasil))
                {
                ?>
                <form action="proses2.php" method="post">
                <table>
                    <tr>
                        <td>USERNAME</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $baris[0] ?>">
                            <input type="text" name="username" value="<?php echo $baris[1] ?>"  required>
                        </td>
                    </tr>
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
                    <?php
                    if($baris[5]=="admin"){
                    ?>
                    <tr>
                        <td>LEVEL</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="level" value="admin" checked>Admin
                            <input type="radio" name="level" value="user">User
                        </td>
                    </tr>
                    <?php
                    }else if($baris[5]=="user"){
                    ?>
                    <tr>
                        <td>LEVEL</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="level" value="admin">Admin
                            <input type="radio" name="level" value="user" checked>User
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td>FULLNAME</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="fullname" value="<?php echo $baris[3] ?>"  required>
                        </td>
                    </tr>
                    <tr>
                        <td>EMAIL</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="email" value="<?php echo $baris[4] ?>"  required>
                        </td>
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
                location.href='lihat_user.php';
                }   
                kembali();
                </script>";
                exit;
}
?>