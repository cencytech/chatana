<?php
	include('../conn.php');
	session_start();

	if(isset($_POST['msg'])){

	$msg = $_POST['msg'];

	$id = $_POST['id'];

	$fileinfo	 = PATHINFO($_FILES["img_location"]["name"]);
	$newFilename = $fileinfo['filename'] . "." . $fileinfo['extension'];

	move_uploaded_file($_FILES["img_location"]["tmp_name"],"../upload/chat/");

	$img_location = "../upload/chat/" . $newFilename;

	mysqli_query($conn,"INSERT INTO `chat` (chatroomid, message, img_location, userid, chat_date) values ('$id', '$msg' , '$img_location' , '".$_SESSION['id']."', NOW())");
	}
?>