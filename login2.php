<?php include "conn.php";
#include "pages/header-links.php"
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

  
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

<link rel="stylesheet" href="css/darkblue.css">

<?php 
	// Auto complete dropdown search for filtering @References.
	echo '<script src="js/jquery.min.js"></script>';
	echo '<script src="js/selectize.js"></script>';
	echo '<script src="js/index.js"></script>';
	?>
	
</head>

<body>
<div class="login-wrap">
  
	<div class="login-html" align="center">

	<img src="dist/img/chatana.png" width="45%" style="margin-top:-50px" alt="Chatana"><br>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
			<label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up">
			<label for="tab-2" class="tab">Sign Up</label>

		<!-- LOGIN FORM -->
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="fetch_login.php" method="post">
					<div class="group">
						<label for="email" class="label">eConnect Account</label>
						<?php $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$result = $connPDO->prepare("SELECT * FROM user WHERE isActivated = 1");
							$result->execute(); ?>
							<select name="username" id="email" class="form-control" placeholder="eConnect Account" required>
							<option></option>
							<?php
								for($i=0; $row = $result->fetch(); $i++) 
								{
								?>
								<option value="<?php if(isset($row['username'])){echo $row['username'];} ?>"><?php echo $row['email']?></option>
							<?php } echo "</select>"; ?>
					</div>
					<div class="group">
						<label for="password" class="label">Password</label>
						<input id="password" type="password" class="input" data-type="password">
					</div>
					<div class="group">
						<input type="submit" class="button" value="Sign In">
					</div>
				</form>
			</div>
	<?php error_reporting(~E_WARNING);
	session_start();
	if(isset($_SESSION['msg'])){
		echo "<h4 class='alert alert-danger'>".$_SESSION['msg']."</h4>";
		unset($_SESSION['msg']);
	}
	?>
			
			<!-- SIGN UP FORM -->
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Screen Name</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">eConnect Account</label>
					<?php $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$result = $connPDO->prepare("SELECT * FROM user WHERE isActivated = 1");
						$result->execute();
						echo '<select name="email" id="emailreg" class="form-control" placeholder="eConnect Account" required>
							<option></option>'
							;for($i=0; $row = $result->fetch(); $i++) 
							{
							?>
							<option value="<?php if(isset($row['email'])){echo $row['email'];} ?>"><?php echo $row['email']?></option>
							<?php } echo "</select>";
							?>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
			</div>
			
		</div>
	</div>
</div>
  
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
