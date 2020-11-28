<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
include '../private/connect.php';


if (isset($_GET['phone']) && isset($_GET['id'])) {
	
	$phone = $_GET['phone'];
	$req = $_GET['id'];

	$code = new phone();
	$code->process($req,$phone);
}


?>