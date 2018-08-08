<!DOCTYPE html>
<html>
  <head>
    <?php echo $this->element('head'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  </head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>User</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="User[username]" placeholder="Full name">
        <?php 
          if (!empty($errors['User']['username'])){
            echo '<span>';
                echo ($errors['User']['username'][0]);
            echo '</span>';
          } 
        ?>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="User[email]" placeholder="Email">
        <?php 
          if (!empty($errors['User']['email'])){
            echo '<span>';
                echo ($errors['User']['email'][0]);
            echo '</span>';
          } 
        ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="User[password]" placeholder="Password">
       <?php 
          if (!empty($errors['User']['password'])){
            echo '<span>';
                echo ($errors['User']['password'][0]);
            echo '</span>';
          } 
        ?> 
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="User[confirm_password]" placeholder="Retype password">
        <?php 
          if (!empty($errors['User']['confirm_password'])){
            echo '<span>';
                echo ($errors['User']['confirm_password'][0]);
            echo '</span>';
          } 
        ?> 
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="/admin/login/" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<?php echo $this->Html->script('jquery.min'); ?>
<!-- Bootstrap 3.3.7 -->
<?php echo $this->Html->script('/templade_admin/bower_components/bootstrap/dist/js/bootstrap.min'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('/templade_admin/plugins/iCheck/icheck.min'); ?>
<!-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script> -->
</body>
</html>
