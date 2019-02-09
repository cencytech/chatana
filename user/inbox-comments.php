
<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('../pages/header-main.php'); ?>


 <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Notifications</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
					<th>Notifications</th>
                </tr>
		<!-- Main content -->
				<?php $query=mysqli_query($conn,"select * from comment left join tbl_posts on tbl_posts.id = comment.post_id where send_to = '$user' ");
					while($row=mysqli_fetch_array($query)){
					#$num=mysqli_query($conn,"select * from tbl_posts where id='".$row['id']."'");
					$comment_count = mysqli_num_rows($query);
					$postId = $row['post_id'];
					$pId = $row['id'];
					?>
                <tr>
				
					<td>
					<a href="read-message.php?id=<?php echo $pId?>">
					Someone has commented on your post <strong><?php echo $row['post_title']; ?></strong>.
					<span class="pull-right badge bg-red"><?php echo $row['date']; ?></span>
					
					</a>
					</td>
				
                </tr></a>
				<?php } ?>
              </table>
            </div>
   
		</div>
          <!-- /.box -->
 
          <!-- /.box -->
        </div>
		
		
<!-- REQUIRED JS SCRIPTS -->
<?php include "../pages/foobar.php" ?>