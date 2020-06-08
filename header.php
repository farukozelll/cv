<?php

include 'nedmin/netting/baglan.php';
include 'nedmin/production/ponki.php';


$ayarsor=$db->prepare("select * from ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
 <!-- =======================================================
  Ninestars -Orange Tema header kullanıldı 
  ======================================================== -->
	<meta content="" name="descriptison">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="vendor/assets/img/favicon.png" rel="icon">
	<link href="vendor/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="vendor/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="vendor/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="vendor/assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="vendor/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="vendor/assets/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="vendor/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  Digilab -Green Tema Asıl tema
  ======================================================== -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="vendor/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="vendor/css/animate.css">

  <link rel="stylesheet" href="vendor/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendor/css/magnific-popup.css">

  <link rel="stylesheet" href="vendor/css/aos.css">

  <link rel="stylesheet" href="vendor/css/ionicons.min.css">

  <link rel="stylesheet" href="vendor/css/flaticon.css">
  <link rel="stylesheet" href="vendor/css/icomoon.css">
 <link rel="stylesheet" href="vendor/css/style.css">
 <!-- =======================================================
  İntro Style dosyası
  ======================================================== -->
  
  <link href="vendor/intro/assets/css/style.css" rel="stylesheet">
<!--Yazı Fontu Courier -->
 
  <link href='https://fonts.googleapis.com/css?family=Courier Prime' rel='stylesheet'>

</head>



<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
	<div class="container-fluid d-flex">

		<div class="logo mr-auto">
			<a class="navbar-brand" href="index.php"><img src="images/Gr.png" style="width: 57px;  " class="img-fluid animated" alt="">
			Faruk Özel</a>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html"><img src="vendor/assets/img/logo.png" alt="" class="img-fluid"></a>-->
		</div>

		<nav class="nav-menu d-none d-lg-block">
			<ul>
				<li class="active"><a href="index.php">Anasayfa</a></li>
				<li><a href="hakkimda.php">Künye</a></li>
				<li><a href="blog.php">Blog</a></li>

				<li><a href="projeler.php">Projeler</a></li>
				<li><a href="galeri.php">Galeri</a></li>



				<li><a href="iletisim.php">İletisim</a></li>

				<li class="get-started"><a href="nedmin/production/login.php">Login</a></li>
			</ul>
		</nav><!-- .nav-menu -->

	</div>
  </header><!-- End Header -->