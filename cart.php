<?php
require 'connect.php';

function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
$produk = query("SELECT * FROM produk");

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- my style -->
    <link rel="stylesheet" href="style.css">

    <!-- swipper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->

    <!-- navbar -->
    <?php require "navbar_user.php"; ?>

    <!-- cart shop -->
    <section class="cart">
        <div class="container">
            <h1 class="heading"><span>Cart Shop</span></h1>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-center">
                                <?php foreach ($produk as $row) : ?>
                                <div class="card me-3" style="width: 18rem;">
                                    <img src="asset/<?= $row['foto'] ?>" class=" card-img-top"
                                        alt="<?= $row['nama_produk'] ?>">
                                    <div class="card-body">

                                        <!-- <h5 class="card-title fw-bold"><?= $row['nama_produk'] ?></h5> -->
                                        <!-- <div class="stars">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <p class="card-text text-justify"><?= $row['deskripsi_produk'] ?></p> -->
                                        <h3 class="harga"><span>Rp.</span><?= $row['harga_satuan'] ?></h3>
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">qty</span>
                                            <input type="number" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm">
                                            <button type="button" class="btn1 btn-outline-dark">
                                                <img src="http://cdn.onlinewebfonts.com/svg/img_386644.png" style="height:10px ">
                                            </button>
                                        </div>
                                        <h3 class="harga"><span>Harga total: Rp.</span></h3>
                                        <button type="submit" class="btn btn-info fw-bold text-center me-md-2"
                                            name="add_to_cart">Delete item</button>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Product 1</td>
                                <td>1000</td>
                                <td>1</td>
                                <td>1000</td>
                                <td>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Product 2</td>
                                <td>2000</td>
                                <td>2</td>
                                <td>4000</td>
                                <td>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Product 3</td>
                                <td>3000</td>
                                <td>3</td>
                                <td>9000</td>
                                <td>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-12">
                    <h3 class="text-end">Total : 14000</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-success">Checkout</button>
                </div>
            </div> -->
            <div class="cart-total">
                <p>Total Biaya : <span>Rp ,-</span></p>
                <!-- <?= number_format($grand_total); ?> -->
                <button href="shop.php" class="option-btn">Lanjut Belanja</button>
                <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>"
                    onclick="return confirm('delete all from cart?');">Hapus Semua Barang</a>
                <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Lanjut Pembayaran</a>
            </div>
        </div>
    </section>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <!-- awesome -->
    <script src="https://kit.fontawesome.com/b47e03d51e.js" crossorigin="anonymous"></script>

    <!-- swipper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- my script -->
    <script src="script.js"></script>
</body>



</html>



<style>
.btn {
    color: white;
}

.btn1 {
    margin: 0px 20px;
    background-color: orange;
}

.card-img-top {
    min-height: 30rem;
}

.harga {
    margin-bottom: 40px;
}

.stars {
    font-size: 1.2rem;
    text-align: left;
    color: var(--orange);
}
</style>