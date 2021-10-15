<?php
session_start();
$admin = [
	"username" => "kelompok3",
	"password" => "admin"
];

// cek session admin
if(isset($_SESSION["admin"])){
	header("location:home.php");
	exit;
}

if(isset($_POST["masuk"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	if($username == "kelompok3" AND $password == "admin"){
		$_SESSION["admin"] = $admin;
		echo "<script>alert('login berhasil');</script>";
		echo "<script>document.location.href='home.php';</script>";
	}else{
		echo "<script>alert('login gagal');</script>";
		echo "<script>document.location.href='login.php';</script>";
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
		<h2>Admin</h2>
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