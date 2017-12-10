	<?php
	include"vt_check_session.php";


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
					<label for="pass" class="control-label col-sm-3">ENTER PASSWORD <span style="color:red;">*</span></label>
					<div class="col-sm-3">
						<input id="pass" type="password" name="pass" required>
					</div>
					<br><br>

					<label for="pass" class="control-label col-sm-3">RE-ENTER PASSWORD <span style="color:red;">*</span></label>
					<div class="col-sm-3">
						<input id="pass" type="password" name="passnew" required>
					</div>
					
					<br><br>

					<button id="but2" class="btn btn-lg btn-outline-primary btn-block" name="sub" type="submit">Submit</button>
					<br><br>

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


		$password = $_POST['pass'];
		$passwordre = $_POST['passnew'];
		$uname = $_SESSION['user'];
		if($password!=$passwordre)
		{
			echo ' <script type="text/javascript">
			alert("Your Retyped Password Doesn\'t Match!!!! Please Try again.");
		</script>
		';
	}
	else{
		$encrypt = md5($password);
		$query1 = "update pdetails set password = '$encrypt' where username = '$uname'";
		if(mysqli_query($link,$query1))
		{

			echo ' <script type="text/javascript">
			alert("Password Has Been Changed Successfully");
		</script>
		';

	}
	else{
		echo ' <script type="text/javascript">
		alert("ERROR!!!!!");
	</script>
	';
}
}

}


?>