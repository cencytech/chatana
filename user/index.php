<?php include('session.php'); ?>

<?php include('header.php'); ?>

<?php include('../pages/header-main.php'); ?>
  

    <!-- Main content -->
<section class="content">
<div class="box box-danger alert alert-primary alert-dismissible">
<?php $query=mysqli_query($conn,"select * from `broadcast_meta` order by 1 desc limit 1");
while($row=mysqli_fetch_array($query)){
?>
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-bullhorn fa-lg"></i> Announcement</h4>
<center><p class="fa-lg"><em><?php echo $row['messagetoday']; ?></em></p> <h5 class="pull-right">- Author</h5>
<br>
<?php } ?>
</div>
 
		
        <div class="box-header #with-border">
		<h3 class="#box-title">Hola, <strong class="box box-primary"><?php echo $user ?></strong>!</h3>
 
			<?php include "dashboard.php" ?>
 
		</div>
	 
</section>




<?php include('../pages/foobar.php'); ?>