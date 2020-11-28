<?php


require_once("private/connect.php");  
?>
<?php
$cog = new cog();
if(!isset($_SESSION['thacker']))
{
	$cog->redirect_to("./");
}
if(isset($_SESSION['thacker']) == "")
{
	$cog->redirect_to("./");
}

if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['thacker']);
	$cog->redirect_to("./");
}
?>