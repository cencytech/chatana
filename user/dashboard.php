 
<?php $countUserRegistered = mysqli_query($conn,"SELECT userid FROM user"); ?>
<?php $countUserOnline = mysqli_query($conn,"SELECT userid FROM user WHERE isOnline=1"); ?>
<?php $countUserPending = mysqli_query($conn,"SELECT userid FROM user WHERE isActivated=0"); ?>
<?php $countUserTrashed = mysqli_query($conn,"SELECT userid FROM user WHERE isDeleted=1"); ?>

<div class="row">
<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-primary">
		<div class="inner">
			<h3><?php echo mysqli_num_rows($countUserRegistered); ?></h3>
			<p>Total User(s)</p>
		</div>
		<div class="icon">
			<i class="fa fa-shopping-cart"></i>
		</div>
		<a href="#" class="small-box-footer bg-default">
			Tap here <i class="fa fa-stop-circle-o fa-lg"></i>
		</a>
	</div>
</div>

 
<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-green">
		<div class="inner">
			<h3><?php echo mysqli_num_rows($countUserOnline); ?></h3></h3>
			<p>Online User(s)</p>
		</div>
		<div class="icon">
			<i class="ion ion-stats-bars"></i>
		</div>
		<a href="#" data-toggle="push-menu" class="small-box-footer">
			Tap here <i class="fa fa-play-circle-o fa-lg"></i>
		</a>
	</div>
</div>

<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-red">
		<div class="inner">
			<h3><?php echo mysqli_num_rows($countUserTrashed); ?></h3>
			<p>Deleted User(s)</p>
		</div>
		<div class="icon">
			<i class="ion ion-pie-graph"></i>
		</div>
		<a href="#" class="small-box-footer">
			Tap here <i class="fa fa-stop-circle-o fa-lg"></i>
		</a>
	</div>
</div>
</div>




<div class="row">
	<div class="box-header with-border">
	  <h3 class="box-title">Latest Members</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
		</button>
	  </div>
	</div>
	<!-- /.box-header -->

	<div class="box-body no-padding">
	  <ul class="users-list clearfix">
		<?php $query=mysqli_query($conn,"select * from user where isActivated!=0 order by 1 desc");
		while($row=mysqli_fetch_array($query)){
		?>
		<li>
		  <img class="img-circle" src="<?php if(($row['photo']==null)){echo "../upload/avatar/default.jpg";}else{echo "../upload/avatar/".$row['photo'];} ?>" width="50px" height="50px">
		  <a class="users-list-name" href="#"><?php echo $row['username'];?></a>
			<?php if ($row['isOnline']==1) { ?>
				<i style="color:lightgreen" class="fa fa-circle text-success"></i> Online
			<?php }else{ ?>
				<i style="color:red" class="fa fa-circle text-danger"></i> Offline
			<?php } ?>
		</li> 
		<?php } ?>	
	  </ul>
	  <!-- /.users-list -->
	</div> 
</div>
	<!-- /.box-footer -->

	 