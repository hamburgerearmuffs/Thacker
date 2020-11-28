<?php
$access = $c->query("SELECT * FROM access");
$as_row = $access->num_rows;

if($as_row > 0) {
?>
<div class="container" style="padding-left: 0px !important;padding-right: 0px !important;">
	<div class="access-table">
		<table class="table table-bordered table-inverse table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Device</th>
					<th>App</th>
					<th>Version</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($zip = $access->fetch_array()) {
				$id = $zip['request_id'];
				$device = ucwords($zip['device']);
				$pla = $c->query("SELECT * FROM platform WHERE request_id = '".$zip['request_id']."'");
				$plaw = $pla->fetch_array();
				$app = ucwords($plaw['app']);
				$ver = $plaw['version'];
				$cog = new cog();
				$date = $cog->time_ago($zip['timer']);
				?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $device; ?></td>
					<td><?php echo $app; ?></td>
					<td><?php echo $ver; ?></td>
					<td><?php echo $date; ?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<button class="card-link btn btn-outline-secondary float-right mr-3" onclick="showme('home')"><i class="fa fa-arrow-left "></i> Back</button>
		<button class="card-link btn btn-outline-secondary float-right mr-3" onclick="showme('all_access')"><i class="fa fa-refresh "></i> Refresh</button>
	</div>
</div>
<?php
}else {
?>
	<center><h5 class="text-muted">no result</h5></center>
<?php
}
?>