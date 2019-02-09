<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('../pages/header-main.php'); ?>


<div class="col-md-12">
  <!-- Widget: user widget style 1 -->
	<div class="box box-widget widget-user-2">
	<!-- Add the bg color to the header using any of the bg-* classes -->
		<div class="widget-user-header bg-default">
			<div class="widget-user-image">
				<img class="img-circle" src="../dist/img/JMD-groups.png" alt="User Avatar">
			</div>
		  <!-- /.widget-user-image -->
			<h3 class="widget-user-username">Control Panel</h3>
			<h5 class="widget-user-desc">Member Approval</h5>
		</div>
		<div class="box-footer no-padding">
			<ul class="nav nav-stacked">
			
			<?php #require_once 'mysqli.php';
				$s_query = $conn->query("SELECT * FROM `user` WHERE `access`!=1 ORDER BY 1 DESC") or die(mysqli_error($conn));
				while($s_fetch = $s_query->fetch_array()) 
				{	
				$userid = $s_fetch['userid'];
				?>	
				<li>
					<a href="#">
					

					<h2><?php echo $s_fetch['username']?> 
						<?php if($s_fetch['isActivated']==0) { ?>
							<small class="box box-warning"><i class="menu-icon fa fa-question bg-yellow"></i><em>Submit for Review</em></small>
						<?php } else { ?>
							<small class="box box-success"><i class="menu-icon fa fa-check bg-green"></i><em>Activated</em></small> 
						<?php } ?>
					</h2>
					<p><?php echo $s_fetch['email']?></p>
					<p><?php echo $s_fetch['fname']?></p>
					<p><?php echo $s_fetch['lname']?></p>

							<?php if($s_fetch['isActivated']!=1) { ?>
								<form action="activate_script.php?userid=<?=$userid?>" method="post">
									<input type="hidden" name="isActivated" value="1">
									<button type="submit" class="pull-right btn btn-warning">Activate</button>
								</form>
							<?php } else { ?>
								<?php if($s_fetch['access']=="admin") { ?>
									<form action="activate_script.php?userid=<?=$userid?>" method="post">
										<input type="hidden" name="isActivated" value="1">
										<button type="submit" class="pull-right btn btn-danger">Activate</button>
									</form>
								<?php } else { ?>
									<form action="activate_script.php?userid=<?=$userid?>" method="post">
										<input type="hidden" name="isActivated" value="0">
										<button type="submit" class="pull-right btn btn-danger">Deactivate</button>
									</form>
								<?php } ?>
							<?php } ?>

					</a>
				</li>
			<?php
				}
				?>
			</ul>
		</div>
	</div>
  <!-- /.widget-user -->
</div>
<!-- REQUIRED JS SCRIPTS -->
<?php include "../pages/foobar.php" ?>