<?php
session_start();
$id = $_GET["uniq"];

// cek kondisi
if(isset($_SESSION["keranjang"][$id])){
    $_SESSION["keranjang"][$id]+=1;
}else{
    $_SESSION["keranjang"][$id] = 1;
}

echo "<script>alert('barang ditambahkan kedalam keranjang')</script>";
echo "<script>document.location.href='detail.php'</script>"

?>