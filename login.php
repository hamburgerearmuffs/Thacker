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

	?>

</head>
<body>
	<style>
		body {
			font-family: Future;
		}
	</style>
	<?php
	$id = '';
	if (isset($_POST['login'])) {
		$cog = new cog();
		$id = $cog->sql_prep($_POST['id']);
		$password = $cog->sql_prep($_POST['password']);
		$query = "SELECT * FROM admin WHERE hd = '$id'";
		$sql = $c->query($query);
		if($sql->num_rows > 0) {
			$exe = $sql->fetch_array();
			if ($exe['password'] == $password) {
				$_SESSION['thacker'] = $exe['hd'];
				$cog->redirect_to("./");
			}
		}else {
			?>
			<script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 7000
                });

                Toast.fire({
                    type: 'error',
                    title: 'Id or password not vaild, please try again!'
                })
            </script>
			<?php
		}
	}

	?>
<nav class="navbar" style="background: #fff;box-shadow: 6px 3px 9px #ddd;">
	<a class="navbar-brand text-dark"  style="font-family: mikafont;" href="#">THacker</a>
	<ul class="nav">
		<li class="nav-item active">
			<!-- a class="nav-link text-dark" onclick="showme('home')" href="javascript:void()"></a> -->
		</li>
	</ul>
</nav>

<div class="container">
	<div class="login"  style="font-family: mikafont;">
		<h1 class="text-muted" style="font-family: newfont;">LOGIN</h1>
		<br>
		<hr>
		<br>
       <div class="body">
       	<form method="post">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white"><i class="fa fa-qrcode" style="font-size: 20px;"></i></span>
                </div>
                <input type="text" class="form-control reg-inps" name="id" placeholder="ID" style="font-size: 14px;" autocomplete="off" value="<?php echo $id; ?>">
            </div>
            <br>
            <div class="input-group" style="margin-bottom: 10px;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white"><i class="fa fa-lock" style="font-size: 20px;"></i></span>
                </div>
                <input type="password" placeholder="Password" name="password" class="form-control reg-inps" style="font-size: 14px;" autocomplete="off">
            </div>

           <br>
            <button type="submit" class="btn hov-bt btn-block mt-3 mb-1" name="login" style="font-family: newfont;border: 1px solid #00a0d31c;color: #00a0d3;">
                    <span class="next-btn">Login</span>
            </button>
        </form>
       </div>
	</div>
</div>


</body>
</html>