<?php
session_start();
require "ayar.php";
require "functions.php";
require "getdatas.php";



$name_err = $mail_err = $tel_err = $age_err = $identity_err = $adres_err = "";





if (isLoggedin()) {

  if (isset($_POST["save"])) {

    $name = $_SESSION['firstName'];
    $mail = $_SESSION['email'];
    $tel = $_SESSION['number'];
    $age = $_SESSION['date'];
    $adress = $_SESSION['adres'];
    $identity = $_SESSION['tc'];


    if (empty(trim($_POST["firstName"]))) {
      $name_err = "Adınızı girmelisiniz.";
    } elseif (strlen(trim($_POST["firstName"])) < 3 or strlen(trim($_POST["firstName"])) > 25) {
      $name_err = "Adınız 3-25 karakter arasında olmalıdır.";
    } elseif (!preg_match('/^[a-z\d_x{ÖÇŞİĞÜöçşğüı}]{3,25}$/i', $_POST["firstName"])) {
      $name_err = "Adınız sadece rakam, harf ve alt çizgi karakterinden oluşmalıdır.";
    } else {
      $name = $_POST["firstName"];
    }
  
    if (empty(trim($_POST["adres"]))) {
      $surname_err = "adres girmelisiniz.";
    } 
     else {
      $adres = $_POST["adres"];
    }

    //email
    if (trim($_POST['email']) != $_SESSION["email"]) {
      $mail_err = "Email değiştiremezsiniz.";
    }

    if (empty(trim($_POST["number"]))) {
      $tel_err = "Numaranızı girmelisiniz.";
    } elseif (strlen($_POST["number"]) != 10 ) {
      $tel_err = "Numara 12 karakter olmalıdır.";
    } else{
      $tel = $_POST["number"];
    }

    if (empty(trim($_POST['date']))) {
      $age_err =  "Tarih girmelisiniz";
    } else {
      $age = trim($_POST["date"]);
    }


    if (!empty(trim($_POST["tc"]))) {
      if (strlen($_POST["tc"]) !=11 ) {
        $identity_err = "TC Kimlik Numarası 11 haneli olmalıdır.";
      }
       else {
        $identity = $_POST["tc"];
      }
    }
    


    $identity = trim($_POST['tc']);

    if(empty($name_err) && empty($surname_err) && empty($mail_err) && empty($age_err) && empty($identity_err)){
      $sorgu = "UPDATE users SET firstName='$name',email='$mail',number=$tel,date='$age',tc='$identity' where id=$_SESSION[id] ";
      $sonuc = mysqli_query($connection, $sorgu);
  
      if ($sonuc) {
  
        echo "<p style='color:white;margin-bottom:-24px;background-color:#DD4453;'>" . "Güncellendi" . "</p><br>";
      } else {
        echo "<p style='color:white;background-color:#DD4453;'>" . "Güncelleme başarısız" . "</p><br>";
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
    <link href="css/userprofile.css" rel="stylesheet">
    

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
                    <span class="badge"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <!-- sidebar start -->
    <nav class="main-menu">


  
    <div>
       <a class="logo" href="">
       </a> 
     </div> 
   <div class="settings"></div>
   <div class="scrollbar" id="style-1">
         
   <ul>
     
   <li>                                   
   <a href="index.php">
   <i class="fa fa-home fa-lg"></i>
   <span class="nav-text">Ana Sayfa</span>
   </a>
   </li>   
      
   
   
       
   <li>                                 
   <a href="contact.php">
   <i class="fa fa-envelope-o fa-lg"></i>
   <span class="nav-text">İletişim</span>
   </a>
   </li>   
  
   <li class="darkerlishadow">
   <a href="addproduct.php">
   <i class="fa fa-clock-o fa-lg"></i>
   <span class="nav-text">Ürün Ekle</span>
   </a>
   </li>
   
  

   <li class="darkerlishadow">
   <a href="ürünlerim.php?id=<?= $_SESSION["id"] ?>">
   <i class="fa fa-clock-o fa-lg"></i>
   <span class="nav-text">ürünlerim</span>
   </a>
   </li>



   <li class="darkerlishadow">
   <a href="ilgialani.php">
   <i class="fa fa-clock-o fa-lg"></i>
   <span class="nav-text">İlgi alanı</span>
   </a>
   </li>
          
   </ul>
   
     
   <li>

</nav>
           
     
   
               
     
     


    <!-- sidebar End -->
    <form action="userprofile.php" method="POST" novalidate>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $_SESSION["firstName"] ?></span><span class="text-black-50"><?php echo $_SESSION["email"] ?></span><span> </span></div>
            </div>
           
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profili Düzenle</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">İsim</label><input type="text" name="firstName" placeholder="isim" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : '' ?>" value="<?php echo $_SESSION["firstName"] ?>" />
                        <div class="invalid-feedback"><?php echo $name_err; ?></div>
                
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Telefon Numarası</label>
                        <input type="text" name="number" placeholder="telefon numarası giriniz" class="form-control <?php echo (!empty($tel_err)) ? 'is-invalid' : '' ?>" value="<?php echo $_SESSION["number"] ?>" /> </div>
                        <div class="invalid-feedback"><?php echo $tel_err; ?></div>
                        <div class="col-md-12"><label class="labels">Adres 1</label>
                        <input type="text" class="form-control" name="adres" placeholder="adresinizi giriniz" class="form-control <?php echo (!empty($adres_err)) ? 'is-invalid' : '' ?>" value="<?php echo $_SESSION["adres"] ?>" /> </div>
                        <div class="col-md-12"><label class="labels">TC</label>
                        <input type="text" name="tc" placeholder="TC" class="form-control <?php echo (!empty($identity_err)) ? 'is-invalid' : '' ?>" value="<?php echo $_SESSION["tc"] ?>" ></div>
                        <div class="invalid-feedback"><?php echo $identity_err; ?></div>
                     

                        <div class="col-md-12"><label class="labels">Email Adres</label>
                        <input type="text"  name="email" placeholder="e-posta adresinizi giriniz" class="form-control <?php echo (!empty($mail_err)) ? 'is-invalid' : '' ?>" value="<?php echo $_SESSION["email"] ?>"></div>
                        <div class="invalid-feedback"><?php echo $mail_err; ?></div>
                        <div class="col-md-12"><label class="labels">Doğum Tarihi</label>
                        <input type="date"  name="date" placeholder="doğum tarihinizi giriniz" class="form-control<?php echo (!empty($age_err)) ? 'is-invalid' : '' ?>" value="<?php echo $_SESSION["date"] ?>"></div>
                        <div class="invalid-feedback"><?php echo $age_err; ?></div>
                    </div>
                    
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="save" type="submit">Kaydet</button></div>
                </div>
                
            </div>
            </form>
            
        </div>
    </div>
    </div>
    </div>
    


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