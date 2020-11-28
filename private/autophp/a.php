<?php
include '../connect.php';


$db = Database::getInstance();
$c = $db->getc();

$cog = new Cog();

$str = $_GET['q'];

$done = $c->query("SELECT * FROM medicine WHERE med_id LIKE '$str'");
$exe = $done->fetch_array();
$row = $done->num_rows;
if ($row != 0) {
	
}
elseif($row == 0) {

}

?>
