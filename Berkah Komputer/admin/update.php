<?php
session_start();
require_once "../database/db.php";
// cek session admin
if(!isset($_SESSION["admin"])){
  header("location:login.php");
  exit;
}

$id = $_GET["id"];
$select = $db->query("SELECT*FROM barang WHERE id_barang=$id");
$data = $select->fetch_assoc();

// // update
if(isset($_POST["submit"])){
  $id_barang = $_POST["id_barang"];
  $gambarLama = $_POST["gambarLama"];
  $merek = htmlspecialchars($_POST["merek"]);
  $kategori = $_POST["kategori"];
  $stok = htmlspecialchars($_POST["stok"]);
  $harga = htmlspecialchars($_POST["harga"]);

  // cek user pilih gambar atau tidak
  if($_FILES["gambar"]["error"] == 4){
    $gambar = $gambarLama;
  }else{
    // file gambar
    $namaGambar = $_FILES["gambar"]["name"];
    $tipeGambar = $_FILES["gambar"]["type"];
    $tmp = $_FILES["gambar"]["tmp_name"];
    $sizeGambar = $_FILES["gambar"]["size"];
    // cek tipe file
    if($tipeGambar == "image/jpeg" || $tipeGambar == "image/png" || $tipeGambar == "image/jpg"){
      // cek ukuran harus kurang dari sama dengan 1mb
     if($sizeGambar <= 1000000){
      $tipe = explode(".",$namaGambar);
      $gambar = uniqid();
      $gambar.= ".";
      $gambar.= end($tipe);
      move_uploaded_file($tmp, "css/img/".$gambar);
      }else{
        echo "<script>alert('maaf, ukuran gambar harus kurang dari 1 Mb');</script>";
        echo "<script>document.location.href='produk.php';</script>";
        return false;
      }
    }else{
      echo "<script>alert('maaf, tipe gambar harus jpeg/png');</script>";
      echo "<script>document.location.href='produk.php';</script>";
      return false;
   }
  }
  // update database
  $db->query("UPDATE barang SET merek='$merek', kategori='$kategori', stok=$stok, harga=$harga, gambar='$gambar' WHERE id_barang=$id_barang");
  if($db->affected_rows > 0){
    echo "<script>alert('produk berhasil diupdate');</script>";
    echo "<script>document.location.href='produk.php';</script>";
  }else{
    echo "<script>alert('maaf, produk gagal update');</script>";
    echo "<script>document.location.href='produk.php';</script>";
  }
 
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- css -->
      <link rel="stylesheet" href="css/update.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
      <title>Update Data</title>
  </head>
  <body>
    <div class="box">
    <form action="" method="post" enctype="multipart/form-data">
      <h2>Update Barang</h2>
      <input type="hidden" name="id_barang" value="<?php echo $data["id_barang"]; ?>">
      <input type="hidden" name="gambarLama" value="<?php echo $data["gambar"]; ?>">
      <ul>
        <li><label for="merek">Merek</label></li>
        <li><input type="text" name="merek" value="<?php echo $data["merek"]; ?>" autofocus required placeholder="isi data merek....." id="merek"></li>
        <li><label for="kategori">Kategori</label></li>
        <li>
          <select name="kategori" id="kategori">
            <option value="<?php echo $data["kategori"]; ?>"><?php echo $data["kategori"]; ?></option>
            <option value="motherboard">Motherboard</option>
            <option value="mouse">Mouse</option>
            <option value="keyboard">Keyboard</option>
            <option value="ram">RAM</option>
            <option value="processor">Processor</option>
          </select>
        </li>
        <li><label for="stok">Stok</label></li>
        <li><input type="text" name="stok" value="<?php echo $data["stok"]; ?>" required placeholder="isi data stok....." id="stok"></li>
        <li><label for="harga">Harga</label></li>
        <li><input type="text" name="harga" value="<?php echo $data["harga"]; ?>" required placeholder="isi data harga....." id="harga"></li>
        <li><label for="gambar">Upload gambar</label></li>
        <li><img src="css/img/<?php echo $data["gambar"]; ?>" width="70" height="70"> << Gambar terkini
          <input type="file" name="gambar" id="gambar"></li>
        <li><button type="submit" name="submit"><i class="fa fa-edit"></i> Update</button></li>
        <li><button type="button" class="kembali"><a href="produk.php"><i class="fa fa-arrow-left"></i> Kembali</a></button></li>
      </ul>
      </form>
    </div>
  </body>
</html>