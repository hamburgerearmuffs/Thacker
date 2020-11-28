<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	include 'includes/style.php';
	include 'includes/script.php';
	include 'private/connect.php';
	$db = Database::getInstance();
	$c = $db->getc();
	$cog = new cog();
	if (!isset($_SESSION['thacker'])) {
		$cog->redirect_to('login');
	}
	$sq = $c->query("SELECT * FROM admin WHERE hd = '".$_SESSION['thacker']."'");
	if ($sq->num_rows == 0) {
		$cog->redirect_to('login');
	}
	?>

</head>
<body>
<div class="headp">
<nav class="navbar" style="background: #fff;box-shadow: 6px 3px 9px #ddd;">
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
			$sq = $c->query("SELECT * FROM alert WHERE status='Active'");
			if ($sq->num_rows > 0) {
		?>
		<li class="nav-item" style="margin-top: auto;margin-bottom: auto;">
			<a class="nav-link text-danger" onclick="showme('alert')" href="javascript:void()"><i class="fa fa-bullseye"></i> Alert</a>
		</li>
		<?php
			}
		?>
	</ul>
</nav>
</div>

<div class="body">
<?php include 'layouts/home.php'; ?>
</div>

</body>
</html>