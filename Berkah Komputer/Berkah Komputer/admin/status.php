<?php
session_start();
// cek session admin
if(!isset($_SESSION["admin"])){
    header("location:login.php");
    exit;
  }
?>