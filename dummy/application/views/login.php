<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LoveGift | Admin Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin_assets/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin_assets/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin_assets/dist/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin_assets/plugins/iCheck/square/blue.css');?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
  html {
          overflow: auto;
  }
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Love</b>Gift
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <span id="showMsg"></span>
    <form method="post" id="formLogin">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="username" placeholder="Email" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="userpass" placeholder="Password" name="userpass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat" id="btnCheckLogin">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->
    <a href="#">I forgot my password</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/admin_assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/admin_assets/plugins/iCheck/icheck.min.js');?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script>
    $(document).ready(function(){
        $("#btnCheckLogin").click(function(){
        var base_url = "http://localhost/lovegifts/";
            $.ajax({
                method:"POST",
                url:base_url+"welcome/login",
                data:$('#formLogin').serialize(),
                success:function(data){
                    if(data=='done'){
                      // SUPER ADMIN AREA //
                      window.location.href=base_url+"admin/dashboard";
                    }else{
                      $("#showMsg").html(data);
                      $("#showMsg").delay(2000).hide(0);
                    }
                }
            });
        });
    });
    </script>
</body>
</html>
