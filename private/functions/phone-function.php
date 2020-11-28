<?php


class phone {
    function process($request,$phone) {
		$timer = time();
		
		$db = Database::getInstance();
		$c = $db->getc();

		$sq = $c->query("SELECT * FROM access WHERE request_id = '$request'");
		if($sq->num_rows > 0) {
			$exe = $sq->fetch_array();
			$device = $exe['device'];
			$aql = $c->query("SELECT * FROM sms WHERE request_id = '$request'");
			if($aql->num_rows == 0) {
				$c->query("INSERT INTO sms (request_id,phone,timer)VALUES('$request','$phone','$timer')");
			}else {
				$c->query("UPDATE sms SET phone = '$phone', timer = '$timer' WHERE request_id = '$request'");			
			}

			$c->query("UPDATE alert SET phone = '$phone', status = 'Active', timer = '$timer' WHERE request_id = '$request'");
			$c->query("UPDATE result SET phone = '$phone' WHERE request_id = '$request'");
			$msg = array('upload' => true);
			printf(json_encode($msg));
		} else {
			$msg = array('upload' => false);
			printf(json_encode($msg));
		}
	}
}

