<?php
	session_start();
	include('../conn.php');
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../');
    exit();
	}
	
	$sq=mysqli_query($conn,"select * from `user` where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
		
	if ($srow['access']!=1){
		header('location:../');
		exit();
	}
	
	$user = $srow['username'];
	$email_user=$srow['email'];
	$accesslevel = $srow['access'];
	$fname = $srow['fname'];
?>