<?php
	include('../conn.php');
	session_start();
	if(isset($_POST['msg'])){
		
	move_uploaded_file($_FILES["file1"]["tmp_name"],"../upload/chat/" . $_FILES["file1"]["name"]);	
		
	$msg = $_POST['msg'];
	#$photo=$_POST['photo'];
	$file1 = $_FILES["file1"]["name"];
	$id = $_POST['id'];
	mysqli_query($conn,"insert into `chat` (chatroomid, message, file1, userid, chat_date) values ('$id', '$msg' , '$file1' , '".$_SESSION['id']."', NOW())") or die(mysqli_error());
	}
?>