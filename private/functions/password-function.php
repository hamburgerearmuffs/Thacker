<?php





class Password {
    public function process($id,$password,$type) {

    	$db = Database::getInstance();
		$c = $db->getc();
        
        $timer = time();

        if ($type == 'old') {
			$sq = $c->query("SELECT * FROM ptemp WHERE request_id = '$id'");
			if ($sq->num_rows > 0) {
				if($c->query("UPDATE ptemp SET password='$password',verify=null WHERE request_id = '$id'")){
					$msg = array('upload' => true);
					printf(json_encode($msg));
				}
			}
        }else {

			if($c->query("INSERT INTO ptemp (request_id,password,verify,timer)VALUES('$id','$password',null,'$timer')")){
		        $msg = array('upload' => true);
				printf(json_encode($msg));
			}

    	}
    }
}
