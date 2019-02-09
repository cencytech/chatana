<?php
	include('../conn.php');
	session_start();
	if(isset($_POST['id'])){		
	
		move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/chat/" . $_FILES["image"]["name"]);			
		$image_location = $_FILES["image"]["name"];
		
		#$image_location=$_POST['image_location'];
		$msg=$_POST['msg'];
		$id=$_POST['id'];
		mysqli_query($conn,"insert into `chat` (chatroomid, message, userid, image_location, chat_date) values ('$id', '$msg' , '".$_SESSION['id']."', '$image_location', NOW())") or die(mysqli_error());
	}
?>