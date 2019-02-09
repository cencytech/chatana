<li class="dropdown user user-menu">
<!-- Menu Toggle Button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <!-- The user image in the navbar-->
  <b><i class="fa fa-user-circle-o fa-2x"></i></b>
  <!-- hidden-xs hides the username on small devices so only the image appears. -->
  <span class="hidden-xs">Chatana</span>
</a>
<ul class="dropdown-menu">
  <!-- The user image in the menu -->
  <li class="user-header">

	<?php $accid = $_SESSION['id'];
	$qUser=mysqli_query($conn,"select photo from `user` where userid='$accid'");
	while($qu=mysqli_fetch_array($qUser)) { ?>
	<img class="img-circle" src="<?php if(($qu['photo']==null)){echo "../upload/avatar/default.jpg";}else{echo "../upload/avatar/".$qu['photo'];} ?>" width="50px" height="50px">
	<?php } ?>

	<p>
	  <a href="myprofile.php?id=<?php echo $_SESSION['id']; ?>"><?php echo $user; ?></a>
	  <small> <?php echo date("M d, Y h:s A")?></small>
	</p>
	
  </li>

  <!-- Options -->
  <li class="user-body">
	<div class="row">
	
	<?php  if ($accesslevel !=1){ ?>
	
	  <div class="col-xs-4 text-center">
		<a href="myprofile.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-users fa-2x"></i><br><small>My Profile</small></a>
	  </div>
	  <div class="col-xs-4 text-center">
		<a href="#" disabled style="color:#ccc!important"><i class="fa fa-gears fa-2x"></i><br><small>System Settings</small></a>
	  </div>
	  <div class="col-xs-4 text-center">
		<a href="change.logs.php"><i class="fa fa-refresh fa-2x"></i><br><small>Author Updates</small></a>
	  </div>
	<?php } else{ ?>
	  <div class="col-xs-4 text-center">
		<a href="user.php"><i class="fa fa-gears fa-2x"></i><br><small>User Privileges</small></a>
	  </div>
	  <div class="col-xs-4 text-center">
		<a href="" data-toggle="push-menu"><i class="fa fa-signal fa-2x"></i><br><small>Online Users</small></a>
	  </div>
	  <div class="col-xs-4 text-center">
		<a href="change.logs.php"><i class="fa fa-refresh fa-2x"></i><br><small>Author Updates</small></a>
	  </div>
	<?php } ?>

	</div>
	<!-- /.row -->
  </li>
  
  <!-- Control Panel -->
  <li class="user-footer">
  <?php  if ($accesslevel ==1){ ?>
	<div class="pull-left">
	  <a href="control-panel.php" class="btn btn-default btn-flat"><span class="fa fa-gear"></span> Control Panel</a>
	</div>
	<?php } else{ ?>
	<div class="pull-left">
	  <a class="btn btn-default btn-flat" data-toggle="push-menu"><span class="fa fa-signal"></span> Online Users</a>
	</div>
	<?php } ?>
	<div class="pull-right">
	  <a href="#logout" data-toggle="modal" class="btn btn-default btn-flat"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
	</div>
  </li>
</ul>
</li>

<?php $version = '
	<span class="info-box-icon"><img src="../dist/img/chatana-user.png" class="#img-circle" alt="Chatana"></span>
	<div class="info-box-content">
		<span class="info-box-text">Chatana</span>
		<span class="info-box-number">V1.0</span>
		<span class="info-box-text">Jii Saaduddin</span>
		<span class="info-box-text">jisaaduddin@abfiph.com</span>
	</div>'
	?>