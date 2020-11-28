<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
include '../private/connect.php';

$db = Database::getInstance();
$c = $db->getc();

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = $c->query("SELECT * FROM ptemp WHERE request_id='$id'");
	
	if($sql->num_rows == 0) {
		$msg = array('password' => NULL);
		printf(json_encode($msg));
	}else {
		$exe = $sql->fetch_array();
		if($exe['verify'] == NULL) {
			$msg = array('password' => NULL);
			printf(json_encode($msg));
		}
		elseif ($exe['verify'] == 'valid') {	
			$msg = array('password' => true);
			printf(json_encode($msg));
		} else {
			$msg = array('password' => false);
			printf(json_encode($msg));
		}
	}
}
?>