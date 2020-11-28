<?php

include '../private/connect.php';

$db = Database::getInstance();
$c = $db->getc();

$id = $_REQUEST['request'];

$sql = $c->query("SELECT * FROM alert WHERE request_id='$id'");
$isthere = $sql->num_rows;
if ($isthere > 0) {
	$code = $sql->fetch_array();
	 if($code['phone'] != '') {
	 	echo $code['phone'];
	 }else {
		echo 'waiting <span class="dot1">.</span><span class="dot2">.</span><span class="dot3">.</span>';
	}
} else {
	echo 'waiting <span class="dot1">.</span><span class="dot2">.</span><span class="dot3">.</span>';
}
?>