<style>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: block;
 
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  
}
.custom-text {
	font-weight: 700;
	text-align: center;
	font-size:18px;
}
</style>


		
<form action="add_postScriptReply.php" method = "POST" enctype = "multipart/form-data">
		<div id = "preview" style="text-align:center">
			<img id="lblReply" width="90%" height="90%"/>
		</div>
		
		<div class="upload-btn-wrapper form-group">
			<button class="btn btn-default btn-lg btn-block btn-wide"><i class="fa fa-camera fa-lg"></i></button>
			<input type='file' accept="image/*" onchange="loadFileReply(event)" name = "image" />

			<script>
			  var loadFileReply = function(event) {
				var output = document.getElementById('lblReply');
				output.src = URL.createObjectURL(event.target.files[0]);
			  };
			</script>

		</div>

		<div class = "form-group"> 
			<input type = "hidden" class = "form-control" name = "post_id" value="<?php echo $_SESSION['id']?>"  readonly Required />
		</div>

		<!--div class = "form-group"> 
			<input type = "hidden" class = "form-control" name = "post_id" value="f< ?php 
				$prefix= md5(time()*rand(1, 9)); echo strip_tags(substr($prefix ,0,5));?>"  readonly Required />
		</div-->

		<div class = "form-group">
			<input type = "text" maxlength="50" class = "custom-text form-control"  name = "post_title" placeholder = "Enter title" required = "required"/>
		</div>

		<div class = "form-group">
			<textarea type = "text" maxlength="155" class = "custom-text form-control"  name = "post_remarks" placeholder = "Compose message here (155 char.)" required = "required" /></textarea>
		</div> 

		<input type = "hidden" class = "form-control"  name = "post_date"  value="<?php echo date('m/d/Y')?>"  required = "required"/>
		<!--input type = "hidden" class = "form-control"  name = "post_by"  value="aisuy@abfiph.com"  required = "required"/-->
		<input type = "hidden" name = "sent_by"  value="<?php echo $user ?>" readonly />
		
		<label>Send To:</label>
		<div class = "form-group">			
		
			<select class = "custom-text form-control"  name = "send_to" required = "required" style="width:100%" />
			<?php $query=mysqli_query($conn,"select * from user where isActivated!=0 order by 1 desc");
				while($row=mysqli_fetch_array($query)){
				?>
				<option class="custom-text" value="<?=$row['username']?>"><?=$row['fname']." ".$row['lname']?></option>
				<?php
					}
					?>
			</select>
		</div>
		
		<div class = "form-group">
			<button class = "btn btn-primary btn-lg pull-right btn-wide" name = "add_post"><i class="fa fa-send fa-lg"></i></button>
			<button type="reset" class = "btn btn-default btn-lg pull-left btn-wide">Reset</button>
			<!--a href = "inbox.php" class = "btn btn-danger btn-lg pull-left btn-wide"><i class="fa fa-chevron-left fa-lg"></i></a-->
		</div>
</form>	


<script src="jquery-3.1.1.js"></script>
<script type = "text/javascript">
$(document).ready(function(){

$pic = $('<img id = "image" width = "100%" height = "100%"/>');

$lblReply = $('<center id = "lblReply">[Photo]</center>');

$("#photo").change(function(){
	$("#lblReply").remove();
		
		var files = !!this.files ? this.files : [];

		if(!files.length || !window.FileReader){
			$("#image").remove();
			$lblReply.appendTo("#preview");
		}

		if(/^image/.test(files[0].type)){
		var reader = new FileReader();
		reader.readAsDataURL(files[0]);
			reader.onloadend = function(){
				$pic.appendTo("#preview");
				$("#image").attr("src", this.result);
			}
	}
	});
});
</script>
