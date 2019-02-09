<?php

	include "../conn.php";
	
	if(ISSET($_POST['add_post'])){	
			if($_FILES['image']['name'] == ""){
				$location = "../uploads/messages/default.jpg";
			}else{
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				$image_size = getimagesize($_FILES['image']['tmp_name']);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/messages/" . $_FILES["image"]["name"]);
				$location =  $_FILES["image"]["name"];
			}
			$post_id = $_POST['post_id'];
			$post_title = $_POST['post_title'];
			$post_remarks = $_POST['post_remarks'];
			$post_date = $_POST['post_date'];
			$send_to = $_POST['send_to'];
			$sent_by = $_POST['sent_by'];
			
			$conn->query("INSERT INTO `tbl_posts` VALUES('', '$post_id', '$post_title', '$post_remarks', '$post_date', '$send_to', '$location', '$sent_by')") or die(mysqli_error($conn));
			?>
	
<script src="../assets/jQuery/3.1.0/jquery.min.js"></script>
<script language="javascript" src="../assets/jQuery/jquery.timers-1.0.0.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var chatanajs = jQuery.noConflict();
		chatanajs(document).ready(function()
		{
			chatanajs(".reLoad").everyTime(1000,function(i){
				chatanajs.ajax({
				  url: "inbox.php",
				  cache: false,
				  success: function(html){
					chatanajs(".reLoad").html(html);
				  }
				})
			})
		});
	});
</script>
<HR>
<HR>
<H1>
qqqqqqqqq
</H1>
		
		<?php
			header("location:inbox.php");
	}
?>
