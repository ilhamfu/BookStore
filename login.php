<?php
    include "koneksi.php";
    session_start();
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
    
        $query= mysqli_query($conn,
        "SELECT * FROM tblLogin WHERE password='$password' and username='$username'");

        $rows=mysqli_num_rows($query);
        $data = mysqli_fetch_row($query);
        if($rows==1){
            $_SESSION['username']= $username;
            $_SESSION['status']= $data[2];
            $_SESSION["isPinjam"]=$data[9];
            header("location:/bookstore/BookStore/");
        }
        else{
?>
    <script type="text/javascript">
        alert("Password atau username salah")
    </script>
<?php
        }
    }
?>


<html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        
            <a href="/bookstore/BookStore"><h1 align="center">TOKO BUKU KITA</h1></a>
            <h3><center>"Baca Buku Menambah Ilmu"</center></h3>

            <form method="POST" action="">
                <input type="text" placeholder="username" name="username">
                <input type="password" placeholder="password" name="password"/>
                <input class="btn" type="submit" value="LOGIN"/></center>
                <center> <a href="singup.php">Belum ada akun? Sing Up</a> </center>
            </form>
            
        
    </body>

</html>
