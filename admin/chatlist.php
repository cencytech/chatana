 
	<div class="col-lg-12">
      
		<div class="pull-right">
			Click "+" to add new group <a href="#add_chatroom" data-toggle="modal" class="fa-2x btn" ><i class="text-primary fa fa-plus"></i></a>
		</div>
		<br>
		<br>
		
		<div class="box-footer #no-padding">
			<?php $query=mysqli_query($conn,"select * from chatroom order by date_created desc");
				while($row=mysqli_fetch_array($query)){
				$num=mysqli_query($conn,"select * from chat_member where chatroomid='".$row['chatroomid']."'");
				?>
				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box bg-default">
						<span class="info-box-icon">
							<?php echo mysqli_num_rows($num); ?>							
						</span>

						<div class="info-box-content">
							<span class="info-box-text">
								<?php echo date('m/d/y - h:i A', strtotime($row['date_created'])); ?>
							</span>
							<span class="info-box-number">
								<small><input type="hidden" id="name<?php echo $row['chatroomid']; ?>" value="<?php echo $row['chat_name']; ?>"><?php echo $row['chat_name']; ?></small>
							</span>

							<div class="progress">
								<div class="progress-bar" style="width: <?php echo mysqli_num_rows($num); ?>%"></div>
							</div>
							<span class="progress-description">
								<input type="hidden" id="pass<?php echo $row['chatroomid']; ?>" value="<?php echo $row['chat_password']; ?>"><i class="fa fa-unlock"></i> <?php echo $row['chat_password']==null?"no password" : $row['chat_password']; ?>
							</span>
						</div>
					<!-- /.info-box-content -->
					</div>
					<div class="row">
						<div class="col-xs-4 text-center">
							<button class="btn-block btn btn-danger delete" value="<?php echo $row['chatroomid']; ?>"> Delete</button>
						</div>
						<div class="col-xs-4 text-center">
							<button class="btn-block btn btn-warning edit" value="<?php echo $row['chatroomid']; ?>"> Edit</button>
						</div>
						<div class="col-xs-4 text-center">
							<a class="btn-block btn btn-primary" href="chatroom.php?id=<?php echo $row['chatroomid']; ?>"> Join</a>
						</div>
					</div>
					<hr>
				<!-- /.info-box -->
				</div>

			<?php } ?>
		</div>
		 
			
		
	
 