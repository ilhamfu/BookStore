<?php
  include 'koneksi.php';
  session_start();
  $sql = "SELECT * FROM vwBuku";
  $result = mysqli_query($conn,$sql);
  $isadmin=false;
  $isuser=false;
  if (isset($_SESSION["status"])){
    if ($_SESSION["status"]=="ADMIN"){
      $isadmin=true;
    }elseif ($_SESSION["status"]=="USER")  {
      $isuser=true;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/index.css">
  <title>Perpustakan Kita</title>
</head>
<body>

  <h1 align="center">Perpustakan Kita</h1>
  <div class="top-nav">
    <?php
      if (!(isset($_SESSION["username"]))){
    ?> 
      <a href="login.php">Login</a>
    <?php
      }else{
    ?>
      <a href="logout.php">Logout <?=$_SESSION["status"]?></a>
    <?php
      };
    ?>
  </div>
  <table>
    <tr class="header">
      <td class="column">No</td>
      <td class="column">ISBN</td>
      <td class="column">Judul</td>
      <td class="column">Pengarang</td>
      <td class="column">Penerbit</td>
      <td class="column">Tahun Terbit</td>
      <td class="column">Tersedia</td>
      <?php
        if ($isadmin){
      ?>
      <td class="column" colspan="2">Edit/Hapus</td>
      <?php
        }
      ?>
      <?php
        if ($isuser){
      ?>
      <td class="column">Pinjam</td>
      <?php
        }
      ?>
    </tr>
    <?php 
      $no=1;
      while($data = mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <td><?=$no++?></td>
      <td><?=$data['isbn']?></td>
      <td><a href="detail.php?id=<?=$data['isbn']?>"><?=$data['judul']?></a></td>
      <td><?=$data['pengarang']?></td>
      <td><?=$data['nama_instansi']?></td>
      <td><?=$data['tahun_terbit']?></td>
      <td><?=($data['jumlah'])?'Yes':'No'?></td>
      <?php
        if ($isadmin){
      ?>
      <td><a href="">edit</a></td>
      <td><a href="">hapus</a></td>
      <?php
        }
      ?>
      <?php
        if ($isuser){
      ?>
        <td>Pinjam</td>
      <?php
        }
      ?>
    </tr>
    <?php } ?>
  </table>

  </body>
</html>