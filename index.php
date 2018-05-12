<?php
  include 'koneksi.php';
  $sql = "SELECT * FROM vwBuku";
  $result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
  <table border='1'>
    <tr>
      <td>No</td>
      <td>ISBN</td>
      <td>Judul</td>
      <td>Pengarang</td>
      <td>Penerbit</td>
      <td>Tahun Terbit</td>
      <td>Tersedia</td>
    </tr>
    <?php 
      $no=1;
      while($data = mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <td><?=$no++?></td>
      <td><?=$data['isbn']?></td>
      <td><a href="#"><?=$data['judul']?></a></td>
      <td><?=$data['pengarang']?></td>
      <td><?=$data['nama_instansi']?></td>
      <td><?=$data['tahun_terbit']?></td>
      <td><?=($data['jumlah']>0)?'tersedia':'kosong'?></td>
    </tr>
    <?php } ?>
  </table>

</body>
</html>