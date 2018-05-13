<?php
    include "koneksi.php";
    session_start();

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query= mysqli_query($conn,
    "SELECT * FROM tblLogin WHERE password='$password' and username='$username'");

    $rows=mysqli_num_rows($query);
    $data = mysqli_fetch_row($query);
    if($rows==1){
        $_SESSION['username']= $username;
        $_SESSION['status']= $data[2];
        header("location:index.php");
    }
        else{
            echo "Username atau Password salah";
    }

?>