 
<li class="dropdown messages-menu">
	<!-- Menu toggle button -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-users fa-2x"></i>
		<span class="label label-success"></span>
	</a>

	<ul class="dropdown-menu">	
		<div class="alert">View All Groups <a href="group-chat.php" class="pull-right"><i class="fa fa-gear fa-lg"></i></a></div>

		<?php $query = mysqli_query($conn,"select * from chatroom order by date_created desc");
			while($row = mysqli_fetch_array($query)){
				$num = mysqli_query($conn,"select * from chat_member where chatroomid='".$row['chatroomid']."'");
			?>

		<li>
		<!-- inner menu: contains the messages -->
		<ul class="menu">
			
			<li><!-- start message -->
				<a style="color:#000" class="btn-block btn btn-primary" href="chatroom.php?id=<?php echo $row['chatroomid']; ?>">
					<div class="pull-left">
						<img src="../upload/icons/group.png" class="img-circle">
					</div>
					<h4><?php echo $row['chat_name']; ?></h4>
				</a>
				
			</li>
		  <!-- end message -->
		</ul>
		<!-- /.menu -->
	  </li>
		<?php } ?>
	</ul>
  </li>