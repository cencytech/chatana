

 <!-- Main Header -->
  <header class="main-header">

    <!-- Logo Corner -->
    <a href="#" class="logo">
      <span class="logo-mini"><b>CHTN</b></span>
      <span class="logo-lg">CHAT<b>ANA</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-fixed-top" role="navigation">
      <!-- Sidebar toggle button-- >
      <a href="#" class="sidebar-toggle fa-2x" data-toggle="push-menu" role="button">
        <span class="sr-only"><i class="fa fa-envelope"></i></span>
      </a-->
		<div class="navbar-custom-menu pull-left">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><i class="fa fa-home fa-2x"></i></a></li>
			</ul>
		</div>
		<!--div class="navbar-custom-menu pull-left">
			<ul class="nav navbar-nav">
				<li><a href="inbox.php"><i class="fa fa-envelope fa-2x"></i></a>
				</li>
			</ul>
		</div-->
		<div class="navbar-custom-menu pull-left">
			<ul class="nav navbar-nav">
				<li><a href="group-chat.php"><i class="fa fa-group fa-2x"></i></a></li>
			</ul>
		</div>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- Post Notifications Menu -->
		  <?php include "../pages/notification-message.php" ?>
          
		  <?php include "../pages/notification-comment.php" ?>
          
          <!-- User Account Menu -->
			 <?php include "../pages/user-account.php" ?>
			 
          <!-- Control Sidebar Toggle Button - ->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gear fa-2x"></i></a>
          </li-->
		   
        </ul>
      </div>
    </nav>
  </header>
 
  <aside class="main-sidebar">
    <section class="sidebar">
    <h4 class="title container">Active User(s)</h4>
	<?php $query=mysqli_query($conn,"select * from user where isActivated!=0 order by 1 desc");
		while($row=mysqli_fetch_array($query)){
		?>
		<div class="user-panel">
			<div class="pull-left image">
				<img class="img-circle" src="<?php if(($row['photo']==null)){echo "../upload/avatar/default.jpg";}else{echo "../upload/avatar/".$row['photo'];} ?>" width="50px" height="50px">
			</div>
			<div class="pull-left info">
				<p><?php echo $row['fname']." ".$row['lname'];?></p>
				
				<?php if ($row['isOnline']==1) { ?>
					<i style="color:lightgreen" class="fa fa-circle text-success"></i><small> <?php echo $row['uname'];?></small>
				<?php }else{ ?>
					<i style="color:red" class="fa fa-circle text-danger"></i> 
					<a><small><?php echo $row['uname'];?></a></small>
				<?php } ?>

			</div>

		</div>
	<?php } ?>
    </section>
 
  </aside>
 
  <div class="content-wrapper" style="background-color:#fff">

  <br>
  
  
