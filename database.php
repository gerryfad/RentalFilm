<?php 
	session_start();

	if(!isset($_SESSION["login"])){
		header("Location: index.php?target=login");
		exit;
	}else if(($_SESSION["role"])!='admin'){
		header("Location: index.php?target=home");
		exit;
	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

    <title> Database </title>

    <!-- Bootstrap -->
    <link href="dashboard/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="dashboard/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="dashboard/assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="dashboard/assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="dashboard/assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="dashboard/assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <center>
            
            <a href="index.php" ><span><img style="margin-left: 45px;margin-right: auto;margin-top: 16px;" src="dashboard/assets/images/logonav.png" alt=""></span></a>
            </center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="dashboard/assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="database.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-desktop"></i> Manajemen Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="database.php?page=datafilm">Data Film</a></li>
                      <li><a href="database.php?page=datauser">Data Users</a></li>
                      <li><a href="database.php?page=riwayatpinjam">Riwayat Pinjaman</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Form <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="database.php?page=tambahfilm">Tambah Film</a></li>
                      <li><a href="database.php?page=tambahuser">Tambah User</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" >
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="dashboard/assets/images/user.png" alt="">Admin
                  </a>
                  <div style="margin-top:23px;"class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="index.php"> Home</a>
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -  -->
        <div class="right_col" role="main">
      <?php
      if(isset($_GET['page'])){
        if($_GET['page']=='datafilm'){
          require('datafilm.php');}
        if($_GET['page']=='datauser'){
          require('datauser.php');}
        if($_GET['page']=='tambahfilm'){
          require('tambahfilm.php');}
        if($_GET['page']=='tambahuser'){
          require('tambahuser.php');}
        if($_GET['page']=='editfilm'){
          require('editfilm.php');}
        if($_GET['page']=='edituser'){
          require('edituser.php');}
          if($_GET['page']=='editriwayat'){
            require('editriwayat.php');}  
        if($_GET['page']=='riwayatpinjam'){
          require('riwayatpinjaman.php');}    
        }else{
          require('dashboardhome.php');
          }

      
        ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            @ 2020 GFlix
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="dashboard/assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="dashboard/assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="dashboard/assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="dashboard/assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="dashboard/assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="dashboard/assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="dashboard/assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="dashboard/assets/js/custom.min.js"></script>

  </body>
</html>
