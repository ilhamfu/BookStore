<?php
    include "koneksi.php";
    session_start();
    $isbn = $_GET["isbn"];
    $username = $_SESSION["username"];
    $isPinjam = $_SESSION["isPinjam"];
    if (!$isPinjam){
        $sql = "select * from tblStatusPeminjaman where id_user='$username' and tanggal_peminjaman is NULL";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($result);
        if (!$row){
            $sql = "insert into tblStatusPeminjaman(id_user) values ('$username')";
            $result = mysqli_query($conn,$sql);
            $sql = "select * from tblStatusPeminjaman where id_user='$username' and tanggal_peminjaman is NULL";
            $result = mysqli_query($conn,$sql);
            $data = mysqli_fetch_row($result);
            $idpinjam = $data[0];
        }
        $data = mysqli_fetch_row($result);
        $idpinjam = $data[0];

        $sql = "insert into tblListBuku values ($idpinjam,'$isbn')";
        $result = mysqli_query($conn,$sql);
        if (!$result){
            echo "anda sudah memesan buku ini";
        }else{
            $sql = "update tbBuku set jumlah=jumlah-1 where isbn='$isbn'";
            mysqli_query($conn,$sql);
            header("location:/bookstore/BookStore");
        }
    }

?>