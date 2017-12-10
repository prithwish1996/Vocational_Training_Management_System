
<?php
include"dbconnect_sail.php";
include"sail_header2.php";
if(isset($_POST['admin']))
{
	echo'<script>window.open("vt_login.php","_self");</script>';
}
if(isset($_POST['guest']))
{
	echo'<script>window.open("vt_form_view2.php","_self");</script>';
}
?>
<html>
<head>
	
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "stylesheet" href="vt_form.css">
	<link rel = "stylesheet" href="css/bootstrap.min.css">
	<script rel = "stylesheet" href="js/bootstrap.min.js"></script>
</head>
<body>
	<form method="post" class="form-group">
		<div id="but1class" class="container">
			<button id="but1" class="btn btn-lg btn-outline-primary btn-block" name="admin" type="submit"><i class="fa fa-sign-in"></i> User Login</button><br><br>
			<button id="but1" class="btn btn-lg btn-outline-primary btn-block" name="guest" type="submit"><i class="fa fa-sign-in"></i> Guest Login</button><br><br><br><br>
		</div>
	</form>
</body>
</html>
<?php
include"sail_footer.php";
?>