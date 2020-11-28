<?php



class access {



	function process($device,$app,$version) {
		$timer = time();
		$request = uniqid();

		$db = Database::getInstance();
		$c = $db->getc();

		if($c->query("INSERT INTO access (request_id,device,timer)VALUES('$request','$device','$timer')")){
			$c->query("INSERT INTO alert (request_id,phone_type,timer)VALUES('$request','$device','$timer')");
			$c->query("INSERT INTO result (request_id,status,timer)VALUES('$request',0,'$timer')");
			$papp = $c->query("SELECT * FROM app WHERE app_name = '$app'");
			if ($papp->num_rows > 0) {
				$pra = $papp->fetch_array();
				$counter = $pra['counter'] + 1;
			}else {
				$counter = 1;
			}
			if ($papp->num_rows == 0) {
				$c->query("INSERT INTO app (app_name,counter,timer)VALUES('$app','$counter','$timer')");
			}else {
				$c->query("UPDATE app SET counter = '$counter' , timer = '$timer' WHERE app_name = '$app'");
			}
			$c->query("INSERT INTO platform (request_id,app,version,timer)VALUES('$request','$app','$version','$timer')");

			$msg = array('id' => $request);
			printf(json_encode($msg));
		}
	}
    



}


?>