
<?php
	include('../conn.php');
	
	$fileinfo		=	PATHINFO($_FILES["img_location"]["name"]);
	$newFilename	=	$fileinfo['filename'] . "." . $fileinfo['extension'];
	
	move_uploaded_file($_FILES["img_location"]["tmp_name"],"../upload/chat/" . $newFilename);
	
	$img_location	=	"../upload/chat/" . $newFilename;
	
	mysqli_query($conn,"insert into chat (img_location) values ('$img_location')");
	header('location:index.php');
?>