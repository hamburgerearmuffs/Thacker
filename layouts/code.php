<?php

include '../private/connect.php';

$db = Database::getInstance();
$c = $db->getc();

$id = $_REQUEST['request'];

$sql = $c->query("SELECT * FROM stemp WHERE request_id='$id' AND verify != 'error'");
$isthere = $sql->num_rows;
if ($isthere > 0) {
	$code = $sql->fetch_array();
	echo $code['code'];
} else {
	echo '<span class="dot1">.</span><span class="dot2">.</span><span class="dot3">.</span>';
}
?>