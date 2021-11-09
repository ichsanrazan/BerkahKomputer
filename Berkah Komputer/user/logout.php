<?php
session_start();

$_SESSION = [];
session_destroy();
session_unset();
echo "<script>alert('logout berhasil');</script>";
echo "<script>document.location.href='index.php';</script>";
?>