

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file1" id="file1">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM chat");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = '../upload/chat'.$row["file1"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>