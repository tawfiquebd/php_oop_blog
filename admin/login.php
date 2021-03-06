<?php 
  include_once '../lib/Session.php';
  Session::checkLogin();
?>
<?php include_once '../config/config.php';?>
<?php include_once '../lib/Database.php';?>
<?php include_once '../helpers/Format.php';?>
<?php

  // object/instance crate 
  
  $dbObj = new Database();
  $formatObj = new Format();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blog | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Dashboard Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $formatObj->validation($_POST['username']);
        $password = $formatObj->validation($_POST['password']);
        
        $username = $dbObj->link->real_escape_string($username); 
        $password = $dbObj->link->real_escape_string($password); 

        // check data exist or not
        $query = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password' ";
        $result = $dbObj->select($query);

        // if result is true
        if($result != false){
            $value = $result->fetch_array();
            
            Session::set("login",true);
            Session::set("userId",$value['id']);
            Session::set("username",$value['username']);
            Session::set("fullname",$value['name']);
            Session::set("image",$value['image']);
            Session::set("userRole",$value['role']);
            header("location: index.php");
          
        }
        else{
          echo "<span class='error'> Username or Password is not matched! </span>";
        }

      }


    ?>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="username" required="" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" required="" name="password" class="form-control" placeholder="Password">
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
          <button type="submit" name="" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="forgot-password.php">Forget password? </a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
