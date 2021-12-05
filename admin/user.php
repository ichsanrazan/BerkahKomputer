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
    <link rel="stylesheet" href="css/user.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <title>Data User</title>
  </head>
  <body>
    <section class="pembungkus">
      <!-- sidebar -->
      <div class="sidebar">
        <div class="container">
          <p>Berkah Komputer</p>
          <ul>
            <li><a href="home.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li class="user"><a href=""><i class="fa fa-user"></i><span>Data User</span></a></li>
            <li><a href="produk.php"><i class="fa fa-shopping-bag"></i><span>Data Produk</span></a></li>
            <li><a href="pemesanan.php"><i class="fa fa-list"></i><span>Data Pemesanan</span></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i><span>Keluar</span></a></li>
          </ul>
        </div>
      </div>
      <!-- konten -->
      <div class="pembungkus-konten">
        <div class="navbar">
          <p class="nav">Dashboard / Data User</p>
          <div class="profile">
            <p>Kelompok 3</p>
            <img src="css/img/admin.png" alt="profile" />
          </div>
        </div>
        <div class="konten">
          <h1>Data User</h1>
          <form action="" method="post">
            <input type="text" name="keyword" placeholder="cari user...." autofocus required oninvalid="this.setCustomValidity('silahkan ketikkan user')" oninput="setCustomValidity('')" />
            <button type="submit" name="cari"><i class="fa fa-search"></i><span>Cari</span></button>
          </form>
          <div class="tabel">
            <table>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Handphone</th>
                <th>Username</th>
              </tr>
              <?php 
                $nomor = 1;
                $allUser = $db->query("SELECT*FROM user");
                while($user = $allUser->fetch_assoc()):
              ?>
              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $user["nama"];?></td>
                <td><?php echo $user["handphone"];?></td>
                <td><?php echo $user["username"];?></td>
              </tr>
              <?php $nomor++;?>
              <?php endwhile;?>
            </table>
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
