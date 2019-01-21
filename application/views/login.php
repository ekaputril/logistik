<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/ico/logopgbesar.png');?>">

    <title>PG. Kebon Agung Malang</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin.css');?>" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
        <?php echo form_open('Login/cekLogin'); ?>
              <?php if(!empty(validation_errors())){ ?>
                <div class="alert alert-warning alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <?php echo validation_errors(); ?>
          </div>
          <?php }?>
          <form role="form" action="" method="post" class="login-form">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus="autofocus">
                <label for="username">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                <label for="password">Password</label>
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div> -->
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
          <?php echo form_close(); ?>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  </body>

</html>
