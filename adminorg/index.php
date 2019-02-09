<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('../pages/header-main.php'); ?>

    <!-- Main content -->
<section class="content">
	<!--div class="box box-default alert alert-primary alert-dismissible">
		<div>
			<button type="button" class="pull-right btn btn-danger btn-sm" data-dismiss="alert" aria-hidden="true"><span class="fa fa-remove"></span></button>
		</div>
		<h4><i class="icon fa fa-bullhorn fa-lg"></i> Announcement&nbsp;&nbsp;<a href="#announcement" data-toggle="modal" style="color:#000;"><span class="fa fa-plus"></span></a>	</h4>
		< ?php 
			$query = mysqli_query($conn,"select * from `broadcast_meta` order by 1 desc limit 3");
			while($row=mysqli_fetch_array($query)){
			?>
			<center><p class="fa-lg"><em><?php echo $row['messagetoday']; ?>&nbsp;<a href="#announcement_edit" data-toggle="modal" style="color:#000;"><span class="fa fa-pencil"></span></a>	</em></p> <h5 class="pull-right">- Admin</h5>
			
		< ?php } ?>
		< ?php include "modal.php" ?>
	</div-->

<h2>Hi, <strong class="box box-success"><?php echo $fname ?></strong></h2>
		<h4>At Glance</h4>
		<div class="#row">
			<?php include "dashboard.php" ?>
		</div>
	</div>
</div>


</section>

<?php include('../pages/foobar.php'); ?>