
<div class="col-md-12">
  <!-- Widget: user widget style 1 -->
	<div class="box box-widget widget-user-2">
	<!-- Add the bg color to the header using any of the bg-* classes -->
		<div class="widget-user-header bg-blue">
			<div class="widget-user-image">
				<img class="img-circle" src="../upload/avatar/default.jpg">
			</div>
		  <!-- /.widget-user-image -->
			<h3 class="widget-user-username">User Module(s)</h3>
			<h5 class="widget-user-desc">Administrator</h5>
		</div>
		<div class="box-footer no-padding">
			<ul class="nav nav-stacked">
			<?php $query=mysqli_query($conn,"select * from `user` order by uname asc");
				while($row=mysqli_fetch_array($query))
				{
				?>
				<li>
					<a href="#">
					<img class="img-circle" src="<?php if(empty($row['photo']==null)){echo "../upload/avatar/default.jpg";}else{echo $row['photo'];} ?>" height="64px;" width="64px;">						
					<?php if ($row['access']==1) { ?>
						<span class="#pull-right badge bg-blue">Admin</span>
						<span class="#pull-right badge bg-default"><input type="hidden" id="eusername<?php echo $row['userid']; ?>" value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></span>
						<button type="button" class="pull-right btn btn-default edituser" value="<?php echo $row['userid']; ?>"><span class="glyphicon glyphicon-pencil"></span> Modify</button>
					<?php } else { ?>
						<span class="#pull-right badge bg-red">User</span>
						<span class="#pull-right badge bg-default"><input type="hidden" id="eusername<?php echo $row['userid']; ?>" value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></span>
						<button type="button" class="pull-right btn btn-danger deleteuser" value="<?php echo $row['userid']; ?>"><span class="glyphicon glyphicon-trash"></span> Trash</button>
						<button type="button" class="pull-right btn btn-default edituser" value="<?php echo $row['userid']; ?>"><span class="glyphicon glyphicon-pencil"></span> Modify</button>
					<?php } ?>
					<center><h2><?php echo $row['uname']; ?></h2></center>
						<input type="hidden" id="ename<?php echo $row['userid']; ?>" value="<?php echo $row['uname']; ?>">
						<input type="hidden" id="epassword<?php echo $row['userid']; ?>" value="<?php echo $row['password']; ?>">
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

<?php include "../pages/foobar.php" ?>