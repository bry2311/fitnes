<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Iron GYM</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition bg-success">
  <div class="login-box">
    <center>
      <h2>Management Fitness</h2>
      <h3></h3>
      <br/>
      <?php 
      if(isset($_GET['alert'])){
        if($_GET['alert'] == "gagal"){
          echo "<div class='alert alert-danger'>Username dan password salah!</div>";
        }else if($_GET['alert'] == "logout"){
          echo "<div class='alert alert-success'>Anda telah logout</div>";
        }else if($_GET['alert'] == "belum_login"){
          echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman admin</div>";
        }else if($_GET['alert'] == "nonaktif"){
          echo "<div class='alert alert-warning'>Akun Sudah Tidak Aktif</div>";
        }
      }
      ?>
    </center>
    <div class="login-box-body">
      <p class="login-box-msg">HALAMAN LOGIN ADMIN</p>

      <form action="login_act.php" method="POST">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
      
        <div class="row">
          <div class="col-xs-8">
            <a href="index.php">Kembali</a>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      <?php 
      ?>
    </div>    
  </div>
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>