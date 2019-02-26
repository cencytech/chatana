<?php
    // this refreshes current page after 5 seconds.
   # header( "refresh:2;" );
 
    // OR send to a new URL like this
    #header( "refresh:3; url=chatroom.php" );
 
    // OR simply echo the HTML meta tag
?>
<meta http-equiv="refresh" content="<?php echo $refresher; ?>" />
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
		<div class="input-group">
			<input type="text" class="form-control chat_msg" placeholder="Type message..." id="chat_msg" style="height:42px">

			<span class="input-group-btn"> 
 
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-camera fa-2x"></i>
			</button>
   
   <!-- /.modal image upload -->
<div class="modal fade" id="modal-default">
	<div class="#modal-dialog">
		<div class="#modal-content">
		
		<form method="POST" action="image_upload.php?id=<?php echo $id; ?>" enctype="multipart/form-data">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>

				<input type="file" class="form-control" name="img_location" required>
			</div>
			

			<div class="modal-body"> 
				<button type="submit" class="pull-right btn btn-primary">Send Captured</button>
			</div>
		</form>
		
		</div>
	
		<!-- /.modal-content -->
	</div>
	  <!-- /.modal-dialog -->
</div>
	<!-- /.modal image upload -->
	 

			<button class="btn btn-default btn-fill btn-flat send_msg" type="submit" id="send_msg" value="<?php echo $id; ?>"><span class="fa fa-send fa-2x"></span></button>
			</span>
		</div>
	</div>

	</div>

</div>
