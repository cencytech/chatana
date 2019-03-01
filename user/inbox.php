	
<?php include('session.php'); ?>

<?php include('header.php'); ?>
 
<?php include('../pages/header-main.php'); ?>
 
	<style>
		#myBtn { 
		  position: fixed;
		  bottom: 100px;
		  right: 30px;
		  z-index: 99;
		  font-size: 18px;
		  border: none;
		  outline: none; 
		  cursor: pointer;
		  padding: 15px; 
		}
		#myBtn1 { 
		  position: fixed;
		  bottom: 20px;
		  right: 30px;
		  z-index: 99;
		  font-size: 18px;
		  border: none;
		  outline: none; 
		  cursor: pointer;
		  padding: 15px; 
		}
	</style>
 
	 <a id="myBtn" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus fa-lg"></i></a>
  
	 
	<script> // When the user scrolls down 20px from the top of the document, show the button
	window.onload = function() {scrollFunction()};

	function scrollFunction() {
		document.getElementById("myBtn").style.display = "block";
	}
	</script>
  
		
			<div class="col-md-12">

					<div class="box-header"> 
						<div class="pull-right">
						&nbsp;
							<a href="inbox-sent.php"><h3 class="box-title text-center text-danger"><i class="fa fa-folder-o fa-2x"></i><br><small>My Folder</small></h3></a>
						&nbsp;</div>
						<div class="pull-right label label-default">
						&nbsp;
							<a href="inbox.php"><h3 class="box-title text-center text-danger"><i class="fa fa-inbox fa-2x"></i><br><small>My Inbox</small></h3></a>
						&nbsp;</div>
					</div>
		<?php $queryz=mysqli_query($conn,"select * from tbl_posts WHERE send_to = '$email_user' order by 1 desc");
			while($row=mysqli_fetch_array($queryz)){
		?>
			<!-- Start feeds content -->
 
			<a href="read-message.php?id=<?php echo $row['id']?>" class="btn-lg">
				<div class="attachment-block clearfix">
					<img class="attachment-img #img-circle" src ="<?php if(empty($row['post_photo']) ){echo "../upload/messages/default.jpg";}else{echo "../upload/messages/".$row['post_photo'];}?>" width = "100px"/>

					<div class="attachment-pushed">
						<h4 class="attachment-heading">
							<strong style="text-transform:uppercase"><?php echo $row['post_title']?><small class="pull-right"><?php echo $row['post_date'];?></small></strong>
						</h4>
						<div class="attachment-text">
							<small>Sent by <?php echo $row['sent_by'];?></small>
						</div>
					  <!-- /.attachment-text -->
					</div>
					<!-- /.attachment-pushed -->
				</div>
			</a>
			<!-- End feeds content -->
			<?php } ?>			  

	<!-- Start Admin Compose -->
	<div class="modal #fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Compose Message</h4>
				</div>
				<div class="modal-body">
					<?php include "add_post.php" ?>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div><!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
	<!-- End Admin Compose -->
 
 
				  <!-- /.box -->
			</div>
 
<!-- REQUIRED JS SCRIPTS -->
<?php include "../pages/foobar.php" ?>