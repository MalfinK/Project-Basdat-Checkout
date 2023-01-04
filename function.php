<?php 
require "connect.php";

if (isset($_GET['produk_id'])) {
    $produk_id = $_GET['produk_id'];
    $query = "SELECT * FROM produk WHERE id = '$produk_id'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $harga = $row['harga_satuan'];
    $query = "INSERT INTO cart (produk_id, jumlah_barang, jumlah_harga) VALUES ('$produk_id', '1', '$harga')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: shop.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    
}
?>