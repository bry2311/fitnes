<!doctype html>
<html lang="en">
  <head>
    <title>Iron GYM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <?php 
  include '../koneksi.php';
  session_start();
  if($_SESSION['login'] != "admin"){
    header("location:../login.php?alert=belum_login");
  }
  ?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper"> 

  <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b>Fitness</b> </span>
       
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">               
                <?php 
                $x = $_SESSION['id'];
                $ad = mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$x'");
                $aa = mysqli_fetch_assoc($ad);
                ?>
                <?php if($aa['foto_admin']!="" && file_exists("../images/main_gambar/".$aa['foto_admin'])){ ?>
                  <img src="../images/main_gambar/<?php echo $aa['foto_admin']; ?>" class="user-image">
                <?php }else{ ?>
                  <img src="../assets/dist/img/avatar5.png" class="user-image">
                <?php } ?>
                <span class="hidden-xs">NAMA : <?php echo $aa['nama_admin']; ?> </span> 
              </a>
            </li>

            <li class="dropdown user user-menu active">
              <a target="_BLANK" href="#">Admin</a>
            </li>
            <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> KELUAR</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            </a>
          </li>
          <li>
            <a href="order_data.php">
             <i class="fa fa-id-card" aria-hidden="true"></i> <span>Order</span>
            </a>
          </li>
          <li>
            <a href="transaksi_data.php">
             <i class="fa fa-id-card" aria-hidden="true"></i> <span>Transaksi</span>
            </a>
          </li> 
          <li>
            <a href="member_data.php">
             <i class="fa fa-users" aria-hidden="true"></i> <span>Member</span>
            </a>
          </li> 
          <li>
            <a href="instruktur_data.php">
             <i class="fa fa-users" aria-hidden="true"></i> <span>Instruktur</span>
            </a>
          </li>
          <li>
            <a href="jadwal_data.php">
             <i class="fa fa-book" aria-hidden="true"></i> <span>Jadwal Instruktur</span>
            </a>
          </li> 
          <li>
            <a href="product_data.php">
             <i class="fa fa-archive" aria-hidden="true"></i> <span>Produk & Paket Harga</span>
            </a>
          </li> 
          <li class="treeview">
            <a href="#">
             <i class="fa fa-wrench" aria-hidden="true"></i>
              <span>Pengaturan </span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">              
              <li><a href="profile.php"><i class="fa fa-circle-o"></i> Profile</a></li>  
              <li><a href="ganti_pass.php"><i class="fa fa-circle-o"></i> Ganti Password</a></li>
            </ul>
          </li>
          <li>
            <a href="logout.php">
              <i class="fa fa-sign-out"></i> <span>KELUAR</span>
            </a>
          </li>
        </ul>
      </section>
    </aside>