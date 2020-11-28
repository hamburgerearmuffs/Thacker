<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");
include '../private/connect.php';


if (isset($_GET['device'])) {

	$cog = new cog();
	$device = $cog->u($_GET['device']);
	$platform = $cog->u($_GET['app']);
	$ver = $cog->u($_GET['version']);

	$access = new access();

	$access->process($device,$platform,$ver);
}


?>