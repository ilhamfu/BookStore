<!DOCTYPE html>
<html>
    <head>
        <title> SIGN UP </title>
    </head>
    
    <body>
        <form id="userform" method="post" action="proses_daftar.php">
            Username: <input type="text" name="username" placeholder="Username" required="required"/><br>
            Nama Depan: <input type="text" name="namad" placeholder="Masukkan Nama Depan" required="required"/> <br>
            Nama Belakang: <input type="text" name="namab" placeholder="Masukkan Nama Belakang" required="required"/> <br>
            Password: <input type="password" name="password" required="required"/> <br>
            jenis kelamin : <input type="radio" name="jkelamin" value="l">Laki Laki<input type="radio" name="jkelamin" value="p">Perempuan<br>
            Alamat:<textarea name="alamat" form="userform" required="required"></textarea><br>
            Tanggal Lahir:<input type="date" name="tgl_lahir" max="2100-12-31" required="required"><br>
            email: <input type="email" name="email" id="" required="required"><br>
            <input type="submit" value="SIGN UP" >
        </form>
    </body>
</html>
