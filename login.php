<?php

ob_start();
session_start();

require "functions.php";
require "ayar.php";
$email = $password = "";
$email_err = $password_err = $login_err = "";


if (isset($_POST["login"])) {

  if (empty(trim($_POST["email"]))) {
    $email_err = "Email girmelisiniz";
  } else {
    $email = trim($_POST["email"]);
  }

  if (empty(trim($_POST["password"]))) {
    $password_err = "Şifre girmelisiniz";
  } else {
    $password = trim($_POST["password"]);
  }

  if (empty($email_err) && empty($password_err)) {
    $sql = "SELECT id, email, password FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($connection, $sql)) {
      $param_email =  $email;
      mysqli_stmt_bind_param($stmt, "s", $param_email);

      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {

          mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);

          if (mysqli_stmt_fetch($stmt)) {

            if (password_verify($password, $hashed_password)) {
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["email"] = $email;
              header("location: index.php");
            } else {
              $login_err = "Yanlış email ya da parola girdiniz";
            }
          }
        } else {
          $login_err = "Yanlış email ya da parola girdiniz";
        }
      } else {
        $login_err = "bilinmeyen bir hata oluştu.";
      }
      mysqli_stmt_close($stmt);
    }
  }

  mysqli_close($connection);
}

ob_end_flush();




$firstName =  $email = $number = $password = $confirm_password = $date = $adres =  $kategoriId = "";
$firstName_err =  $email_err = $number_err = $password_err = $confirm_password_err = $date_err = $adres_err = $kategoriId_err =  "";








