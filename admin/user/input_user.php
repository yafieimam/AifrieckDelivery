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
            <form action="proses.php" method="post">
            <table> 
                <tr>
                    <td>USERNAME</td>
                    <td>:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>PASSWORD</td>
                    <td>:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>FULLNAME</td>
                    <td>:</td>
                    <td><input type="text" name="fullname" required></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>:</td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td>LEVEL</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="level" value="admin">Admin
                        <input type="radio" name="level" value="user">User
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Masukkan" ></td>
                </tr>
            </table>
        </form></div>
        <div id="pencarian" style="margin: 10px 0px 0px 500px;" ></div> 
    </body>
</html>
