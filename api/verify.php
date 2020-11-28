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
	$sql = $c->query("SELECT * FROM password WHERE request_id='$id'");
	
	if($sql->num_rows == 0) {
		$msg = array('code' => NULL,'password' => NULL);
		printf(json_encode($msg));
	}else {
		$exe = $sql->fetch_array();
		if($exe['code'] == null) {
			$msg = array('code' => NULL,'password' => NULL);
			printf(json_encode($msg));
		}
		elseif ($exe['code']) {	
			$result = ($exe['password'] == 'yes') ? 'YES' : 'NO';
			$msg = array('code' => true,'password' => $result);
			printf(json_encode($msg));
		} else {
			$msg = array('code' => false,'password' => NULL);
			printf(json_encode($msg));
		}
	}
}
?>