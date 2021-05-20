<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>GFlix – Rental Film No.1 Di Indonesia</title>

</head>
<html>
   <body>
	  <?php 
	  require("navbar.php");
	  
      if(isset($_GET['target'])){
		if($_GET['target']=='home'){
			require('home.php');}
		if($_GET['target']=='fitur'){
			require('fitur.php');}
		if($_GET['target']=='login'){
			require('signin.php');}
		if($_GET['target']=='film'){
			require('daftarfilm.php');}
		if($_GET['target']=='faq'){
			require('faq.php');}
		if($_GET['target']=='tentang'){
			require('tentang.php');}
		if($_GET['target']=='daftar'){
			require('daftar.php');}
			
		}elseif(isset($_GET['judul'])){
			if($_GET['judul']){
				require('detail.php');}		
		}else{
		  require('home.php');
		  }
	   require("footer.php"); 
	   require("js.php"); 
	  ?>
	  
   </body>
</html>