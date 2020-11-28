<?php

include '../private/connect.php';

$db = Database::getInstance();
$c = $db->getc();

$id = $_REQUEST['request'];

$sql = $c->query("SELECT * FROM alert WHERE request_id='$id'");
$isthere = $sql->num_rows;
if ($isthere > 0) {
	$cog = new cog();
	$code = $sql->fetch_array();
	echo $cog->time_ago($code['timer']);
} else {
	echo 'Unknown Time';
}
?>