if (isset($_POST["register"])) {

  // validate firstName
  if (empty(trim($_POST["firstName"]))) {
    $firstName_err = "Adınızı girmelisiniz.";
  } elseif (strlen(trim($_POST["firstName"])) < 3 or strlen(trim($_POST["firstName"])) > 25) {
    $firstName_err = "Adınız 3-25 karakter arasında olmalıdır.";
  } elseif (!preg_match('/^[a-z\d_x{ÖÇŞİĞÜöçşğüı}]{3,25}$/i', $_POST["firstName"])) {
    $firstName_err = "Adınız sadece rakam, harf ve alt çizgi karakterinden oluşmalıdır.";
  } else {
    $firstName = $_POST["firstName"];
  }


  // validate number
  if (empty(trim($_POST["number"]))) {
    $number_err = "Numaranızı girmelisiniz.";
  } elseif (strlen($_POST["number"]) != 10) {
    $number_err = "Numara 10 karakter olmalıdır.";
  }
  else {
    $number = $_POST["number"];
  }

  // validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Email girmelisiniz.";
  } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $email_err = "Hatalı email girdiniz.";
  } else {

    $sql = "SELECT id FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($connection, $sql)) {
      $param_email = trim($_POST["email"]);
      mysqli_stmt_bind_param($stmt, "s", $param_email);

      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $email_err = "Email daha önceden alınmış.";
        } else {
          $email = $_POST["email"];
        }
      } else {
        echo mysqli_error($connection);
        echo "Hata oluştu";
      }
    }
  }

  // validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Şifre girmelisiniz.";
  } elseif (strlen($_POST["password"]) < 6) {
    $password_err = "Şifre min. 6 karakter olmalıdır.";
  } else {
    $password = $_POST["password"];
  }

  // validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Tekrar şifreyi girmelisiniz.";
  } else {
    $confirm_password = $_POST["confirm_password"];
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Parolalar eşleşmiyor.";
    }
  }

  if (empty(trim($_POST["adres"]))) {
    $adres_err = "adres  girmelisiniz.";
  
  } else {
    $adres = $_POST["adres"];
  }

  // validate date
  if (empty(trim($_POST["dateofbirth"]))) {
    $date_err = "Tarih seçmelisiniz.";
  } else {
    $date = date('Y-m-d', strtotime($_POST["dateofbirth"]));
  }

  if (empty($_POST["kategoriId"])) {
    $kategriId_err = "İlgi alanı seçmelisiniz";
  } else {
    $kategoriId = $_POST["kategoriId"];
  }
  
 





  //hata oluşmadıysa ekleme sorgusuna al
  if (empty($firstName_err)  &&  empty($email_err) && empty($number_err) && empty($password_err) && empty($date_err) && empty($adres_err) && empty($kategoriId_err)  ) {

    $sql = "INSERT INTO users (firstName,email,number,password,date,adres,kategoriId) VALUES (?,?,?,?,?,?,?)";

    if ($stmt = mysqli_prepare($connection, $sql)) {

      $param_firstName = $firstName;
      $param_email = $email;
      $param_number = $number;
      $param_adres = $adres;
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      $param_date = $date;
      $param_kategoriId = $kategoriId;


      mysqli_stmt_bind_param($stmt, "ssissss", $param_firstName, $param_email, $param_number, $param_password, $param_date, $param_adres, $param_kategoriId);

      if (mysqli_stmt_execute($stmt)) {
        header("location:login.php");
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
    <link href="css/login.css" rel="stylesheet">
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
    <style>
#kategori {
  display: flex; 
  align-items: center;
}
</style>
</head>

<body>
<div class="container">


<div class="errorMessage">
  <?php
  if (!empty($login_err)) {
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
  }
  ?>
</div>

        <!-- Topbar Start -->
        <div class="container-fluid">
            <div class="row bg-secondary py-2 px-xl-5">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark" href="">S.S.S.</a>
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
            
                
            </div>
        </div>

            <!-- Topbar end -->




            

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="POST"  novalidate>
                <h1>Hesap Oluştur</h1>
            
          
                <input type="text" name="firstName" id="firstName" placeholder="Kullanıcı Adı" class="form-control <?php echo (!empty($firstName_err)) ? 'is-invalid' : '' ?>" value="<?php echo $firstName; ?>" />
                <div class="invalid-feedback"><?php echo $firstName_err; ?></div>
                <input type="email" name="email" id="email" placeholder="E-posta" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : '' ?>" value="<?php echo $email; ?>" />
                <div class="invalid-feedback"><?php echo $email_err; ?></div>
                <input type="text" name="number" id="number" placeholder="Cep Telefonu"  class="form-control <?php echo (!empty($number_err)) ? 'is-invalid' : '' ?>" value="<?php echo $number; ?>" />
                <div class="invalid-feedback"><?php echo $number_err; ?></div>
                <input type="text" name="adres" id="adres" placeholder="Adres" class="form-control <?php echo (!empty($adres_err)) ? 'is-invalid' : '' ?>" value="<?php echo $adres; ?>"/>
                <input type="date" name="dateofbirth" id="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : '' ?>" value="<?php echo $date; ?> " required>
                <div class="invalid-feedback"><?php echo $date_err; ?></div>
                <input type="password" name="password" id="password" placeholder="Şifre" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : '' ?>" value="<?php echo $password; ?>" />
                <div class="invalid-feedback"><?php echo $password_err; ?></div>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Şifre tekrar" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : '' ?>" value="<?php echo $confirm_password; ?>" />
                <div class="invalid-feedback"><?php echo $confirm_password_err; ?></div>
                <div class="input-box" name="kategori" id="kategori">
                  <span class="details">ilgi alanı seçiniz</span>
                  <input type="checkbox" class="kategori" id="Elektronik" <?php if (isset($kategoriId) && $kategoriId == "kategoriId") echo "checked"; ?> name="kategoriId" value="Elektronik">
                  <label for="Elektronik"> Elektronik</label>
                  <input type="checkbox" class="kategori" id="Giyim" <?php if (isset($kategoriId) && $kategoriId == "kategoriId") echo "checked"; ?> name="kategoriId" value="Giyim"> 
                  <label for="Giyim"> Giyim</label>
                  <input type="checkbox"class="kategori" id="spor&Outdoor" <?php if (isset($kategoriId) && $kategoriId == "kategoriId") echo "checked"; ?> name="kategoriId" value="Spor&Outdoor"> 
                  <label for="spor&Outdoor"> Spor&Outdoor</label>
                  <input type="checkbox" class="kategori"id="Müzik Aletleri & Hobi" <?php if (isset($kategoriId) && $kategoriId == "kategoriId") echo "checked"; ?> name="kategoriId" value="Müzik Aletleri & Hobi"> 
                  <label for="Müzik Aletleri & Hobi"> Müzik Aletleri & Hobi</label><br>
                  <input type="checkbox"class="kategori" id="Yapı Market" <?php if (isset($kategoriId) && $kategoriId == "kategoriId") echo "checked"; ?> name="kategoriId" value="Yapı Market"> 
                  <label for="Yapı Market"> Yapı Market</label>
                </div>
                <?php echo (!isset($kategoriId_err)) ? 'is-invalid' : '' ?><php?>
                <div class="invalid-feedback" id="kategoriId-feedback"><?php echo $kategoriId_err; ?></div>
                <input type="submit" id="register" name="register" value="Kayıt Ol" class="btn-primary">
                
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="POST" novalidate>
                <h1>Giriş Yap</h1>
               
                <span>e-mail ve şifrenizi giriniz </span>
                <input type="email" name="email" id="email" placeholder="E-posta"  class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : '' ?>" value="<?php echo $email; ?> "/>
                <div class="invalid-feedback"><?php echo $email_err; ?></div>
                <input type="password" name="password" id="password" placeholder="Şifre" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : '' ?>" value="<?php echo $password; ?>" />
                <div class="invalid-feedback"><?php echo $password_err; ?></div>
                <a href="forgotpassword.php">Şifrenizi mi unuttunuz ?</a>
                <input type="submit" name="login" value="Giriş Yap" class="btn btn-primary">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Hemen üye ol! </h1>
                    <p>giriş yapmak için tıklayın </p>
                    <button class="ghost" id="signIn">Giriş Yap</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Merhaba, Rant'lı!</h1>
                    <p>Üye olmak için tıkalyın </p>
                    <button class="ghost" id="signUp">Üye Ol</button>
                </div>
            </div>
        </div>
    </div>
    
  
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
    <script  src="js/login.js"></script>  
</body>
</html>
