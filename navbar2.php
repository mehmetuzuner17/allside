<div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Kategoriler</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
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
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Ana Sayfa</a>
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
            </div>
        </div>
    </div>