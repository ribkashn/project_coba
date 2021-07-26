<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pro-Go | <?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/dist/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/dist') ?>/css/fontSourceSansPro.css">
  <!-- app.css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css') ?>/progo.css"> 
</head>
<body class="hold-transition login-page" style="background-image: url('<?php echo base_url('assets') ?>/img/ProGo Login Bg 1366x768.jpg');background-repeat: no-repeat;
    background-size: 100% auto;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card" style="box-shadow: 0 14px 28px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.22)!important;">
    <div class="login-logo">
      <p class="login-box-msg"><h4>Welcome Back</h4></p>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Forgot Password</p>

      <form action="<?php echo base_url('login/') ?>forgot1" method="post">
        <div class="form-group">
          <label style="font-weight: 400">NPP</label>
          <input type="text" class="form-control" id="NPP"  name="NPP" required value="<?php echo $npp; ?>">
        </div>
        <div class="row mb-3">
          <button type="submit" class="btn btn-block btn-progo-orange">Send</button>
        </div>

      </form>


      <p class="mb-3"  style="text-align: right;">
        <a href="<?php echo base_url('login/') ?>login">Login</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE') ?>/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

<?php
  if ($alert) {  
?>
  <script>
    var message1="<?php echo $message1; ?>";
    var message2="<?php echo $message2; ?>";
    var typealert="<?php echo $typealert; ?>";
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 4000
    });
    Toast.fire({
        icon: typealert,
        title: '&nbsp;'+message1
      });
  </script>
  <?php
  }
?>
</body>
</html>
