<?php include "header.php" ?>

<script type="text/javascript">
	$(document).ready(function(){
		var chatanajs = jQuery.noConflict();
		chatanajs(document).ready(function()
		{
			chatanajs(".StartTextToDisplay").everyTime(1000,function(i){
				chatanajs.ajax({
				  url: "../admin/text.php",
				  cache: false,
				  success: function(html){
					chatanajs(".StartTextToDisplay").html(html);
				  }
				})
			})
		});
	});
</script>

<div class="StartTextToDisplay"></div>