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
				<a href="#"><strong><?php echo $row['username']; ?></strong></a>:
					<h4><?php echo $row['message']; ?></h5>
					
				<p>
					<?php if($row['chat_image'] != ""): ?>
						<img src="../upload/chat/<?php echo $row['chat_image']; ?>" width="100px">
					<?php else: ?>
					<?php endif; ?>
				</p>
				<small class="pull-right"><i class="fa fa-check"></i> Sent on <?php echo date('M-d-Y h:i A',strtotime($row['chat_date'])); ?></small>
				<br>
			</div>
		<!-- /.direct-chat-text -->
		</div> 
		<?php } } ?>