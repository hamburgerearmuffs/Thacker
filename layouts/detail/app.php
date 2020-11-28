<?php
$platform = $c->query("SELECT * FROM app ORDER BY counter DESC");
$plat_row = $platform->num_rows;

$app = $c->query("SELECT * FROM platform ORDER BY app");
$app_row = $app->num_rows;

if($plat_row > 0) {
?>
<div class="container" style="padding-left: 0px !important;padding-right: 0px !important;">
	<div class="platform-table">
		<table class="table table-bordered table-inverse table-hover">
			<thead>
				<tr>
					<th>App</th>
					<th>Counter</th>
					<th>Useage Percent</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<?php	
				while ($zip = $platform->fetch_array()) {
				$id = ucwords($zip['app_name']);
				$counter = $zip['counter'];
				$percent =round(($zip['counter'] * 100) / $app_row);
				$cog = new cog();
				$date = $cog->time_ago($zip['timer']);
				?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $counter; ?></td>
					<td>
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style='width: <?php echo $percent; ?>%; font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";' aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemin="100"><?php echo $percent."%"; ?></div>
						</div>
					<td><?php echo $date; ?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<button class="card-link btn btn-outline-primary float-right mr-3" onclick="showme('home')"><i class="fa fa-arrow-left "></i> Back</button>
		<button class="card-link btn btn-outline-primary float-right mr-3" onclick="showme('all_app')"><i class="fa fa-refresh "></i> Refresh</button>
	</div>
</div>
<?php
}else {
?>
	<center><h5 class="text-muted">no result</h5></center>
<?php
}
?>