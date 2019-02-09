	
<?php include('session.php'); ?>
<?php include('header.php'); ?>
 
<?php include('../pages/header-main.php'); ?>
<script src="ajax-comment.js"></script>
<div class="col-sm-12">

<!----comment -->
 
<?php $result = $connPDO->prepare("SELECT * FROM tbl_posts WHERE id = $_REQUEST[id]");
	
	$result->execute();
	
	for($i=0; $post = $result->fetch(); $i++) {

	?>
		<div class="post">
			<div class="box-header #with-border">
				<div class="user-block">
					<h3 class="title"><?php echo $post['post_title']; ?><a class="pull-right btn btn-box-tool" href = "inbox.php"><i class = "fa fa-reply fa-2x"></i></a></h3>
					<span>Posted by <b><?php echo $post['sent_by']; ?></b></span>
					<span class="pull-right"><?php echo $post['post_date']; ?></span>
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
				<img onerror="this.src = '<?php if($post['post_photo'] == null){echo "../upload/messages/".$post['post_photo'];}else{echo "../upload/messages/".$post['post_photo'];}?>'" height = "auto" width = "100%"src="#" />
				<h4 class="category"><?php echo $post['post_remarks']; ?></h4>
			</div>
		<?php } ?>

<?php 
	$id = $_REQUEST['id'];
	$comment_result = $connPDO->prepare("SELECT * FROM comment WHERE post_id = $id  ORDER BY id DESC");
	$comment_result->execute();
	?>
 
	<h3>Your Comments </h3>
		<div class="comment-block">
	
	<?php for($i=0; $comment = $comment_result->fetch(); $i++) { ?>
	
	<div class="comment-item">
		
		<div class="comment-post">
		
			<div class="box-footer box-comments">
				<div class="box-comment">
					<div class="box-comment">
							
							<?php $accid3 = $_SESSION['id'];
							$qUser3=mysqli_query($conn,"select photo from `user` where userid='$accid3'");
							while($qu3=mysqli_fetch_array($qUser3)) { ?>
							<img class="img-circle" src="<?php if(($qu3['photo']==null)){echo "../upload/avatar/default.jpg";}else{echo "../upload/avatar/".$qu3['photo'];} ?>" width="50px" height="50px">
							<?php } ?>
							
						<div class="comment-text">
							<span class="username"><a style="cursor:pointer"><?php echo $comment['name']?></a>
								<span class="text-muted pull-right">x</span>
							</span>
							<?php echo $comment['comment']?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<?php } ?>

	</div>
	<div class="box-footer">
		<form id="form" method="post">
			<div class="input-group">
				<input type="hidden" name="postid" value="<?php echo $_REQUEST['id']?>">
				<input type="hidden" name="name" id="comment-name" value="<?php echo $user ?>">
				
				<input name="comment" id="comment" rows="3" class="form-control" placeholder="Type your comment..." maxlength="100" required>
				<span class="input-group-btn">
					<input type="submit" id="submit" value="Comment" class="btn btn-primary btn-flat pull-right">
				</div>
			</div>
		</form>
	</div>
	<!--- end comment -->
				
				
            </div>
		</div>
	</div>

<!-- REQUIRED JS SCRIPTS -->
<?php include "../pages/foobar.php" ?>