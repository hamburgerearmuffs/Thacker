<?php
include "../private/connect.php";

$db = Database::getInstance();
$c = $db->getc();

if (isset($_GET['fol'])) {
	$to = $_GET['fol'];
	switch ($to) {
		case 'home':
			include 'home.php';
			break;
		case 'account':
			include 'accounts.php';
			break;
		case 'history':
			include 'history.php';
			break;
		case 'alert':
			include 'alert.php';
			break;
		case 'all_hacked':
			include 'detail/hacked.php';
			break;
		case 'all_alert':
			include 'detail/alert.php';
			break;
		case 'all_history':
			include 'detail/history.php';
			break;
		case 'all_sms':
			include 'detail/sms.php';
			break;
		case 'all_app':
			include 'detail/app.php';
			break;
		case 'all_access':
			include 'detail/access.php';
			break;

		default:
			echo 'error';
			break;
	}
}
?>