<?php
session_start();
// cek session admin
if(!isset($_SESSION["admin"])){
    header("location:login.php");
    exit;
  }
require_once "../database/db.php";
$id = $_GET["id"];

$db->query("DELETE FROM barang WHERE id_barang=$id");
echo "<script>alert('produk berhasil dihapus');</script>";
echo "<script>document.location.href='produk.php';</script>";
?>