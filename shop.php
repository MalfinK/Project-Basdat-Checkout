<?php
require 'connect.php';

// $sql = "SELECT * FROM produk";
// $produk = $connect->query($sql);

if (isset($_POST['add_to_cart'])) {
    $produk_id = $_POST['produk_id'];
    $produk_id = filter_var($produk_id, FILTER_SANITIZE_STRING);
    $nama_barang = $_POST['nama_barang'];
    $nama_barang = filter_var($nama_barang, FILTER_SANITIZE_STRING);
    $jumlah_barang = $_POST['jumlah_barang'];
    $jumlah_barang = filter_var($jumlah_barang, FILTER_SANITIZE_STRING);
    $jumlah_harga = $_POST['jumlah_harga'];
    $jumlah_harga = filter_var($jumlah_harga, FILTER_SANITIZE_STRING);
    $foto_barang = $_POST['foto_barang'];
    $foto_barang = filter_var($foto_barang, FILTER_SANITIZE_STRING);

    $check_cart_numbers = $connect->prepare("SELECT * FROM cart WHERE nama_barang = ?");
    $check_cart_numbers->execute([$nama_barang]);

    if ($check_cart_numbers->rowCount() > 0) {
        echo "<script>alert('Item added to cart!')</script>";
    } else {

        // $check_wishlist_numbers = $conn->prepare("SELECT * FROM wishlist WHERE name = ? AND user_id = ?");
        // $check_wishlist_numbers->execute([$name, $user_id]);

        // if ($check_wishlist_numbers->rowCount() > 0) {
        //     $delete_wishlist = $conn->prepare("DELETE FROM wishlist WHERE name = ? AND user_id = ?");
        //     $delete_wishlist->execute([$name, $user_id]);
        // }

        $insert_cart = $connect->prepare("INSERT INTO cart(produk_id, nama_barang, jumlah_barang, jumlah_harga, foto_barang) VALUES(?,?,?,?,?)");
        $insert_cart->execute([$produk_id, $nama_barang, $jumlah_barang, $jumlah_harga, $foto_barang]);
        $message[] = 'added to cart!';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" href="https://github.com/MalfinK/ain-website/blob/main/img/all%20in%20one.gif" type="image/x-icon">
    <title>AIN Website</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- my style -->
    <link rel="stylesheet" href="style.css">

    <!-- swipper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body id="shop">
    <!-- <h1>Hello, world!</h1> -->

    <!-- navbar -->
    <?php require "navbar_user.php"; ?>

    <!-- kategori produk -->
    <section class="shop">
        <h1 class="heading"><span>Product List</span></h1>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex justify-content-center">
                        <?php
                        $produk = $connect->prepare("SELECT * FROM produk");
                        $produk->execute();
                        if ($produk->rowCount() > 0) {
                            foreach ($produk as $row) :
                        ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="produk_id" value="<?= $row['id']; ?>">
                                    <input type="hidden" name="nama_barang" value="<?= $row['nama_produk']; ?>">
                                    <input type="hidden" name="jumlah_barang" value="1">
                                    <input type="hidden" name="jumlah_harga" value="<?= $row['harga_satuan']; ?>">
                                    <input type="hidden" name="foto_barang" value="<?= $row['foto']; ?>">
                                    <div class="card me-3" style="width: 18rem;">
                                        <img src="asset/<?= $row['foto'] ?>" class=" card-img-top" alt="<?= $row['nama_produk'] ?>">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?= $row['nama_produk'] ?></h5>
                                            <div class="stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <p class="card-text text-justify"><?= $row['deskripsi_produk'] ?></p>
                                            <h3 class="harga"><span>Rp.</span><?= $row['harga_satuan'] ?></h3>
                                            <button type="submit" class="btn btn-info fw-bold text-center" name="add_to_cart">Add To Cart</button>
                                        </div>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        <?php 
                            } else {
                            echo "No product found!";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <!-- awesome -->
    <script src="https://kit.fontawesome.com/b47e03d51e.js" crossorigin="anonymous"></script>

    <!-- swipper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- my script -->
    <script src="script.js"></script>
</body>

<style>
    .btn {
        color: white;
    }

    .card-img-top {
        min-height: 30rem;
    }

    .harga {
        margin-bottom: 20px;
    }

    .stars {
        font-size: 1.2rem;
        text-align: left;
        color: orange;
    }
</style>

</html>