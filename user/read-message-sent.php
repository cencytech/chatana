	
<?php include('session.php'); ?>
<?php include('header.php'); ?>
 
<?php include('../pages/header-main.php'); ?>
<script src="ajax-comment.js"></script>
			<div class="col-sm-12">

			
		<!----comment -->
 
	<?php 
	$result = $connPDO->prepare("SELECT * FROM tbl_posts WHERE id = $_REQUEST[id]");
	$result->execute();
	for($i=0; $post = $result->fetch(); $i++) {
	?>
	<div class="post">
		<div class="box-header #with-border">
			<div class="user-block">
				<img class="img-circle" src="../dist/img/profile.png" alt="User Image">
				<h4 class="title">&nbsp;<?php echo $post['post_title']; ?></h4>
				<span class="description"><small>Posted by <b><?php echo $post['sent_by']; ?></b></small><small class="pull-right"><?php echo $post['post_date']; ?></small></span>
			</div>
			  <!-- /.user-block -->
			<div class="box-tools">
				<a class="btn btn-box-tool" href = "inbox-sent.php"><i class = "fa fa-reply fa-2x"></i></a>
			</div>
		  <!-- /.box-tools -->
		</div>
		<!-- /.box-header -->
		<div class="box-body"> 
			<img onerror="this.src = '<?php if($post['post_photo'] == "../upload/messages/default.jpg"){echo "../upload/messages/".$post['post_photo'];}else{echo "../upload/messages/".$post['post_photo'];}?>'" height = "auto" width = "100%"src="#" />
			<h4 class="category"><?php echo $post['post_remarks']; ?></h4>
		 
		</div>
	<?php } ?>
	

<?php 
 
	$comment_result = $connPDO->prepare("SELECT * FROM comment WHERE post_id = {$_REQUEST['id']} ORDER BY id DESC");
	#$comment_result = $connPDO->prepare("SELECT * FROM comment WHERE post_id = $_SESSION[id]");
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
						<img class="img-circle img-sm" src="../upload/avatar/default.jpg">
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