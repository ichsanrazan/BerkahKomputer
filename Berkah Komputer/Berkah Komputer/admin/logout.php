<?php 
session_start();
// cek session admin
if(!isset($_SESSION["admin"])){
    header("location:login.php");
    exit;
}
// bersihkan session
$_SESSION = [];
session_destroy();
session_unset();
header("location:login.php");
exit;
?>