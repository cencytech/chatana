<?php include "conn.php" ?>
<?php include "pages/header-links.php" ?>

<?php
	#$con = mysqli_connect("$db_server","$db_username","$db_password","$db_database");
	
	$errors = array();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(preg_match("/\S+/", $_POST['fname']) === 0){
		$errors['fname'] = "* First Name is required.";
	}
	if(preg_match("/\S+/", $_POST['lname']) === 0){
		$errors['lname'] = "* Last Name is required.";
	}
	if(preg_match("/\S+/", $_POST['email']) === 0){
		$errors['email'] = "* BucketMail is required.";
	}
	#if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
	#	$errors['email'] = "* BucketMail is required.";
	#}
	if(preg_match("/.{6,}/", $_POST['password']) === 0){
		$errors['password'] = "* Password Must Contain at least 6 Chanacters.";
	}
	if(strcmp($_POST['password'], $_POST['confirm_password'])){
		$errors['confirm_password'] = "* Password do not much.";
	}
	
	//Additional input
	
	
	if(count($errors) === 0){
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);

		//Additional input
		$access = mysqli_real_escape_string($conn, $_POST['access']);
		
		$password = md5($_POST['password']);
		
		/** Enable Anti-hacking 'Salt' security. **/
			function createSalt(){
				$string = md5(uniqid(rand(), true));
				return substr($string, 0, 3);
			}
			$salt = createSalt();
			#$password = md5($salt . $password);
		
		
		$search_query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
		$num_row = mysqli_num_rows($search_query);
		if($num_row >= 1){
			$errors['email'] = "The BucketMail account is already registered in Chatana!";
		}else{
			$sql = "INSERT INTO user(`fname`, `lname`, `email`, `salt`, `password`, `access`, `photo`) VALUES ('$fname', '$lname', '$email', '$salt', '$password', '$access','$location')";
			$query = mysqli_query($conn, $sql);
			$_POST['username'] = '';
			$_POST['fname'] = '';
			$_POST['lname'] = '';
			$_POST['email'] = '';
			
			//Additional input
			#$_POST['access'] = '2';
			
			$successful = "<h4 class='alert alert-success'>"."You are successfully registered. <a href='login.php'>Login</a></h4>";
		}
	}
	}
?>

<style> 
.custom-text {
	font-weight: 700;
	text-align: center;
	font-size:18px;
}
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
	<div class="text-center title">		
		<h3><img src="dist/img/chatana-text.png" width="30%" alt="Chatana">
		Registration
		</h3>
	</div>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body"> 
	<?php if(isset($successful )){ echo $successful; } ?> 
	<?php if(isset($errors['fname'])){echo "<h5 class='alert alert-danger'>".$errors['fname']."</h5>"; } ?>
	<?php if(isset($errors['lname'])){echo "<h5 class='alert alert-danger'>".$errors['lname']."</h5>"; } ?>
	<?php if(isset($errors['email'])){echo "<h5 class='alert alert-warning'>".$errors['email']."</h5>"; } ?>
	<?php if(isset($errors['password'])){echo "<h5 class='alert alert-danger'>".$errors['password']."</h5>"; } ?>
	<?php if(isset($errors['confirm_password'])){echo "<h5 class='alert alert-warning'>".$errors['confirm_password']."</h5>"; } ?>
	 
	<form method="post">
	
	<div class="col-md-12">
		<div id = "preview" class="">
			<input type="hidden" name="username" id="username" class="form-control" value="edit_user<?php 
			echo (rand(10, 999));
			?>">
						
			<div class="form-group input-group custom-text">
				<span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
				<input type="text" name="fname" id="fname" placeholder="First Name*" class="form-control" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>" required>
			</div>
			<div class="form-group input-group custom-text">
				<span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
				<input type="text" name="lname" id="lname" placeholder="Last Name*" class="form-control" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>" required>
			</div>
			<div class="form-group input-group custom-text">
				<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

				<?php 
					echo '<script src="js/jquery.min.js"></script>';
					echo '<script src="js/selectize.js"></script>';
					echo '<script src="js/index.js"></script>';
					

					$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$result = $connPDO->prepare("SELECT email FROM identities WHERE del = 0 ORDER BY email ASC");
					$result->execute();
					?> 
					<select name="email" id="email" class="form-control #demo-default" placeholder="Browse your account..." required>
						<option></option>
						<?php for($i=0; $row = $result->fetch(); $i++){ ?>
							<option value="<?php if(isset($row['email'])){echo $row['email'];} ?>"><?php echo $row['email']?></option>
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

			</div>
			
			<div class="form-group input-group custom-text">
				<span class="input-group-addon"><i class="fa fa-key"></i></span>
				<input type="password" name="password" id="pw" placeholder="Password*" class="form-control" required>
			</div>
			<div class="form-group input-group custom-text">
				<span class="input-group-addon"><i class="fa fa-low-vision"></i></span>
				<input type="password" name="confirm_password" id="cpw" placeholder="Re-type Password" class="form-control" required>
			</div>

			<input type="hidden" name="access" id="access" value="2">
			<div class="modal-footer">
				<a href="login.php" class="btn btn-default">Cancel</a>
				<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Register Now">
			</div>
		</form>
	
  </div>
  <!-- /.login-box-body -->



</div>
<!-- /.login-box -->

<?php #include "pages/foobar.php" ?>