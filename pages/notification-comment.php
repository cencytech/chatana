	<?php 
		$queryX=mysqli_query($conn,"select * from comment left join tbl_posts on tbl_posts.id = comment.post_id order by 1 desc limit 5");
		$comment_countX = mysqli_num_rows($queryX);
		?>

<li class="dropdown notifications-menu ">
	<!-- Menu toggle button -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	  <i class="fa fa-comments-o fa-2x"></i>
		<!--
		< ?php	// DIsplay count records.
				$querynum = mysqli_query($conn, "select * from comment");
				$comment_count = mysqli_num_rows($querynum);
				if($comment_count != 0)
				{ 
			?>
				
			<span id="mes" class="label label-warning">< ?Php echo $comment_count ?></span>
		< ?php } ?>
		-->
	</a>
	<ul class="dropdown-menu">
	<div class="alert">View All Comments <a href="inbox-comments.php" class="pull-right"><i class="fa fa-link fa-lg"></i></a></div>
	<?php 
		$query=mysqli_query($conn,"select * from comment left join tbl_posts on tbl_posts.id = comment.post_id  where send_to = '$user' limit 5");
		while($row=mysqli_fetch_array($query)){
		#$num=mysqli_query($conn,"select * from tbl_posts where id='".$row['id']."'");
		#$comment_count = mysqli_num_rows($query);
		$postId = $row['post_id'];
		$pId = $row['id'];
		?>
	  <li>
		<!-- Inner Menu: contains the notifications -->
		<ul class="menu">
	
		  <li><!-- start notification -->
			<a href="read-message.php?id=<?php echo $pId?>">
				
					Someone has commented on a
					<strong> <?php echo $row['post_title']; ?></strong> post.
					<?php# echo $row['date']; ?>
				
			</a>
		  </li>
	
		</ul>
	  </li>
	  <?php } ?>
	  <li class="footer"><a href="inbox-comments.php"> See All</a></li>
	</ul>
  </li>