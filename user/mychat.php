<?php
		$me=mysqli_query($conn,"select * from chat_member left join chatroom on chatroom.chatroomid=chat_member.chatroomid where chat_member.userid='".$_SESSION['id']."' order by chatroom.date_created desc");
		$numme=mysqli_num_rows($me);
		?>

        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-default">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/JMD-groups.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">My Chatgroup</h3>
              <h5 class="widget-user-desc">You're Joined</h5>
			  
            </div>
		<div class="box-footer no-padding">

			<ul class="nav nav-stacked">
			<?php $my=mysqli_query($conn,"select * from chat_member left join chatroom on chatroom.chatroomid=chat_member.chatroomid where chat_member.userid='".$_SESSION['id']."' order by chatroom.date_created desc");
				while($myrow=mysqli_fetch_array($my))
				{
				$nq=mysqli_query($conn,"select * from chat_member where chatroomid='".$myrow['chatroomid']."'");
				?>
				<br>
                <li>
					<button type="button" class="btn btn-danger leave2" value="<?php echo $myrow['chatroomid']; ?>">Leave</button>
					<strong>
						<a href="chatroom.php?id=<?php echo $myrow['chatroomid']; ?>">&nbsp;&nbsp;<?php echo $myrow['chat_name']; ?>
							<span class="pull-right badge bg-green"><?php echo mysqli_num_rows($nq); ?></span>
						</a>
					</strong>
					
						<!--?php $memb=mysqli_query($conn,"select * from chatroom where userid='".$_SESSION['id']."' and chatroomid='".$myrow['chatroomid']."'");
						if (mysqli_num_rows($memb)>0){ ?>
							<button type="button" class="#fa-2x btn btn-danger btn-lg delete2" value="<?php echo $myrow['chatroomid']; ?>">Delete</button>
						< ?php } else{ ?>                        
							<button type="button" class="#fa-lg btn btn-danger btn-lg leave2" value="<?php echo $myrow['chatroomid']; ?>">Leave</button>
						< ?php } ?-->
					
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<!-- /.widget-user -->
</div>

