	<?php
	session_start();
	
	if(isset($_SESSION['vt_login'])=="1")
	{
		header("Location:vt_inside_admin.php");
    //echo $_SESSION['vt_login'];

	}
	else{
		
		header("Location:vt_home.php");
	}
	?>