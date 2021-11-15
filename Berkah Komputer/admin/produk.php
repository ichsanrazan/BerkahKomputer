<?php 
session_start();
require_once "../database/db.php";
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
    <link rel="stylesheet" href="css/produk.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <title>Data Produk</title>
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
            <li class="produk"><a href=""><i class="fa fa-shopping-bag"></i><span>Data Produk</span></a></li>
            <li><a href="pemesanan.php"><i class="fa fa-list"></i><span>Data Pemesanan</span></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Keluar</span></a></li>
          </ul>
        </div>
      </div>
      <!-- konten -->
      <div class="pembungkus-konten">
        <div class="navbar">
          <p class="nav">Dashboard / Data Produk</p>
          <div class="profile">
            <p>Kelompok 3</p>
            <img src="css/img/admin.png" alt="profile" />
          </div>
        </div>
        <div class="konten">
          <h1>Data Produk</h1>
          <form action="" method="post">
            <input type="text" name="keyword" placeholder="cari produk ...." autofocus required oninvalid="this.setCustomValidity('silahkan ketikkan produk')" oninput="setCustomValidity('')" />
            <button type="submit" name="cari"><i class="fa fa-search"></i><span>Cari</span></button>
          </form>
          <div class="tabel">
            <!-- looping dari database -->
            <?php if(isset($_POST["cari"])): 
             $keyword = $_POST["keyword"];?>
            <?php 
             $allData = $db->query("SELECT*FROM barang WHERE merek LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR stok LIKE '%$keyword%' OR harga LIKE '%$keyword%'");
             while($data = $allData->fetch_assoc()):
            ?>
                <div class="produk">
                  <div class="image">
                    <img src="css/img/<?php echo $data["gambar"];?>" alt="produk">
                  </div>
                  <div class="teks">
                    <p class="info">
                    <?php echo $data["merek"]; ?><br>
                    <strong>Stok</strong> <?php echo $data["stok"];?><br>
                    Rp.<?php echo number_format($data["harga"]);?><br>
                    <a href="update.php?id=<?php echo $data["id_barang"]; ?>" class="ubah" title="ubah produk"><i href="<?php echo "coba"; ?>" class="fa fa-edit"></i> Edit</a>
                  </div>
                </div>
            <?php endwhile; ?>
            <?php else: ?>
            <?php 
             $allData = $db->query("SELECT*FROM barang");
             while($data = $allData->fetch_assoc()):
            ?>
                <div class="produk">
                  <div class="image">
                    <img src="css/img/<?php echo $data["gambar"];?>" alt="produk">
                  </div>
                  <div class="teks">
                    <p class="info">
                    <?php echo $data["merek"]; ?><br>
                    <strong>Stok</strong> <?php echo $data["stok"];?><br>
                    Rp.<?php echo number_format($data["harga"]);?><br>
                    <a href="update.php?id=<?php echo $data["id_barang"]; ?>" class="ubah" title="ubah produk"><i href="<?php echo "coba"; ?>" class="fa fa-edit"></i> Edit</a>
                  </div>
                </div>
              <?php endwhile;?>
              <?php endif; ?>
            </div>
          <a href="tambah.php" class="tambah"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
      </div>
    </section>
    <!-- footer -->
    <footer>
      <p>Kelompok 3 | Released 2021</p>
    </footer>
  </body>
</html>
