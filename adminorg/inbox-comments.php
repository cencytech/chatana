
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
				<?php $query=mysqli_query($conn,"select * from comment left join tbl_posts on tbl_posts.id = comment.post_id order by 1 desc");
					while($row=mysqli_fetch_array($query)){
					#$num=mysqli_query($conn,"select * from tbl_posts where id='".$row['id']."'");
					$comment_count = mysqli_num_rows($query);
					$postId = $row['post_id'];
					$pId = $row['id'];
					?>
                <tr>
				
					<td>
					<a href="read-message.php?id=<?php echo $pId?>">
					<span class="badge bg-red"><?php echo $row['date']; ?></span>
					<br>Someone has commented on <strong><?php echo $row['name']; ?></strong> post <?php echo $row['post_title']; ?>.
					
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