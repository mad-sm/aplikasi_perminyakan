<?php 
session_start();
include "response.php";
?>
<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Perminyakan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/css/bootstrap.min.css">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/themes/buttons.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $baseUrl;?>/themes/jquery-ui.js"></script>
	  <!-- <script src="themes/js/jquery.js"></script> -->
    <!-- Bootstrap 3.3.5 -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="<?php echo $baseUrl;?>/themes/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseUrl;?>/themes/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo $baseUrl;?>/themes/moment.min.js"></script>
    <script src="<?php echo $baseUrl;?>/themes/daterangepicker.min.js"></script>
    <script src="<?php echo $baseUrl;?>/themes/jquery.dataTables.min.js"></script>
    <script src="<?php echo $baseUrl;?>/themes/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $baseUrl;?>/themes/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/themes/buttons.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/themes/jszip.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/themes/pdfmake.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/themes/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/themes/buttons.html5.min.js" type="text/javascript"></script>

    <style>
        .toolbar {
        float: left;
    }
    .dataTables_wrapper {
    background: white;
    padding: 10px;
}.h-img{height:190px;display:block;
    margin:auto;}
    </style>
  
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo $baseUrl;?>/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AP</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>App Perminyakan</b></span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link" style="pointer-events: none; color: white; font-weight: bold;">
                Perhitungan Keekonomian Migas
              </a>
            </li>
          </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">
              <li><a href="<?php echo $baseUrl;?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
              <li><a href="<?php echo $baseUrl;?>/pages/perhitungan"> <i class="fa fa-book"></i> <span>Perhitungan</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>