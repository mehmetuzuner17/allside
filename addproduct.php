<?php

session_start();
require "ayar.php";
require "functions.php";

$urunAd = $kategoriId = $urunUcret =  $detay =  $fotografId= "";
$urunAd_err = $kategoriId_err = $urunUcret_err =  $detay_err = $fotografId_err="";


if (isset($_POST["urunekle"])) {


  $id= $_SESSION['id'];  

  // validate username
  if (empty(trim($_POST["urunAd"]))) {
    $urunAd_err = "urunAd girmelisiniz.";
  } elseif (strlen(trim($_POST["urunAd"])) < 3 or strlen(trim($_POST["urunAd"])) > 55) {
    $urunAd_err = "Ürün Adı 3-55 karakter arasında olmalıdır.";
  } else {
    $urunAd = $_POST["urunAd"];
  }


  // validate tesisUcret
  if (empty(trim($_POST["urunUcret"]))) {
    $urunUcret_err = "Ücreti girmelisiniz.";
  } elseif (strlen($_POST["urunUcret"]) < 0 || strlen($_POST["urunUcret"]) > 10) {
    $urunUcret_err = "Ücret pozitif olmalıdır";
  } elseif (strlen($_POST["urunUcret"])> 0) {
    $urunUcret = $_POST["urunUcret"]."TL";
  }






  
  if (empty($_POST["kategoriId"])) {
    $kategoriId_err = "Tür seçmelisiniz.";
  } else {
    $kategoriId = $_POST["kategoriId"];
  }




  if (empty(trim($_POST["detay"]))) {
    $detay_err = "detay girmelisiniz.";
  } elseif (strlen(trim($_POST["detay"])) < 10 or strlen(trim($_POST["detay"])) > 100) {
    $detay_err = "Açıklama 3-55 karakter arasında olmalıdır.";
  }  else {
    $detay = $_POST["detay"];
  }


  if (empty($_FILES["fotografId"]["name"])) {
    $fotografId_err = "dosya seçiniz";
} else {
    $result = saveImage($_FILES["fotografId"]);

    if($result["isSuccess"] == 0) {
        $fotografId_err = $result["message"];
    } else {
        $fotografId = $result["image"];
    }
  }
  
  
  $user_id = $_SESSION["id"];
  $_SESSION["user_id"] = $user_id;



  if (empty($urunAd_err) && empty($urunUcret_err) && empty($kategoriId_err) &&  empty($fotografId_err) &&  empty($detay_err)) {

    $sql = "INSERT INTO tesistable (urunAd,urunUcret,kategoriId,detay,fotografId,user_id) VALUES (?,?,?,?,?,?)";

    if ($stmt = mysqli_prepare($connection, $sql)) {

      $param_urunAd = $urunAd;
      $param_urunUcret = $urunUcret;
      $param_kategoriId = $kategoriId;
      $param_detay = $detay;
      $param_fotografId= $fotografId;
      $param_user_id = $user_id;
      

      mysqli_stmt_bind_param($stmt, "sissss", $param_urunAd, $param_urunUcret, $param_kategoriId, $param_detay, $param_fotografId ,$param_user_id );

      if (mysqli_stmt_execute($stmt)) {
        header("location: index.php");
      } else {
        echo mysqli_error($connection);
        echo "hata oluştu";
      }
    }
  }
}

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
                    <a class="text-dark" href="">s.s.s.</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Yardım</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Destek</a>
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
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <?php require "navbar2.php"; ?>


    <!-- Contact Start -->
    <!DOCTYPE html>
    <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ürün Ekleme</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
  <form action="addproduct.php" class="tm-edit-product-form" method="POST" enctype="multipart/form-data" novalidate >
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Ürün Ekleme</h2>
              </div>
            </div>
            
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                  <div class="form-group mb-3">
                    <label1
                      for="name"
                      >Ürün Adı
                    </label>
                    <input
                      id="urunAd"
                      name="urunAd"
                      type="text"
                      class="form-control  <?php echo (!empty($urunAd_err)) ? 'is-invalid' : '' ?>" value="<?php echo $urunAd; ?>"
                      required
                    />
                  </div>
                  <div class="invalid-feedback"><?php echo $urunAd_err; ?></div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Açıklama</label
                    >
                    <textarea
                      id="inputdetails"
                      name="detay"
                      class="inputdetails <?php echo (!empty($detay_err)) ? 'is-invalid':'' ?>" <?php echo $detay;?>   rows="3" cols="50" placeholder="Ürün detaylarını giriniz"
                      rows="3"
                      required
                    ></textarea>
                  </div>
                  <span class="invalid-feedback"><?php echo $detay_err?></span>
                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Kategori</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
                      name="kategoriId"
                    >
                      <option selected>Kategori Seçin</option>
                      <option value="Giyim">Giyim</option>
                      <option value="Elektronik">Elektronik</option>
                      <option value="Spor & Outdoor">Spor & Outdoor</option>
                      <option value="Müzik Aletleri & Hobi">Müzik Aletleri & Hobi</option>
                      <option value="Yapi Market">Yapı Market</option>
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="expire_date"
                            >İlan Tarihi
                          </label>
                          <input
                            id="expire_date"
                            name="expire_date"
                            type="date"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Ücret
                          </label>
                          <input
                            
                            name="urunUcret"
                            type="text"
                            class="form-control <?php echo (!empty($urunUcret_err)) ? 'is-invalid' : '' ?>" value="<?php echo $urunUcret; ?>"
                            required
                          />
                        </div>
                        <div class="invalid-feedback"><?php echo $urunUcret_err; ?></div>
                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                
                <div class="custom-file mt-3 mb-3" name="fotografId">
                
                          
                          
                <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                  <input id="fileInput" name="fotografId" type="file" style="display:none;" />
                  <input
                    type="button"
                    name="fotografId"
                    class="btn btn-primary btn-block mx-auto"
                    value="Ürün Resmi Yükleyin"
                    onclick="document.getElementById('fileInput').click();"
                  />
                  </form>
                </div>
              
              </div>
              
              <div class="col-12">
                <input name='urunID' type='hidden' value='<?= $aydi ?>'/>
                <button type="submit" class="btn btn-primary btn-block text-uppercase" name="urunekle" >Ürünü Yayınlayın</button>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>
    <!-- Contact End -->


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