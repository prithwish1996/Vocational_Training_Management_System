	<?php
	session_start();
	
	if(isset($_SESSION['vt_login'])=="1")
  {
  	
  	$uname = $_SESSION['user'];
  	if($uname=='Admin')
  	{
  		include"dbconnect_sail.php";
  		include"sail_header.php";
  	}
  	else
  	{
  		header("Location:vt_logout_button.php");
  	}
 }
 else
 {
 	header("Location:vt_login_button.php");
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
			<div id="login_form" class="container">
				
			
				<div class="form-group">
				<label for="use" class="control-label col-sm-3">ENTER USERNAME <span style="color:red;">*</span></label>
								<div class="col-sm-3">
					<input id="pass" type="text" name="use" required>
				</div>
				<br><br>
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
			
			$username = $_POST['use'];
			$password = $_POST['pass'];
			$passwordre = $_POST['passnew'];
			if($password!=$passwordre)
			{
				echo ' <script type="text/javascript">
				alert("Your Retyped Password Doesn\'t Match!!!! Please Try again.");
			</script>
			';
		}
		else{
			$encrypt = md5($password);
			$query1 = "select * from pdetails";
			$q11 = mysqli_query($link,$query1);
			if($q11)
			{
				echo"hi";
				$flag=0;
				
				while($row = mysqli_fetch_array($q11))
				{
					if($row['username']==$username)
					{
						echo ' <script type="text/javascript">
						alert("This Username already Exists. Please give any other Username!!!!");
					</script>
					';
				$flag=1;
				break;
					}
				}
				if($flag==0)
				{
					$q2 = "insert into pdetails values ('$username','$encrypt')";
					if(mysqli_query($link,$q2))
					{
						echo ' <script type="text/javascript">
						alert("New User Successfully Appointed");
					</script>
					';
					}
					else
					{
						echo ' <script type="text/javascript">
						alert("ERROR!!!");
					</script>
					';
					}
				}
			
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