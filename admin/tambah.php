<?php
session_start();
require_once "../database/db.php";
// cek session admin
if(!isset($_SESSION["admin"])){
  header("location:login.php");
  exit;
}
if(isset($_POST["submit"])){
  $merek = htmlspecialchars($_POST["merek"]);
  $kategori = $_POST["kategori"];
  $stok = htmlspecialchars($_POST["stok"]);
  $harga = htmlspecialchars($_POST["harga"]);
  // file gambar
  $namaGambar = $_FILES["gambar"]["name"];
  $tipeGambar = $_FILES["gambar"]["type"];
  $tmp = $_FILES["gambar"]["tmp_name"];
  $sizeGambar = $_FILES["gambar"]["size"];

  // cek tipe file
  if($tipeGambar == "image/jpeg" || $tipeGambar == "image/png"){
    // cek ukuran harus kurang dari sama dengan 1mb
    if($sizeGambar <= 1000000){
      $tipe = explode(".",$namaGambar);
      $nama = uniqid();
      $nama.= ".";
      $nama.= end($tipe);
      move_uploaded_file($tmp, "css/img/".$nama);
      // insert ke database
      $db->query("INSERT INTO barang VALUES('','$merek','$kategori',$stok,$harga,'$nama')");
      if($db->affected_rows > 0){
        echo "<script>alert('produk berhasil ditambahkan');</script>";
        echo "<script>document.location.href='produk.php';</script>";
      }else{
        echo "<script>alert('maaf, produk gagal ditambahkan');</script>";
        echo "<script>document.location.href='tambah.php';</script>";
      }
    }else{
      echo "<script>alert('maaf, ukuran gambar harus kurang dari 1 Mb');</script>";
      echo "<script>document.location.href='tambah.php';</script>";
    }
  }else{
    echo "<script>alert('maaf, tipe gambar harus jpeg/png');</script>";
    echo "<script>document.location.href='tambah.php';</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="css/tambah.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <title>Tambah Data</title>
  </head>
  <body>
    <div class="box">
      <form action="" method="post" enctype="multipart/form-data">
        <h2>Tambah Barang</h2>
        <ul>
          <li><label for="merek">Merek</label></li>
          <li><input type="text" name="merek" autofocus required placeholder="isi data merek....." id="merek"></li>
          <li><label for="kategori">Kategori</label></li>
          <li>
            <select name="kategori" id="kategori">
              <option value="motherboard">Motherboard</option>
              <option value="mouse">Mouse</option>
              <option value="keyboard">Keyboard</option>
              <option value="ram">RAM</option>
              <option value="processor">Processor</option>
            </select>
          </li>
          <li><label for="stok">Stok</label></li>
          <li><input type="text" name="stok" required placeholder="isi data stok....." id="stok"></li>
          <li><label for="harga">Harga</label></li>
          <li><input type="text" name="harga" required placeholder="isi data harga....." id="harga"></li>
          <li><label for="gambar">Upload gambar</label></li>
          <li><input type="file" name="gambar" required id="gambar"></li>
          <li><button type="submit" name="submit"><i class="fa fa-plus"></i> Tambah</button></li>
          <li><button type="button" class="kembali"><a href="produk.php"><i class="fa fa-arrow-left"></i> Kembali</a></button></li>
        </ul>
      </form>
    </div>
  </body>
</html>