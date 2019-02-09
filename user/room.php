
<div class="col-lg-8">
	<div class="box box-widget widget-user-2"> 
		<div class="showme hidden" style="position: absolute; left:570px; top:20px;">
			<div class="well">
			<?php
				$rm=mysqli_query($conn,"select * from chat_member left join `user` on user.userid=chat_member.userid where chatroomid='$id'");
				while($rmrow=mysqli_fetch_array($rm)){
				?>
				<span>
					<?php $creq=mysqli_query($conn,"select * from chatroom where chatroomid='$id'");
						$crerow=mysqli_fetch_array($creq);
						
						if ($crerow['userid']==$rmrow['userid']){
						?>
							<span class="fa fa-user"></span>
							<?php } ?>
					<?php echo $rmrow['uname']; ?>
				</span>
			<?php } ?>
				
			</div>
		</div>
	</div>
				
		<?php if ($chatrow['userid']==$_SESSION['id']){ ?>
		<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Lobby</a>
		<!--a href="#delete_room" data-toggle="modal" class="btn btn-danger">Delete Room</a>
		<a href="#add_member" data-toggle="modal" class="btn btn-primary">Add Member</a-->
		<?php } else{ ?>

		<?php } ?>
	 
	
		<div class="panel panel-primary container">
		
		<div class="widget-user-header #bg-green">
		<h4>Start your conversation here!</h4>
			<div class="pull-right">
				<!--a href="group-chat.php" class="btn btn-default btn-block"><span class="fa fa-reply"></span> Go to Lobby</a-->
				<a href="#leave_room" data-toggle="modal" class="btn btn-danger btn-block">Leave Conversation</a>
			</div>
		  <!-- /.widget-user-image -->
			<h3 class="widget-user-username"><?php echo $chatrow['chat_name']; ?></h3>
		</div>
		
			<p>Note: Please don't Spam or foul words to avoid Deactivation account.</p>
			<hr>
			 
		<a href="chatroom.php?id=<?php echo $id?>">
			<div id="chat_area"  style="margin-left:10px; max-height:240px; overflow-y:scroll;">
			</div>
		</a>
		 
		</div>
		
		<div class="input-group">
			<input type="text" class="form-control chat_msg" placeholder="Type message..." id="chat_msg">
			<span class="input-group-btn">
			<button class="btn btn-primary btn-flat send_msg" type="submit" id="send_msg" value="<?php echo $id; ?>">
				<span class="glyphicon glyphicon-comment"></span> Send
			</button>
			</span>
		</div>
		
</div>