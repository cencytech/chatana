<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('../pages/header-main.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="#content-wrapper">

<!-- Main content -->
	<section class="content container-fluid">
		<div class="col-md-12">
		
		<?php #require_once 'mysqli.php';
			$s_query = $conn->query("SELECT * FROM `user` WHERE `access`!=1 ORDER BY 1 DESC") or die(mysqli_error($conn));
			while($s_fetch = $s_query->fetch_array()){	
			$userid = $s_fetch['userid'];
			?>					
			<div class="form-group">
			 
				<ul class="control-sidebar-menu">
					<li> 
						<i class="menu-icon fa fa-user-o bg-green"></i>
						
						<div class="menu-info">
							<h2><?php echo $s_fetch['uname']?> <i class="fa fa-mobile fa-lg"></i></h2>
							<h4><?php echo $s_fetch['email']?></h4>
							
								<span class="pull-right">
									<?php if($s_fetch['isActivated']!=1) { ?>
										<form action="activate_script.php?userid=<?=$userid?>" method="post" >
											<input type="hidden" name="isActivated" value="1">
											<button type="submit" class="btn btn-success"><i class="fa fa-check fa-2x"></i></button>
										</form>
									<?php } else { ?>
										<?php if($s_fetch['access']=="admin") { ?>
											<form action="activate_script.php?userid=<?=$userid?>" method="post" >
												<input type="hidden" name="isActivated" value="0">
												<button type="submit" class="btn btn-danger"><i class="fa fa-remove fa-2x"></i></button>
											</form>
										<?php } else { ?>
											<form action="activate_script.php?userid=<?=$userid?>" method="post" >
												<input type="hidden" name="isActivated" value="0">
												<button type="submit" class="btn btn-danger"><i class="fa fa-remove fa-2x"></i></button>
											</form>
										<?php } ?>
									<?php } ?>
								</span>
							
								<?php if($s_fetch['isActivated']==0) { ?>
									<span class="box box-warning">Status: <i class="fa fa-question-circle"></i> submit for review</span>
								<?php } else { ?>
									<span class="box box-success">Status: <i class="fa fa-check"></i> activated</span> 
								<?php } ?>
						</div> 
					</li>
					<hr>
				</ul>
			<?php } ?>	
			</div>
			   
			  <!-- /.box -->
		</div>

	</section>
<!-- /.content -->
</div>

<!-- REQUIRED JS SCRIPTS -->
<?php include "../pages/foobar.php" ?>