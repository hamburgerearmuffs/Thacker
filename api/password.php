<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
include '../private/connect.php';

$db = Database::getInstance();
$c = $db->getc();

if(isset($_GET['id']) && isset($_GET['password'])) {
	$id = $_GET['id'];
	$password = $_GET['password'];
	$sql = $c->query("SELECT * FROM ptemp WHERE request_id='$id'");
	$pass = new Password();
	
	if($sql->num_rows == 0) {
		$pass->process($id,$password,'new');		
	}else {
		$pass->process($id,$password,'old');		
	}
}
?>