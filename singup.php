<?php
    include "koneksi.php";
    session_start();
    $try = ($_SERVER["REQUEST_METHOD"]=="POST")?TRUE:FALSE;
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $namad = $_POST["namad"];
        $namab = $_POST["namab"];
        $alamat = $_POST["alamat"];
        $jkelamin = ($_POST["jkelamin"]=="l")?"laki":"perempuan";
        $tgl_lahir = $_POST["tgl_lahir"];
        $email = $_POST["email"];

        $sql = "insert into tblLogin values('$username','$password','USER','$namad','$namab','$alamat','$jkelamin','$tgl_lahir','$email')";
        $hasil = mysqli_query($conn,$sql);
        if ($hasil){
            header("location:/bookstore/BookStore");
            $_SESSION["username"]=$username;
            $_SESSION["status"]="USER";
            $_SESSION["isPinjam"]=FALSE;
        }else{
            if (mysqli_error($conn)=="Duplicate entry '$username' for key 'PRIMARY'"){
            ?>
                <script type="text/javascript">
                alert("Username sudah ada")
                </script>
            <?php
                
            };
        }
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <title> SIGN UP </title>
        <link rel="stylesheet" href="css/signup.css">
    </head>
    
    <body>
        <a href="/bookstore/BookStore"><h1 align="center">TOKO BUKU KITA</h1></a>
        <form id="userform" method="post" action="">
            Username: <input type="text" name="username" placeholder="Username" required="required"><br>
            Nama Depan: <input type="text" name="namad" placeholder="Masukkan Nama Depan" required="required"/> <br>
            Nama Belakang: <input type="text" name="namab" placeholder="Masukkan Nama Belakang" required="required"/> <br>
            Password: <input type="password" name="password" required="required"/> <br>
            Jenis Kelamin : </br> <input type="radio" name="jkelamin" value="l">Laki Laki<br><input type="radio" name="jkelamin" value="p">Perempuan<br>
            Alamat:<textarea name="alamat" form="userform" required="required"></textarea><br>
            Tanggal Lahir:<input type="date" name="tgl_lahir" max="2100-12-31" required="required"><br>
            Email: <input type="email" name="email" id="" placeholder="example@example.com" required="required"><br>
            <input type="submit" value="SIGN UP" >
            <div class="link-login"><a href="login.php">Sudah punya akun? Log In</a></div>
        </form>
    </body>
</html>
