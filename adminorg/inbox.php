	
<?php include('session.php'); ?>
<?php include('header.php'); ?>
 
<?php include('../pages/header-main.php'); ?>
 
	<style>
		#myBtn { 
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
 
	 <a id="myBtn" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus fa-lg"></i></a>
  
	 
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
							<a href="inbox-sent.php"><h3 class="box-title text-center"><i class="fa fa-folder-o fa-2x"></i><br><small>My Folder</small></h3></a>
						&nbsp;</div>
						<div class="pull-right label label-default">
						&nbsp;
							<a href="inbox.php"><h3 class="box-title text-center"><i class="fa fa-inbox fa-2x"></i><br><small>My Inbox</small></h3></a>
						&nbsp;</div>
					</div>
		<?php $query=mysqli_query($conn,"select * from tbl_posts where sent_by!='$user' order by 1 desc");
			while($row=mysqli_fetch_array($query)){
			?>
			<!-- Start feeds content -->
			<a href="read-message.php?id=<?php echo $row['id']?>" class="btn-lg">
				<div class="attachment-block clearfix">
					<img class="attachment-img #img-circle" src ="<?php if($row['post_photo'] == null ){echo "../upload/messages/default.jpg";}else{echo "../upload/messages/".$row['post_photo'];}?>" width = "100%"/>

					<div class="attachment-pushed">
						<h4 class="attachment-heading">
							<strong style="text-transform:uppercase"><?php echo $row['post_title']?></strong>
						</h4>
						<div class="attachment-text">
							<small>Sent by <?php echo $row['sent_by'];?>
							<br>Sent on <?php echo $row['post_date'];?></small>
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
					<?php include "add_post_reply.php" ?>
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