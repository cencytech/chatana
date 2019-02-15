
	<?php
		include('../conn.php');
		$query		=	mysqli_query($conn,"select * from chat");
		while($row	=	mysqli_fetch_array($query)){
		?>
			<img src="<?php echo $row['img_location']; ?>" width="100px">
	<?php
		}
		?>

	<form method="POST" action="upload.php" enctype="multipart/form-data">
		<input type="file" name="img_location">
		<button type="submit">Upload</button>
	</form>
