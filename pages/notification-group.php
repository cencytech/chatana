<?php $queryX=mysqli_query($conn,"select * from tbl_posts where sent_by!='$user' order by 1 desc");
	
	$comment_countX = mysqli_num_rows($queryX);
	
	?>

<li class="dropdown messages-menu">
	<!-- Menu toggle button -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-users fa-2x"></i>
		<span class="label label-success"></span>
	</a>

	<ul class="dropdown-menu">	
		<div class="alert">Recent Message <a href="inbox.php" class="pull-right">Go To Inbox  &nbsp;<span class="label label-warning pull-right"><?php echo $comment_countX ?></span></a></div>
	
	<?php $query = mysqli_query($conn,"select * from tbl_posts  where send_to = '$user' limit 5");

		while($row=mysqli_fetch_array($query)) {

		$pId = $row['id'];

	?>
		
		<li>
		<!-- inner menu: contains the messages -->
		<ul class="menu">
			
		  <li><!-- start message -->
			<a href="read-message.php?id=<?php echo $pId?>">
			  <div class="pull-left">
				<!-- Data Image -->
				<img src="../upload/messages/<?php echo $row['post_photo'] ?>" class="img-circle">
			  </div>
			  <!-- Message title and timestamp -->
			  <h4>
				<?php echo $row['post_title'] ?>
				<small><i class="fa fa-clock-o"></i> <?php echo $row['post_date'] ?></small>
			  </h4>
			  <!-- The message -->
			  <p><?php echo $row['post_remarks'] ?></p>
			</a>
		  </li>
		  <!-- end message -->
		</ul>
		<!-- /.menu -->
	  </li>
		<?php } ?>
	  <li class="footer"><a href="inbox.php">Go To Inbox</a></li>
	</ul>
  </li>