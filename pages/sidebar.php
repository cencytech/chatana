 
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
<?php $id = $_SESSION['id'];
	
	$qUser=mysqli_query($conn,"select photo from `user` where userid='$id'");
	
	while($qu=mysqli_fetch_array($qUser)) {
	
	?>
	<img class="img-circle" src="<?php if(($qu['photo']==null)){echo "../upload/avatar/default.jpg";}else{echo "../upload/avatar/".$qu['photo'];} ?>" width="50px" height="50px">
	<?php } ?>
        </div>
        <div class="pull-left info">
          <p>Username</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> 
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#fff">