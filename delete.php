<?php
include 'db.php';
$user = $_GET['user'];

$db = new db_connect;
$stmt = $db->deleteAProduct('product',$user);
if($stmt){
	header('location: update.php');
}else{
	echo 'Error in deleting the selected column';
}


?>