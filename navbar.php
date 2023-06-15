   <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Kategoriler</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Giyim <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Erkek Giyim</a>
                                <a href="" class="dropdown-item">Kadın Giyim</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Elektronik</a>
                        <a href="" class="nav-item nav-link">Spor & Outdoor</a>
                        <a href="" class="nav-item nav-link">Müzik Aletleri & Hobi</a>
                        <a href="" class="nav-item nav-link">Yapı Market</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>RANT</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Ana Sayfa</a>
                            <a href="shop.php" class="nav-item nav-link">Ürünler</a>
                            
                            
                            <a href="contact.php" class="nav-item nav-link">İletişim</a>
                        </div>
                        <?php if (isLoggedin()) : ?>
                            <div class="col-lg-3 col-6 text-right">
                            <a href="userprofile.php" class="btn border">
                                <i class="fas fa-user text-primary"></i>
                                
                             </a>
                             <a href="cart.php" class="btn border">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge"></span>
                             </a>
                             <div class="navbar-nav ml-auto py-0">
                                <a href="logout.php" class="nav-item nav-link">Çıkış Yap</a>
                            
                            </div>
                
                            </div>
                        <?php else : ?>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="login.php" class="nav-item nav-link">Giriş Yap</a>
                            <a href="login.php" class="nav-item nav-link">Üye Ol</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img" src="img/carousel-11.jpg" alt="Image">
                            
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">İlk Siparişinizde %10 indirim</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Makul Fiyat</h3>
                                    <a href="shop.php" class="btn btn-light py-2 px-3">Alışveriş Yap</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>