
<?php
	include('../conn.php');
	
	session_start();

	$fileinfo		=	PATHINFO($_FILES["img_location"]["name"]);
	$newFilename	=	$fileinfo['filename'] . "." . $fileinfo['extension'];

	move_uploaded_file($_FILES["img_location"]["tmp_name"],"../upload/chat/" . $newFilename);

	$img_location	=	"../upload/chat/" . $newFilename;

	$id = $_REQUEST['id']; 

	mysqli_query($conn,"INSERT INTO `chat` (chatroomid, img_location, userid, chat_date) values ('$id', '$img_location', '".$_SESSION['id']."', NOW())");

	header("Location: " . $_SERVER["HTTP_REFERER"]);

	# header('location:chatroom.php?id=$id');
	
	# if (isset($_SERVER["HTTP_REFERER"])) {
    #     header("Location: " . $_SERVER["HTTP_REFERER"]);
    # }
?>
