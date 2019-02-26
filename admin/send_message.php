<?php
	include('../conn.php');

	session_start();

	if(isset($_POST['msg'])) 

	{
		# $fileinfo	 = PATHINFO($_FILES["img_location"]["name"]);
		# $newFilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
		# move_uploaded_file($_FILES["img_location"]["tmp_name"],"../upload/chat/");
		# 
		# $img_location = "../upload/chat/" . $newFilename;

		$msg = $_POST['msg'];

		$id = $_POST['id'];

		mysqli_query($conn,"INSERT INTO `chat` (chatroomid, message, userid, chat_date) values ('$id', '$msg', '".$_SESSION['id']."', NOW())");
	}

?>