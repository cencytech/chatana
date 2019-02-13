
<div class="col-md-12">
	<div class="box box-widget widget-user-2">
		<div class="widget-user-header bg-blue">
			<div class="widget-user-image">
				<img class="img-circle" src="../upload/avatar/default.jpg">
			</div>
			<h3 class="widget-user-username">User Module(s)</h3>
			<h5 class="widget-user-desc">Administrator</h5>
		</div>
		<div class="box-footer no-padding">
			<ul class="nav nav-stacked">
			
			<?php $queryUserList = mysqli_query($conn,"select * from `user`");
				while($rowusr = mysqli_fetch_array($queryUserList))
				{
				?>
				<li>
					<a href="#">
					<img class="img-circle" src="<?php if(($rowusr['photo']==null)){echo "../upload/avatar/default.jpg";}else{echo $rowusr['photo'];} ?>" height="64px;" width="64px;">						
					<?php if ($rowusr['access']==1) { ?>
						<span class="#pull-right badge bg-blue">Admin</span>
						<span class="#pull-right badge bg-default"><input type="hidden" id="eusername<?php echo $rowusr['userid']; ?>" value="<?php echo $rowusr['username']; ?>"><?php echo $rowusr['username']; ?></span>
						<button type="button" class="pull-right btn btn-default edituser" value="<?php echo $rowusr['userid']; ?>"><span class="glyphicon glyphicon-pencil"></span> Modify</button>
					<?php } else { ?>
						<span class="#pull-right badge bg-red">User</span>
						<span class="#pull-right badge bg-default"><input type="hidden" id="eusername<?php echo $rowusr['userid']; ?>" value="<?php echo $rowusr['username']; ?>"><?php echo $rowusr['username']; ?></span>
						<button type="button" class="pull-right btn btn-danger deleteuser" value="<?php echo $rowusr['userid']; ?>"><span class="glyphicon glyphicon-trash"></span> Trash</button>
						<button type="button" class="pull-right btn btn-default edituser" value="<?php echo $rowusr['userid']; ?>"><span class="glyphicon glyphicon-pencil"></span> Modify</button>
					<?php } ?>
					<center><h2><?php echo $rowusr['uname']; ?></h2></center>
						<input type="hidden" id="ename<?php echo $rowusr['userid']; ?>" value="<?php echo $rowusr['uname']; ?>">
						<input type="hidden" id="epassword<?php echo $rowusr['userid']; ?>" value="<?php echo $rowusr['password']; ?>">
					</a>

				</li>
			<?php
				}
				?>
				
			</ul>
		</div>
	</div>
</div>

<?php #include "../pages/foobar.php" ?>