<?php

require_once ('../conn.php');

if (isset($_POST['add_post'])) 
	{

	move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/messages/" . $_FILES["image"]["name"]);			
	$location = $_FILES["image"]["name"];
	
	$post_id = $_POST['post_id'];
	$post_title = $_POST['post_title'];
	$post_remarks = $_POST['post_remarks'];
	$post_date = $_POST['post_date'];
	$send_to = $_POST['send_to'];
	$sent_by = $_POST['sent_by'];

	$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$PDOQuery = "INSERT INTO tbl_posts VALUES('', '$post_id', '$post_title', '$post_remarks', '$post_date', '$send_to', '$location', '$sent_by')";

	$connPDO->exec($PDOQuery);
	echo "<script>window.location='inbox-sent.php'</script>";
	}
	?>

<?php
/*
	include_once "../conn.php";
	
	if(ISSET($_POST['add_post'])){	
			if($_FILES['image']['name'] == "")
			{
				$location = "../upload/avatar/default.jpg";
			} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/avatar/" . $_FILES["image"]["name"]);
			
			$location = $_FILES["image"]["name"];
			}

			$post_id = $_POST['post_id'];
			$post_title = $_POST['post_title'];
			$post_remarks = $_POST['post_remarks'];
			$post_date = $_POST['post_date'];
			$send_to = $_POST['send_to'];
			$sent_by = $_POST['sent_by'];

			
			$connPDO->query("INSERT INTO `tbl_posts` VALUES('', '$post_id', '$post_title', '$post_remarks', '$post_date', '$send_to', '$location', '$sent_by')") or die(mysqli_error($connPDO));
			header("location:inbox.php");
	} */

?>
