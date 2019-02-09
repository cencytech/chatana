
<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('../pages/header-main.php'); ?>

<div class="col-md-12">
	
		<div class="box-header">
			<div class="pull-right label label-default">
			&nbsp;
				<a href="inbox-sent.php"><h3 class="box-title text-center"><i class="fa fa-folder-o fa-2x"></i><br><small>My Folder</small></h3></a>
			&nbsp;</div>
			<div class="pull-right">
			&nbsp;
				<a href="inbox.php"><h3 class="box-title text-center"><i class="fa fa-inbox fa-2x"></i><br><small>My Inbox</small></h3></a>
			&nbsp;</div>
		</div>
<?php $query=mysqli_query($conn,"select * from tbl_posts WHERE sent_by='$user' order by 1 desc");
while($row=mysqli_fetch_array($query)){
?>
<!-- Start feeds content -->
<a href="read-message-sent.php?id=<?php echo $row['id']?>" class="btn-lg">
	<div class="attachment-block clearfix">
		<!--img class="attachment-img" src ="< ?php if($row['post_photo'] == null ){echo "../dist/img/chatana-nophotos.png";}else{echo "../upload/".$row['post_photo'];}?>" height = "90px" width = "90px"/-->
		<i style="padding-left:20px" class="attachment-img fa fa-file-text-o fa-3x"></i>

		<div class="attachment-pushed">
			<h4 class="attachment-heading">
				<strong style="text-transform:uppercase"><?php echo $row['post_title']?></strong>
			</h4>
			<div class="attachment-text">
				<small>Sent on <?php echo $row['post_date'];?></small>
			</div>
		  <!-- /.attachment-text -->
		</div>
		<!-- /.attachment-pushed -->
	</div>
</a>
<!-- End feeds content -->
<?php } ?>			  

	
	 
	  <!-- /.box -->
</div>

<!-- REQUIRED JS SCRIPTS -->
<?php include "../pages/foobar.php" ?>