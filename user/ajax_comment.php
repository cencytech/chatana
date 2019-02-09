<?php 
include_once "../conn.php";

if (isset( $_SERVER['HTTP_X_REQUESTED_WITH'] )):
 
$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	#if (!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['comment']) AND !empty($_POST['postid'])) {
		$name = $_POST['name'];
		$comment = $_POST['comment'];
		$postId = $_POST['postid'];
		
		$sql = "INSERT INTO comment
		(name, comment, post_id)
		VALUES('{$name}', '{$comment}', '{$postId}')";
	#}
	
	$connPDO->exec($sql); 
?>



<div class="comment-item">
	<div class="comment-post">

		<div class="direct-chat-msg right">
	
		<?php $accid2 = $_SESSION['id'];
		$qUser2=mysqli_query($conn,"select photo from `user` where userid='$accid2'");
		while($qu2=mysqli_fetch_array($qUser2)) { ?>
		<img class="direct-chat-img" src="<?php if(($qu2['photo']==null)){echo "../upload/avatar/default.jpg";}else{echo "../upload/avatar/".$qu2['photo'];} ?>" width="50px" height="50px">
		<?php } ?>
	
		<div class="direct-chat-text">
			<h3><?php echo $comment ?>
				<small class="direct-chat-name pull-right"><a href="#$name"><?php echo $name ?></a></small>
			</h3>
		</div>
	</div>
	
	</div>
</div>

<?php  endif ?>