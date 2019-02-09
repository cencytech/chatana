<?php require_once('../conn.php');
	if (isset($_POST['ChangePhoto'])) 
	{
		move_uploaded_file($_FILES["photolink"]["tmp_name"],"../upload/avatar/" . $_FILES["photolink"]["name"]);			
		$photo = $_FILES["photolink"]["name"];
		
		$id = $_REQUEST["id"];
		
		$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE `user` set photo='$photo' WHERE userid='$id'";

		$connPDO->exec($sql);
	?>
	<script>window.location='myprofile.php?id=<?php echo $id ?>'</script>
	<?php 
	}
	?>