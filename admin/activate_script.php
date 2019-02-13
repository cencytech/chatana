
<?php

include_once "../conn.php";
 
$userid = $_REQUEST['userid'];
$isActivated = $_POST['isActivated'];

$activate = "UPDATE user SET isActivated ='$isActivated' WHERE userid = '$userid' ";

$connPDO->exec($activate);
echo "<script>window.location='control-panel.php'</script>";
?>
 