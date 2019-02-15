<?php
	session_start();
	
	session_destroy();
	
	include('../conn.php');
	
	$id = $_SESSION['id'];
	
	mysqli_query($conn,"update `user` set isOnline='0' where userid='$id'");
	
	header('location:../login.php?logout=1');
	
	?>