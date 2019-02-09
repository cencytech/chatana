<?php
class _jiiMags_ {
 public function imags_dir(){
	$this->img_humens();
 }

 private function img_humens(){
	echo "human";
 }

 private function img_thingy(){
	echo "things";
 }

}

$imgObject = new _jiiMags_();


$imgObject->imags_dir();
?>