	<?php
session_start();
include"sail_header2.php";
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
			<div id="login_form" class="container">
				
				<div class="form-group">
					<label for="vt">USERNAME <span style="color:red;">*</span></i></label>
					<input id="user" type="text" name="use" required>
				</div>
				<div class="form-group">
					<label for="pass">PASSWORD <span style="color:red;">*</span></label>
					<input id="pass" type="password" name="pass" required>
				</div>
				<div class="form-group">
					<button id="but2" class="btn btn-lg btn-outline-primary btn-block" name="sub" type="submit"><i class="fa fa-sign-in"></i>Login</button><br><br>
				</div>
			</div>
		</form>
	</body>
	</html>
	<?php
	include"dbconnect_sail.php";
	include"sail_footer.php";
	if(isset($_POST['sub']))
	{
		$username = $_POST['use'];
		$password = $_POST['pass'];
		$password = md5($password);
		$query1 = "select * from pdetails";
		$q1 = mysqli_query($link,$query1);
		$flag=0;
		while($row = mysqli_fetch_array($q1))
		{
		if($username==$row[0])
		{
		if($password==$row[1])
		{
		$flag=1;
		break;
	}
	else{
	$flag=0;
	
	}
	}
	else{
	$flag=0;
	
	}

	}
	if($flag==1)
	{
		$_SESSION['vt_login'] = "1";
		$_SESSION['user'] = $username;

	
		header("Location:vt_inside_admin.php");
	}
	else
	{
		$_SESSION['vt_login'] = "0";
		session_destroy();
		echo ' <script type="text/javascript">
		alert("OOPS!!! You have entered an Incorrect Username or Password");
	</script>
	';
	}
	}
