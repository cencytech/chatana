
<?php

	require_once('../conn.php');
	if (isset($_POST['Submit'])) 
	{
		move_uploaded_file($_FILES["photolink"]["tmp_name"],"uploads/" . $_FILES["photolink"]["name"]);			
		$photo = $_FILES["photolink"]["name"];
		
		$id = $_POST['userid'];
		
		$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO user (userid, photo)
		VALUES ('', '$photo')";

		$connPDO->exec($sql);
		echo "<script>window.location='index.php'</script>";
	}
?>