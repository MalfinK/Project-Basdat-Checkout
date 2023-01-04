<?php
require 'connect.php';

$sql = "SELECT * FROM produk";
$produk = mysqli_query($connect, $sql);

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
                        <?php foreach ($produk as $row) : ?>
                            <form action="" method="post" enctype="multipart/form-data">
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
                                        <a href="function.php?produk_id=<?= $row['id']; ?>" type="submit" class="btn btn-info fw-bold text-center" name="add_to_cart">Add To Cart</a>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
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