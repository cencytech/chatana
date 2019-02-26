<?php
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);

		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['msg'] = "Username should not contain space and special characters!"; 
			header('location: login.php');
		}
		else{

		$fusername = $username;
		
		$password  = check_input($_POST["password"]);
		$fpassword = md5($password);
		
		$query = mysqli_query($conn,"select * from `user` where username='$fusername' and password='$fpassword' and isActivated='1' ");
		
		if(mysqli_num_rows($query)==0){
			$_SESSION['msg'] = "Login error or Invalid credentials. You need to <b>activate your account</b>.";
			header('location: login.php');
		} else {
		$row = mysqli_fetch_array($query);
			if ($row['access']==1){
				$_SESSION['id']=$row['userid'];
				?>
				<script> //window.alert('Login Success, Welcome Admin!');
					window.location.href='admin/';
				</script>
			<?php 
				$id = $_SESSION['id'];
				mysqli_query($conn,"update `user` set isOnline='1' where userid='$id'");
				
			} else { $_SESSION['id']=$row['userid']; ?>
				<script> //window.alert('Login Success, Welcome User!');
					window.location.href='user/';
				</script>

			<?php 
				$id = $_SESSION['id'];
				mysqli_query($conn,"update `user` set isOnline='1' where userid='$id'");
			}
		}
		
		}
	}
?>