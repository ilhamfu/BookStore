<?php
    include "koneksi.php";
    $isbn = $_GET["isbn"];
    $id = $_GET["id"];
    $sql = "DELETE FROM tblListBuku WHERE id_peminjaman=$id and isbn_buku='$isbn'";
    $result = mysqli_query($conn,$sql);
    if ($result){
        $sql = "update tbBuku set jumlah=jumlah+1 where isbn='$isbn'";
        mysqli_query($conn,$sql);
    }
    header("location:listpinjam.php")
?>