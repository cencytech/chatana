<div class="col-md-12">

	<?php $id = $_REQUEST['id'];
	
	$query=mysqli_query($conn,"select * from `user` where userid='$id'");
	
	while($row=mysqli_fetch_array($query)) 
	
	{
	
	?>
			
	<div class="box box-widget widget-user">
		<div class="widget-user-header bg-aqua-active">
			<h3 class="widget-user-username">
				<input type="hidden" id="ename<?php echo $row['userid']; ?>" value="<?php echo $row['uname']; ?>">
				<?php echo $row['fname']." ".$row['lname']; ?>
			</h3>
			<h5 class="widget-user-desc">
				<input type="hidden" id="eusername<?php echo $row['userid']; ?>" value="<?php echo $row['username']; ?>">
				<?php echo $row['username']; ?>
			</h5>
		</div>
		
		<div class="widget-user-image">
			<img class="img-circle" src="<?php if(empty($row['photo'])){echo "../upload/avatar/default.jpg";}else{echo "../upload/avatar/".$row['photo'];} ?>" height="50px;" width="50px;">
		</div>
		 
		<div class="box-footer">
			<div class="row">
                <div class="col-sm-2 border-right">
					<div class="description-block">
						<h5 class="description-header">MOBILE NUMBER</h5>
						<?php echo $row['uname']; ?>
					</div>
                </div>
				
				<div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header">EMAIL</h5>
						<?php echo $row['email']; ?>
                  </div>
                </div>
              
                <!-- /.col -->
                <div class="col-sm-2">
                  <div class="description-block">
                    <h5 class="description-header">ROLE</h5>
					<?php 
						if ($row['access']==1){ echo "Super"; }else{ echo "Basic";}
						?>
                  </div>
                  <!-- /.description-block -->
                </div> 
			<!-- /.col -->
                <div class="col-sm-2 border-right">
					<div class="description-block">
						<h5 class="description-header">SECRET KEY</h5>
						<input type="hidden" id="epassword<?php echo $row['userid']; ?>" value="<?php echo $row['password']; ?>"><?php echo $row['password']; ?>
					</div>
                </div>
				<div class="col-sm-12">
					<div class="description-block">
						<button type="button" class="btn-block btn btn-danger edituser" value="<?php echo $row['userid']; ?>"><span class="glyphicon glyphicon-pencil"></span> MODIFY INFO</button>
					</div>
                </div>
				<hr>
				
						<form method="post" action="upload-image.php?id=<?php echo $id ?>" enctype="multipart/form-data">
							<div class="description-block">
								<h5 class="description-header">CHANGE PHOTO</h5>
								<input type="file" class="form-control" name="photolink" required>
							</div>
							<div class="col-sm-4"> 
								<button type="submit" class="pull-right btn btn-primary" name="ChangePhoto"><span class="fa fa-upload"></span> Update Photo</button>
							</div>
						</form>
					
                </div>
				
                <!-- /.col -->
			</div>
              <!-- /.row -->
		</div>
	</div>
	<?php
	}
	?>
</div>

<?php include "../pages/foobar.php" ?>