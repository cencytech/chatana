<?php
class Conn1 {
 public function PDOConnector(){
	$this->prepareComments();
 }

 private function prepareComments(){
	#require "conn.php";
	$id = $_REQUEST['id'];
	#$comment_result = $conn->prepare("SELECT * FROM comment ORDER BY id DESC");
	$comment_result = $connPDO->prepare("SELECT * FROM comment WHERE post_id = $id  ORDER BY id DESC");
	$comment_result->execute();
 }
}

?>