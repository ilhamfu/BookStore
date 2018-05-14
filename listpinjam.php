<?php
    include "koneksi.php";
    session_start();
    $username = $_SESSION["username"];
    $sql = "select * from vwListPinjam where id_user='$username' and tanggal_peminjaman is NULL";
    $result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/listpinjam.css">
    <title>Document</title>
</head>
<body>

    <a href="/bookstore/BookStore"><h1 align="center">PERPUSTAKAAN KITA</h1></a>
  
  <ul>
    <li>
      <?php
        if (!(isset($_SESSION["username"]))){
      ?>
        <a href="login.php" style="float:right;">Login</a>
        <a href="singup.php" style="float:right;">Daftar</a> 
      <?php
        }else{
      ?>
        <a href="logout.php" style="float:right;">Logout</a>
      <?php
        };
      ?>
    </li>
    <li style="float:left"><a href="/bookstore/BookStore">Home</a></li>
  </ul>

    <table>
        <tr>
            <td class="column">ISBN</td>
            <td class="column">JUDUL BUKU</td>
            <td class="column">OPERASI</td>
        </tr>
        <?php
            while ($data = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?=$data["isbn"]?></td>
            <td><?=$data["judul"]?></td>
            <td><a href="hapuspinjam.php?id=<?=$data['id_peminjaman']?>&isbn=<?=$data['isbn']?>">Batal</a></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>