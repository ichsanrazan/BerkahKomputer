<?php
session_start();
$id = $_GET["uniq"];

unset($_SESSION["keranjang"][$id]);
header("location:detail.php");
exit;
?>