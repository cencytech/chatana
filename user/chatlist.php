<div class="col-lg-12">
	<div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-default">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/davao-jobs-hiring.png" alt="Davao Jobs Hiring">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Chat Available</h3>
              <h5 class="widget-user-desc">You're not invited</h5>
			  
            </div> 
		<div class="box-footer no-padding">

			<ul class="nav nav-stacked">

		<?php $query=mysqli_query($conn,"select * from chatroom  order by date_created desc");
			while($row=mysqli_fetch_array($query)){
			?>
			<br>
			<li>
		<input type="hidden" value="
			<?php
				$usera=array();
				$m=mysqli_query($conn,"select * from chat_member where chatroomid='".$row['chatroomid']."'");
				while($mrow=mysqli_fetch_array($m)){
					$usera[]=$mrow['userid'];
				}
				//1 member
				if (in_array($_SESSION['id'], $usera)){
					echo "1";
				}	
				else{
					//2 not member w/ pass
					if (!empty($row['chat_password'])){
						echo "2";
					}
					else{
					//3 not member w/o pass
						echo "3";
					}
				}
				?>" id="status<?php echo $row['chatroomid']; ?>">

				<?php $num=mysqli_query($conn,"select * from chat_member where chatroomid='".$row['chatroomid']."'"); ?>
					
					
					<h4><?php echo $row['chat_name'];?>
					<small class="pull-right"><?php echo date('M d, Y - h:i A', strtotime($row['date_created'])); ?></small>
					<span class="badge">People <?php echo mysqli_num_rows($num); ?></span>
					</h4>
					<button value="<?php echo $row['chatroomid']; ?>" class="btn btn-primary join_chat">
					<span class="fa fa-comment"></span> Join</button>
				
					<?php if (!empty($row['chat_password'])){ ?>
					
						Protected: <span class="glyphicon glyphicon-lock"></span> Yes
					
					<?php } $qq=mysqli_query($conn,"select * from chat_member where chatroomid='".$row['chatroomid']."' and userid='".$_SESSION['id']."'");
					if (mysqli_num_rows($qq)>0){ ?>
						
						<strong class="box box-success"> You`re already invited!</strong>
					
					<?php } ?>
 </li>
				<?php } ?>
</ol>
		</div>
	</div>
</div>