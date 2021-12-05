<?php
session_start();

// cek session admin
if(isset($_SESSION["user"])){
	header("location:home.php");
	exit;
}

// koneksi 
require_once "database/db.php";

if(isset($_POST["masuk"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
    // ambil data berdasarkan username
    $allData = $db->query("SELECT*FROM user WHERE username='$username'");
    // cek username
	if($allData->num_rows == 1){
        // cek password
        $data = $allData->fetch_assoc();
        if($password == $data["password"]){
		$_SESSION["user"] = $data;
		header("location:index.php");
		exit;
      }else{
        $alert = TRUE;
      }
	}else{
		$alert = TRUE;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>Login | Berkah Komputer</title>
</head>
<body>
	<h1>Berkah Komputer</h1>
	<div class="box-login">
		<h2>Login</h2>
		<?php if(isset($alert)):?>
			<p style="color:red;background-color:rgb(255, 157, 157);font-style:italic;text-align:center;padding:5px 0;border-radius:5px;">username / password salah</p>
		<?php endif;?>
		<form action="" method="post">
			<ul>
				<li>
					<i class="fa fa-user"></i><label>Username</label>
				</li>
				<li>
					<input type="text" id="" name="username" autofocus placeholder="silahkan isi username" required oninvalid="this.setCustomValidity('Silahkan isi username terlebih dahulu')" oninput="setCustomValidity('')">
				</li>
				<li>
					<i class="fa fa-lock"></i><label>Password</label>
				</li>
				<li>
					<input type="password" id="" name="password" placeholder="silahkan isi password" required oninvalid="this.setCustomValidity('Silahkan isi password terlebih dahulu')" oninput="setCustomValidity('')">
				</li>
				
				<li class="tombol">
					<button type="submit" name="masuk">Masuk</button>
				</li>
			</ul>
		</form>
	</div>
</body>
</html>