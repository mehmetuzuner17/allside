<?php
session_start();
require "ayar.php";
require "functions.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RANT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="sss.php">SSS</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="contact.php">Destek</a>
                </div>
            </div>
            
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">MeM</span>RANT</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ürün Arayın">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <?php require "navbar2.php"; ?>

    <!-- Navbar Start -->

    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Ödeme Ekranı</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Ana Sayfa</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Ödeme Ekranı</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Fatura Adresi</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>İsim</label>
                            <input class="form-control" type="text" placeholder="Mehmet">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Soyisim</label>
                            <input class="form-control" type="text" placeholder="Uzuner">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Telefon Numarası</label>
                            <input class="form-control" type="text" placeholder="+90 512 345 67 89">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adres</label>
                            <input class="form-control" type="text" placeholder="123 Cadde">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adres 2</label>
                            <input class="form-control" type="text" placeholder="123 Cadde">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ülke</label>
                            <select class="custom-select">
                                <option selected>Türkiye</option>
                                <option>ABD</option>
                                <option>İngiltere</option>
                                <option>Portekiz</option>
                                <option>İtalya</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>İl</label>
                            <input class="form-control" type="text" placeholder="Ankara">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>İlçe</label>
                            <input class="form-control" type="text" placeholder="Çankaya">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Posta Kodu</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Hesap Oluştur</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Teslimat Adresi</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>İsim</label>
                            <input class="form-control" type="text" placeholder="Mehmet">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Soyisim</label>
                            <input class="form-control" type="text" placeholder="Uzuner">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Telefon Numarası</label>
                            <input class="form-control" type="text" placeholder="+90 512 345 67 89">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adres</label>
                            <input class="form-control" type="text" placeholder="123 Cadde">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adres 2</label>
                            <input class="form-control" type="text" placeholder="123 Cadde">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ülke</label>
                            <select class="custom-select">
                                <option selected>Türkiye</option>
                                <option>ABD</option>
                                <option>İngiltere</option>
                                <option>Portekiz</option>
                                <option>İtalya</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>İl</label>
                            <input class="form-control" type="text" placeholder="Ankara">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>İlçe</label>
                            <input class="form-control" type="text" placeholder="Çankaya">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Posta Kodu</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Sipariş Toplamı</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Ürünler</h5>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 1</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 2</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Colorful Stylish Shirt 3</p>
                            <p>$150</p>
                        </div>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Ara Toplam</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Kargo</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Toplam</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Ödeme</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Siparişi Tamamla</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <?php require "footer.php"; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>