<?php
$sms = $c->query("SELECT * FROM sms");
$sro = $sms->num_rows;

if($sro > 0) {
?>
<div class="container" style="padding-left: 0px !important;padding-right: 0px !important;">
	<div class="sms-table">
		<table class="table table-bordered table-inverse table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Phone</th>
					<th>Code</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($zip = $sms->fetch_array()) {
				$id = $zip['request_id'];
				$phone = $zip['phone'];
				$code = ($zip['code'] != '') ? $zip['code'] : "<span class='w-100 text-center'> -</span> ";
				$code_style = ($zip['code'] == '') ? 'text-center' : "text-left";
				$cog = new cog();
				$date = $cog->time_ago($zip['timer']);
				?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $phone; ?></td>
					<td class="<?php echo $code_style; ?>"><?php echo $code; ?></td>
					<td><?php echo $date; ?></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<button class="card-link btn btn-outline-warning float-right mr-3" onclick="showme('home')"><i class="fa fa-arrow-left "></i> Back</button>
		<button class="card-link btn btn-outline-warning float-right mr-3" onclick="showme('all_sms')"><i class="fa fa-refresh "></i> Refresh</button>
	</div>
</div>
<?php
}else {
?>
	<center><h5 class="text-muted">no result</h5></center>
<?php
}
?>