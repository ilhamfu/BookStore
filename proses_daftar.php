<?php
    include "koneksi.php";
    session_start();
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $namad = $_POST["namad"];
    $namab = $_POST["namab"];
    $alamat = $_POST["alamat"];
    $jkelamin = ($_POST["jkelamin"]=="l")?"laki":"perempuan";
    $tgl_lahir = $_POST["tgl_lahir"];
    $email = $_POST["email"];

    $sql = "insert into tblLogin values('$username','$password','USER','$namad','$namab','$alamat','$jkelamin','$tgl_lahir','$email')";
    echo($sql);
    $hasil = mysqli_query($conn,$sql);
    if ($hasil){
        echo "good";
    }else{
        echo "bad";
    }
?>