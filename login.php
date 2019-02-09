<?php include "conn.php" ?>
<?php include "pages/header-links.php" ?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
	<div class="text-center title">
		<a href="login.php">
		<img src="dist/img/chatana.png" width="45%" alt="User Image">
		<h3>Welcome to
			<img src="dist/img/chatana-text.png" width="40%" alt="User Image">
		</h3>
		</a>
	</div>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="fetch_login.php" method="post">
      <div class="form-group has-feedback">
        <!--input type="text" name="username" class="text-center form-control" placeholder="Username" autofocus required-->

			<?php 
				echo '<script src="js/jquery.min.js"></script>';
				echo '<script src="js/selectize.js"></script>';
				echo '<script src="js/index.js"></script>';

				$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$result = $connPDO->prepare("SELECT * FROM user WHERE isActivated = 1");
				$result->execute();
				?> 
				<select name="username" id="email" class="form-control #demo-default" placeholder="Search to select BucketMail Acc.." required>
					<option></option>
					<?php for($i=0; $row = $result->fetch(); $i++){ ?>
						<option value="<?php if(isset($row['username'])){echo $row['username'];} ?>"><?php echo $row['email']?></option>
					<?php } ?>
				</select>
		<script> $('#email').selectize({
				create: false,
				sortField: {
					field: 'text',
					direction: 'asc'
				},
				dropdownParent: 'body'
			});
		</script>

        <!--span class="glyphicon glyphicon-envelope form-control-feedback"></span-->
		</div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="text-center form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="index.html" type="submit" class="btn btn-inverse"><i class="fa fa-reply"></i></a>
          <a href="register.php"class="btn btn-inverse">Create Account</a>
		  <!--a href="#add_user" data-toggle="modal" class="btn btn-warning">Create Account</a-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 
		<center>
			<?php error_reporting(~E_WARNING);
				session_start();
				if(isset($_SESSION['msg'])){
					echo "<h4 class='alert alert-danger'>".$_SESSION['msg']."</h4>";
					unset($_SESSION['msg']);
				}
			?>
		</center>
  </div>
  <!-- /.login-box-body -->
  
<?php #include('register_modal.php'); ?>
</div>
<!-- /.login-box -->

<?php include "pages/foobar.php" ?>