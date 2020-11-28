<?php
$alert = $c->query("SELECT * FROM alert");
$a_row = $alert->num_rows;

if($a_row > 0) {
?>
<div class="container" style="padding-left: 0px !important;padding-right: 0px !important;">
	<div class="alert-table">
		<table class="table table-bordered table-inverse table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Device</th>
				<th>Phone</th>
				<th>App</th>
				<th>Version</th>
				<th>Result</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($zip = $alert->fetch_array()) {

				$plat = $c->query("SELECT * FROM platform WHERE request_id = '".$zip['request_id']."'");
				$plaz = $plat->fetch_array();

				$id = $zip['request_id'];
				$device = $zip['phone_type'];
				$phone = $zip['phone'];
				$app = ucwords($plaz['app']);
				$version = $plaz['version'];
				$result = $zip['result'];
				$cog = new cog();
				$date = $cog->time_ago($zip['timer']);
			?>
			<tr>
				<td><?php echo $id; ?></td>
				<td><?php echo $device; ?></td>
				<td><?php echo $phone; ?></td>
				<td><?php echo $app; ?></td>
				<td><?php echo $version; ?></td>
				<td><?php echo $result; ?></td>
				<td><?php echo $date; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
		</table>
		<button class="card-link btn btn-outline-danger float-right mr-3" onclick="showme('home')"><i class="fa fa-arrow-left "></i> Back</button>
		<button class="card-link btn btn-outline-danger float-right mr-3" onclick="showme('all_alert')"><i class="fa fa-refresh "></i> Refresh</button>
	</div>
</div>
<?php
}else {
?>
	<center><h5 class="text-muted">no result</h5></center>
<?php
}
?>