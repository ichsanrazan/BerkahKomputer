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
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Home</title>
  </head>
  <body>
    <section class="pembungkus">
      <!-- sidebar -->
      <div class="sidebar">
        <div class="container">
          <p>Berkah Komputer</p>
          <ul>
            <li class="home"><a href=""><i class="fa fa-home"></i><span>Home</span></a></li>
            <li><a href="user.php"><i class="fa fa-user"></i><span>Data User</span></a></li>
            <li><a href="produk.php"><i class="fa fa-shopping-bag"></i><span>Data Produk</span></a></li>
            <li><a href="pemesanan.php"><i class="fa fa-list"></i><span>Data Pemesanan</span></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Keluar</span></a></li>
          </ul>
        </div>
      </div>
      <!-- konten -->
      <div class="pembungkus-konten">
        <div class="navbar">
          <p class="nav">Dashboard / Home</p>
          <div class="profile">
            <p>coba</p>
            <img src="css/img/admin.png" alt="profile" />
          </div>
        </div>
        <div class="konten">
         <h1>Hai,<?php echo " ".$_SESSION["admin"]["username"]; ?></h1>
         <p>Selamat datang di halaman admin, halaman admin ini memiliki fitur untuk melakukan manajamen
         data user, data barang dan data pemesanan. Pada halaman ini juga anda sebagai admin bisa melakukan 
         tambah data barang, hapus data barang, dan ubah data barang. Pergunakan halaman admin ini dengan
         sebaik mungkin agar bisnis sepatu ini bisa berjalan dengan baik.</p>
         <div class="data">
            <p class="satu">
              <span><i class="fa fa-suitcase"></i> Total Produk</span>
              <span>
              </span>
            </p>
            <p class="satu">
              <span><i class="fa fa-check"></i> Pembayaran Selesai</span>
              <span>
              </span>
            </p>
            <p class="satu">
              <span><i class="fa fa-clock-o"></i> Menunggu Pembayaran</span>
              <span>
              </span>
          </p>
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
