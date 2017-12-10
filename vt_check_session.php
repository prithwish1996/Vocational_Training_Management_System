
<?php
session_start();

  if(isset($_SESSION['vt_login'])=="1")
  {
  	include"dbconnect_sail.php";
  	$uname = $_SESSION['user'];
  	if($uname=='Admin')
  	{
  		include"sail_header.php";
  	}
  	else
  	{
  		include"vt_sail_header3.php";
  	}
 }
  else
  	{
  		header("Location:vt_login.php");
  	}
  		?>