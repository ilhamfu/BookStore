<?php
    include "koneksi.php"
    session_start();
    $isbn = $_GET["isbn"];
    $username = $_SESSION["username"];
    if ($ispinjam){
        $sql = "select * from tblStatusPeminjaman where id_user='$username' and tanggal_peminjaman is NULL";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_row($result);
        if ($row){
            
        }else{

        }
        
    }

?>