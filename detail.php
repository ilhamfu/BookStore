<?php
    include "koneksi.php";
    if (isset($_GET["id"])) {
        $isbn = $_GET["id"];
    } else {
        header("location:index.php");
    };

    $sql = "select * from vwBuku where isbn='$isbn'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_row($query);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/detail.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Buku</title>
</head>
<body>
    <center><h1><?=$data[1]?></h1>
    <table border="0">
        <tr height="10px">
            <td rowspan="6"><img src="img/bookcover/<?=$data[0]?>.jpg" alt="" width="411" height="600"></td>
            <td>ISBN</td>
            <td>:</td>
            <td><?=$data[0]?></td>
        </tr>
        <tr height="10px">
            <td>Pengarang</td>
            <td>:</td>
            <td><?=$data[2]?></td>
        </tr>
        <tr height="10px">
            <td>Penerbit</td>
            <td>:</td>
            <td><?=$data[3]?></td>
        </tr>
        <tr height="10px">
            <td>Tahun Terbit</td>
            <td>:</td>
            <td><?=$data[4]?></td>
        </tr>
        <tr height="10px">
            <td>Stok</td>
            <td>:</td>
            <td><?=$data[5]?></td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
</body>
</html>