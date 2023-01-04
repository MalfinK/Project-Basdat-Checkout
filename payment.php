<?php
require "connect.php";

if (isset($_GET['delete_all'])) {
    $delete_cart_item = $connect->prepare("DELETE FROM cart");
    $delete_cart_item->execute();
    header('location:shop.php');
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
    <!-- <h1>Hello, world!</h1> -->

    <!-- navbar -->
    <?php require "navbar_user.php"; ?>

    <!-- payment -->
    <section class="payment">
        <h1 class="heading2"><span>Payment Method</span></h1>

        <form action="" method="post">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <?php
                    $total_barang = 0;
                    $grand_total = 0;
                    $keranjang = $connect->prepare("SELECT * FROM cart");
                    $keranjang->execute();
                    if ($keranjang->rowCount() > 0) {
                        foreach ($keranjang as $row) :
                    ?>
                            <input type="hidden" name="cart_id" value="<?= $row['id']; ?>">
                            <?php number_format($sub_total = ($row['jumlah_harga'] * $row['jumlah_barang'])); ?>

                        <?php
                            $grand_total += $sub_total;
                            $total_barang += $row['jumlah_barang'];
                        endforeach;
                        ?>
                    <?php
                    } else {
                        echo "No product found!";
                    }
                    ?>
                    <h5 class="card-title">Metode Pembayaran</h5>
                    <div class="input-group mb-3">
                        <select class="form-select" id="inputGroupSelect02">
                            <option selected>Choose...</option>
                            <option value="1">BRI</option>
                            <option value="2">Mandiri</option>
                            <option value="3">COD</option>
                        </select>
                        <label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
                    </div>
                    <h5 class="card-title"><b>Ringkasan Belanja Tanggal <?= date('d-m-Y'); ?></b></h5>
                    <p class="card-text">Total Tagihan Semuanya: <span>Rp. <?= number_format($grand_total+10000); ?>,-</span></p>
                    <a href="payment.php?delete_all" onclick="alert('PEMBAYARAN SUKSES!!!')" class="btn btn-primary" type="submit">Bayar</a>
                </div>
            </div>
        </form>
    </section>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- awesome -->
    <script src="https://kit.fontawesome.com/b47e03d51e.js" crossorigin="anonymous"></script>

    <!-- swipper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- my script -->
    <script src="script.js"></script>
</body>

</html>