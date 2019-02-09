<?php 
session_start();

if(isset($_POST['submit']))
{

	include_once "chatrefresh/mysql_connect.php";

	$message = $_POST['message'];
	$sender = $_POST['sender'];
	mysql_query("INSERT INTO message(message, sender)VALUES('$message', '$sender')");
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<script language="javascript" src="chatrefresh/jquery-1.2.6.min.js"></script>
<script language="javascript" src="chatrefresh/jquery.timers-1.0.0.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".refresh").everyTime(1000,function(i){
			j.ajax({
			  url: "chatrefresh/refresh.php",
			  cache: false,
			  success: function(html){
				j(".refresh").html(html);
			  }
			})
		})
		
	});
	j(document).ready(function() {
			j('#post_button').click(function() {
				$text = $('#post_text').val();
				j.ajax({
					type: "POST",
					cache: false,
					url: "chatrefresh/save.php",
					data: "text="+$text,
					success: function(data) {
						alert('data has been stored to database');
					}
				});
			});
		});
   j('.refresh').css({color:"green"});
});
</script> 

	<form method="POST" name="" action="">
		<input name="sender" type="text" id="texta" value="User"/>
		<div class="refresh">
			<?php 
				include_once "mysql_connect.php";
				$result = mysql_query("SELECT * FROM message ORDER BY id DESC");

				while($row = mysql_fetch_array($result))
				  {
				  echo '<p>'.'<span>'.$row['sender'].'</span>'. '&nbsp;&nbsp;' . $row['message'].'</p>';
				  }

				mysql_close($con);
				?>
		</div>
		<input name="message" type="text" id="textb"/>
		<input name="submit" type="submit" value="Send" id="post_button" />
	</form>
 
