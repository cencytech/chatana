
<div class="col-lg-12"> 
	<div class="panel panel-primary container">
		<div class="widget-user-header #bg-green">

			<div class="pull-right"><br>
				<a href="#delete_room" data-toggle="modal" class="btn-block btn btn-danger">Delete Group</a>
				<!--a href="group-chat.php" class="btn-block btn btn-default">Go To Lobby</a-->
				<a href="#add_member" data-toggle="modal" class="btn-block btn btn-primary">Add Person</a>
			</div>
		  <!-- /.widget-user-image -->
			<h3 class="widget-user-username"><?php echo $chatrow['chat_name']; ?></h3>
		</div>

		<div class="showme hidden" style="position: absolute; left:570px; top:20px;">
			<div class="well">
			<?php $rm=mysqli_query($conn,"select * from chat_member left join `user` on user.userid=chat_member.userid where chatroomid='$id'");
				while($rmrow=mysqli_fetch_array($rm)){ ?>
					<span>
						<?php $creq=mysqli_query($conn,"select * from chatroom where chatroomid='$id'");
							$crerow=mysqli_fetch_array($creq);

							if ($crerow['userid']==$rmrow['userid']){ ?>
									<span class="fa fa-user"></span>
								<?php } ?>
						<?php echo $rmrow['username']; ?>
					</span><br>
				<?php } ?>

			</div>
		</div>
		
		<p>Note: Please don't spam or foul words to avoid Deactivation account.</p>
		<hr>

		<a href="chatroom.php?id=<?php echo $id?>">
			<div id="chat_area" style="margin-left:10px; max-height:290px; overflow-y:scroll;"></div>
		</a>
	</div>

	<div class="box-footer">
		<div class="input-group ">
			<input type="text" class="form-control chat_msg" placeholder="Type message..." id="chat_msg">
			
			<span class="input-group-btn">
				<input type="file" class="btn btn-default btn-flat #send_msg">
				<button class="btn btn-success btn-flat send_msg" type="submit" id="send_msg" value="<?php echo $id; ?>"><span class="fa fa-comment"></span> Send</button>
			</span>
		</div>
	</div>

	</div>

</div>
