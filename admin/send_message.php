<?php
	include('../conn.php');
	session_start();
	if(isset($_POST['msg'])){
		
		move_uploaded_file($_FILES["photo"]["tmp_name"],"../upload/chat/" . $_FILES["photo"]["name"]);			
		
		
		$msg=$_POST['msg'];
		#$photo=$_POST['photo'];
		$photo = $_FILES["photo"]["name"];
		$id=$_POST['id'];
		mysqli_query($conn,"insert into `chat` (chatroomid, message, chat_image, userid, chat_date) values ('$id', '$msg' , '$photo' , '".$_SESSION['id']."', NOW())") or die(mysqli_error());
	}
?>