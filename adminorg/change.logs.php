	
<?php include('session.php'); ?>
<?php include('header.php'); ?>
 
<?php include('../pages/header-main.php'); ?>

<section class="content">
   
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box #bg-red">
		<?php echo $version; ?>
	</div> 
	<br>
	<div class="text-center"><i class="fa fa-chevron-down fa-lg"></i></div>
	<br>
</div>
	<h4><strong>Development Update(s) - <small><?php echo date("M d, Y")?></small></strong></h4>
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
		  
          <ul class="timeline">
			<?php $query=mysqli_query($conn,"select * from tbl_changelogs order by id desc");
				while($row=mysqli_fetch_array($query)){
				#$num=mysqli_query($conn,"select * from chat_member where chatroomid='".$row['chatroomid']."'");
				?>
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    <?php echo $row['datetime']?>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-check bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#"><?php echo $row['title']?></a></h3>

                <div class="timeline-body">
                  <?php echo $row['remarks']?>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
          
            
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
			<?php } ?>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 
      <!-- /.row -->

    </section>

<?php include('../pages/foobar.php'); ?>
 