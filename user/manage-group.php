 
<li class="dropdown messages-menu">
	<!-- Menu toggle button -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-users fa-2x"></i>
		<span class="label label-success"></span>
	</a>

	<ul class="dropdown-menu">	
		<div class="alert">List of group chat <a href="mychat.php" class="pull-right"><i class="fa fa-comments fa-lg"></i></a></div>

		<?php $my=mysqli_query($conn,"select * from chat_member left join chatroom on chatroom.chatroomid=chat_member.chatroomid where chat_member.userid='".$_SESSION['id']."' order by chatroom.date_created desc");
				while($myrow=mysqli_fetch_array($my))
				{
				$nq=mysqli_query($conn,"select * from chat_member where chatroomid='".$myrow['chatroomid']."'");
				?>
		<li>
			<ul class="menu">
				<li>
					<a style="color:#000" class="btn-block btn btn-primary" href="chatroom.php?id=<?php echo $row['chatroomid']; ?>">
						<div class="pull-left">
							<img src="../upload/icons/group.png" class="img-circle">
						</div>
						<h4><?php echo $myrow['chat_name']; ?></h4>
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>
	</ul>
</li>