<?php
require 'connect.php';

// function query($query)
// {
//     global $connect;
//     $result = mysqli_query($connect, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }
// $produk = query("SELECT * FROM produk");

if (isset($_POST['delete'])) {
    $cart_id = $_POST['cart_id'];
    $delete_cart_item = $connect->prepare("DELETE FROM cart WHERE id = ?");
    $delete_cart_item->execute([$cart_id]);
}

if (isset($_GET['delete_all'])) {
    $delete_cart_item = $connect->prepare("DELETE FROM cart");
    $delete_cart_item->execute();
    header('location:cart.php');
}

if (isset($_POST['update_qty'])) {
    $cart_id = $_POST['cart_id'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $jumlah_barang = filter_var($jumlah_barang, FILTER_SANITIZE_STRING);
    $update_qty = $connect->prepare("UPDATE cart SET jumlah_barang = ? WHERE id = ?");
    $update_qty->execute([$jumlah_barang, $cart_id]);
    $message[] = 'Jumlah keranjang belanja anda telah diperbarui';
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

<body>
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
                                <?php
                                $grand_total = 0;
                                $keranjang = $connect->prepare("SELECT * FROM cart");
                                $keranjang->execute();
                                if ($keranjang->rowCount() > 0) {
                                    foreach ($keranjang as $row) :
                                ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="cart_id" value="<?= $row['id']; ?>">
                                            <div class="card me-3" style="width: 18rem;">
                                                <img src="asset/<?= $row['foto_barang'] ?>" class=" card-img-top" alt="<?= $row['nama_barang'] ?>">
                                                <h5 class="card-title fw-bold text-center"><?= $row['nama_barang'] ?></h5>
                                                <div class="card-body">
                                                    <h3 class="harga"><span>Rp. </span><?= number_format($row['jumlah_harga'], 0, "", ",") ?></h3>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">QTY</span>
                                                        <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $row['jumlah_barang']; ?>" name="jumlah_barang">
                                                        <button type="submit" class="btn1 btn-outline-dark" name="update_qty">
                                                            <img src="http://cdn.onlinewebfonts.com/svg/img_386644.png" style="height:10px ">
                                                        </button>
                                                    </div>
                                                    <h3 class="harga"><span>Harga total: Rp. <?= number_format($sub_total = ($row['jumlah_harga'] * $row['jumlah_barang'])); ?>,-</span></h3>
                                                    <button type="submit" class="btn btn-info fw-bold text-center me-md-2" name="delete">Delete item</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    <?php 
                                    $grand_total += $sub_total;
                                    endforeach; 
                                    ?>
                                <?php
                                } else {
                                    echo "No product found!";
                                }
                                ?>
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
                <p>Total Biaya : <span>Rp <?= number_format($grand_total); ?>,-</span></p>
                <a href="shop.php" class="option-btn">Lanjut Belanja</a>
                <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('Delete all from cart?');">Hapus Semua Barang</a>
                <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Lanjut Pembayaran</a>
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



</html>



<style>
    .cart .btn,
    .delete-btn,
    .option-btn {
        display: block;
        width: 100%;
        margin-top: 1rem;
        border-radius: 0.5rem;
        padding: 1rem 3rem;
        font-size: 1.7rem;
        text-transform: capitalize;
        color: var(--white);
        cursor: pointer;
        text-align: center;
        text-decoration: none;
    }

    .cart .btn:hover,
    .delete-btn:hover,
    .option-btn:hover {
        background-color: var(--black);
    }

    .cart .btn {
        /* color: white; */
        background-color: var(--main-color);
    }

    .cart .btn1 {
        margin: 0px 20px;
        background-color: orange;
    }

    .cart .option-btn {
        background-color: var(--orange);
    }

    .cart .delete-btn {
        background-color: var(--red);
    }

    .cart .card-img-top {
        min-height: 30rem;
    }

    .cart .harga {
        margin-bottom: 40px;
    }

    .cart .stars {
        font-size: 1.2rem;
        text-align: left;
        color: var(--orange);
    }
</style>