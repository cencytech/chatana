<?php include "conn.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Chatana v2.5</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/darkblue.css">
 
	<script src="js/jquery.min.js"></script>
	<script src="js/selectize.js"></script>
	<script src="js/index.js"></script>
 
	
</head>

<body>
<div class="login-wrap">
  
	<div class="login-html" align="center">
		<img src="dist/img/chatana.png" width="45%" style="margin-top:-50px" alt="Chatana"><br>

<?php 
	$errors = array();
	
	#if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['submit'])){

	if(preg_match("/\S+/", $_POST['email']) === 0){
		$errors['email'] = "* Email is required.";
	}
	if(preg_match("/.{6,}/", $_POST['password']) === 0){
		$errors['password'] = "* Password Must Contain at least 6 chars.";
	}
	if(strcmp($_POST['password'], $_POST['confirm_password'])){
		$errors['confirm_password'] = "* Password do not much.";
	}
	
	//Additional input
	
	
	if(count($errors) === 0){
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = md5($_POST['password']);
		
		$search_query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
		$num_row = mysqli_num_rows($search_query);
			if($num_row >= 1){
				$errors['email'] = "The eConnect account is exist!";
			}else{
				$sql = "INSERT INTO user(`username`, `email`, `password`, `access`) 
				VALUES ('$username', '$email', '$password', '2')";
				$query = mysqli_query($conn, $sql);
				$_POST['username'] = '';
				$_POST['email'] = '';
				$_POST['password'] = '';
			}
		}
	}
	?>

	<?php if(isset($successful )){ echo "<h4 style='color:#fff'>".$successful."</h4>"; } ?>
	<?php if(isset($errors['email'])){echo "<h4 style='color:#fff'>".$errors['email']."</h4>"; } ?>
	<?php if(isset($errors['password'])){echo "<h4 style='color:#fff'>".$errors['password']."</h4>"; } ?>
	<?php if(isset($errors['confirm_password'])){echo "<h4 style='color:#fff'>".$errors['confirm_password']."</h4>"; } ?>

		<input id="tab-1" type="radio" name="tab" class="sign-in">
			<label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up" checked>
			<label for="tab-2" class="tab">Sign Up</label>

	<div class="login-form">
		<div class="sign-in-htm">
		<?php error_reporting(~E_WARNING);
		session_start();
		if(isset($_SESSION['msg'])){
			echo "<h4 class='alert alert-danger'>".$_SESSION['msg']."</h4>";
			unset($_SESSION['msg']);
		}
		?>
		<form action="fetch_login.php" method="post">
			<div class="form-group has-feedback">
			<!--input type="text" name="username" class="text-center form-control" placeholder="Username" autofocus required-->
				<div class="group">
					<label for="email" class="label">eConnect Account</label>
					<?php $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$result = $connPDO->prepare("SELECT * FROM user WHERE isActivated = 1");
						$result->execute();
						?>
						<select name="username" id="email" class="form-control #input demo-default" placeholder="eConnect Account" required><option></option>
							<?php for($i=0; $row = $result->fetch(); $i++){ ?>
								<option value="<?php if(isset($row['username'])){echo $row['username'];} ?>"><?php echo $row['email']?></option>
							<?php } ?>
						</select>
				</div>
				<div class="group">
					<label for="password" class="label">Password</label>
					<input type="password" name="password" class="input form-control" placeholder="Password" required>
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
			</div>
		</form>
	</div>
	<div class="sign-up-htm">
		<form method="POST">	
			<div class="group">
				<input type="hidden" name="username" id="username" class="input form-control" value="<?=strrev("anatahc")?>_<?php echo (rand(10, 999));?>">
			</div>
			<div class="group">
				<label for="email" style="color:#fff">eConnect Account</label>
			<?php  
				$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$result = $connPDO->prepare("SELECT email FROM identities WHERE del = 0 ORDER BY email ASC");
				$result->execute();
				?>
				<select name="email" id="emailreg" class="form-control #demo-default" placeholder="Browse your account..." required>
					<option></option>
					<?php for($i=0; $row = $result->fetch(); $i++){ ?>
						<option value="<?php if(isset($row['email'])){echo $row['email'];} ?>"><?php echo $row['email']?></option>
					<?php } ?>
				</select>
			</div>
			<div class="group">
				<label for="pass" style="color:#fff">Create Password</label>
				<input type="password" name="password" id="pw" placeholder="Password*" class="input form-control" required>
			</div>
			<div class="group">
				<label for="pass" style="color:#fff">Repeat Password</label>
				<input type="password" name="confirm_password" id="cpw" placeholder="Confirm Password" class="input form-control" required>
			</div>
			<div class="group">
				<input type="submit" class="button" name="submit" value="Sign Up">
			</div>
		</form>
	</div>
	
	<?php error_reporting(0);
		session_start();
		if(isset($_SESSION['msg'])){
			echo "<h4 style='color:#fff'>".$_SESSION['msg']."</h4>";
			unset($_SESSION['msg']);
			}
		?>
		
<script> 
	/*  Auto complete dropdown search or filtering
		@login form
	*/
	$('#email').selectize({
	create: false,
	sortField: {
		field: 'text',
		direction: 'asc'
	}, dropdownParent: 'body'});
	
	/*  Auto complete dropdown search or filtering
		@register form
	*/
	$('#emailreg').selectize({
	create: false,
	sortField: {
		field: 'text',
		direction: 'asc'
	}, dropdownParent: 'body'});
</script>
  
</body>
</html>