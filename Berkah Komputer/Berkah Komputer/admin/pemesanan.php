<?php 
session_start();
// cek session admin
if(!isset($_SESSION["admin"])){
  header("location:login.php");
  exit;
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- css -->
    <link rel="stylesheet" href="css/pemesanan.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <title>Data Pemesanan</title>
  </head>
  <body>
    <section class="pembungkus">
      <!-- sidebar -->
      <div class="sidebar">
        <div class="container">
          <p>Berkah Komputer</p>
          <ul>
            <li><a href="home.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li><a href="user.php"><i class="fa fa-user"></i><span>Data User</span></a></li>
            <li><a href="produk.php"><i class="fa fa-shopping-bag"></i><span>Data Produk</span></a></li>
            <li class="pesanan"><a href=""><i class="fa fa-list"></i><span>Data Pemesanan</span></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Keluar</span></a></li>
          </ul>
        </div>
      </div>
      <!-- konten -->
      <div class="pembungkus-konten">
        <div class="navbar">
          <p class="nav">Dashboard / Data Pemesanan</p>
          <div class="profile">
            <p><?php echo "coba"; ?></p>
            <img src="css/img/admin.png" alt="profile" />
          </div>
        </div>
        <div class="konten">
          <h1>Data Pemesanan</h1>
          <!-- pemesanan -->
          <div class="tabel">
          </div>
          <h1>Data Pemesanan Barang</h1>
          <!-- pemesanan barang -->
          <div class="tabel">
          </div>
        </div>
      </div>
    </section>
    <!-- footer -->
    <footer>
      <p>Kelompok 3 | Released 2021</p>
    </footer>
  </body>
</html>
