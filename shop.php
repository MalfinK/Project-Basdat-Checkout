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

<body id="shop">
    <!-- <h1>Hello, world!</h1> -->

    <!-- navbar -->
    <?php require "navbar_user.php"; ?>

    <!-- kategori produk -->
    <section class="shop">
        <h1 class="heading"><span>Daftar Produk</span></h1>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex justify-content-center">
                        <div class="card text-center" style="width: 18rem;">
                            <img src="asset/home-img-1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Handphone</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                    the card's content.</p>
                                <a href="#" class="btn btn-primary">Tambah Keranjang</a>
                            </div>
                        </div>
                        <div class="card ms-3 text-center" style="width: 18rem;">
                            <img src="asset/home-img-2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Jam Tangan</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                    the card's content.</p>
                                <a href="#" class="btn btn-primary">Tambah Keranjang</a>
                            </div>
                        </div>
                        <div class="card ms-3 text-center" style="width: 18rem;">
                            <img src="asset/home-img-3.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Headphone</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                    the card's content.</p>
                                <a href="#" class="btn btn-primary">Tambah Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <!-- awesome -->
    <script src="https://kit.fontawesome.com/b47e03d51e.js" crossorigin="anonymous"></script>

    <!-- swipper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- my script -->
    <script src="script.js"></script>
</body>

</html>