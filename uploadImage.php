<?php
$target_dir ="images/aaweni";
$image = $_POST["image"];
$folder = $_POST["folder"];

if (!file_exists($target_dir)){
	mkdir($target_dir,0777, true);
}

$generated_name = $folder."/".rand()."_".time().".jpeg";
$target_dir = $target_dir."/".$generated_name;
if (file_put_contents($target_dir, base64_decode($image))){
	echo $generated_name;
}else{
	echo "error while uploading image";
}

?>