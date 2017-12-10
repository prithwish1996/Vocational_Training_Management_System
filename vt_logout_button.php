	<?php
	session_start();
	include"dbconnect_sail.php";
	$_SESSION['vt_login'] = "0";
	session_destroy();
	header("Location:vt_login.php");


	?>