<?php
	include('../conn.php');
	if(isset($_POST['fetch'])){
		$id = $_POST['id'];
		
		$query=mysqli_query($conn,"select * from `chat` left join `user` on user.userid=chat.userid where chatroomid='$id' order by chat_date asc") or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		?>

		<div class="direct-chat-msg">
			<!-- /.direct-chat-info -->
			<img class="direct-chat-img" src="<?php if(empty($row['photo'])){echo "../upload/avatar/default.jpg";}else{echo "../upload/avatar/" . $row['photo'];} ?>">

			<div class="direct-chat-text"> 
				<h3>
					<p>
						<a href="#"><strong><?php echo $row['username']; ?></strong></a> said:
					</p>
						<?php echo $row['message']; ?>
				</h3>
				<img src="<?php echo $row['img_location']; ?>" width="100px">
					<small class="pull-right"><i class="fa fa-check"></i> Sent on 	<?php echo date('M-d-Y h:i A',strtotime($row['chat_date'])); ?></small>
				<br>
			</div>
		<!-- /.direct-chat-text -->
		</div> 
	<?php } } ?>