<?php




$sql = $c->query("SELECT * FROM accounts WHERE Hacked = 1");

if ($sql->num_rows == 0) {
	?>
	<center>
		<div style="margin-top: 15%;font-size: 23px;color: grey"> <i class="fa fa-warning"></i>   No Accounts</div>
	</center>
	<?php
}else {
				// <th>Password</th>
	$no = 1;
	$cog = new cog();
	echo "	<div class='container mt-4'>
		<table class='table table-striped table-hover'>
			<tr>
				<th>No</th>
				<th>Request</th>
				<th>Phone</th>
				<th>Date</th>
			</tr>
		";
	while ($exe = $sql->fetch_array()) {
	    ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $exe['request_id']; ?></td>
			<td><?php echo $exe['phone']; ?></td>
			<!-- <td><?php echo $exe['password']; ?></td> -->
			<td><?php echo $cog->time_ago($exe['timer']); ?></td>
		</tr>

	    <?php
	}
	echo "</table>
		</div>";
}


?>