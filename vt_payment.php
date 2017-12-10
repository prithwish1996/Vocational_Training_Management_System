	<?php
  include"vt_check_session.php";
  
  
  ?>
	<html>
	<head>
		
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" href="vt_form2.css">
		<link rel = "stylesheet" href="css/bootstrap.min.css">
		<script rel = "stylesheet" href="js/bootstrap.min.js"></script>
	</head>
	<body>

		
		<form method="post" class="form-group">
		<div class="container">
		<br><br>
		<div class="form-group">

								<label for="session" class="control-label col-sm-2">FINANCIAL YEAR <span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<select  class="btn dropdown-toggle" data-toggle="dropdown"  name="session" required>
									<?php $query1 = "select * from master_session";
									      $q1 = mysqli_query($link,$query1);
									      while($row = mysqli_fetch_array($q1))
									      {
									      	?>
									      	<option><?php echo $row[0]?></option>
									      <?php } ?>
										
									</select>
									</div>
									</div>
									<br><br>
			
				
				<div class="form-group">
					<label for="vt" class="control-label col-sm-2">VT NO. <span style="color:red;">*</span></label>
					<div class="col-sm-10">
						<div class="input-group">
							<input class="form-control" type="number" name="vt" required><span class="input-group-btn">
							<button class="btn btn-default" type="submit" name="check">Proceed</button>
						</span>
					</div>
				</div>
			</div>
			<br>
			
		</div>
	</form>
	
	
	
</body>
</html>
<?php

	include"dbconnect_sail.php";

if(isset($_POST['check']))
{ //Taking the Inputs. This Part is for checking the validity of VT NO's.
	$vt_no = $_POST['vt'];
	$session = $_POST['session'];
	$query2 = "select * from vt_info where vt_no = '$vt_no' and session='$session'";

	$q2 = mysqli_query($link,$query2);
	$q22 = mysqli_num_rows($q2);
	if($q22==0)
	{
		echo ' <script type="text/javascript">
		alert("This VT NO. is not Registered Yet!!! Please Register it First.");
	</script>
	';
}
else{
	
	while($row = mysqli_fetch_array($q2))
	{
		if($row[12]==0)
		{
			echo ' <script type="text/javascript">
			alert("Payment is NOT made for this VT NO.");
		</script>
		';

		?>
       <form method="post" class="form-group">
		<div class="container">
			<br><br>
			<div class="form-group">

								<label for="session" class="control-label col-sm-2">FINANCIAL YEAR <span style="color:red;">*</span></label>
								<div class="col-sm-10">
								
									<select  class="btn dropdown-toggle" data-toggle="dropdown"  name="session"  disabled>
									
									<?php $query1 = "select * from master_session";
									      $q1 = mysqli_query($link,$query1);
									      while($row = mysqli_fetch_array($q1))
									      {
									      	?>
									      	<option <?php if($session==$row[0]) echo ' selected="selected" ';  ?> <?php echo $session; ?>><?php echo $row[0]?></option>

									      <?php 
									  } 
									      ?>
									      <input type="hidden" name="session" value="<?php echo $session;?>">

										
									</select>
									</div>
									</div>
									<br><br>
			<div class="form-group">
				<label for="vt" class="control-label col-sm-2">VT NO. <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" type="number" name="vt" value = "<?php echo $vt_no; ?>" readonly>
				</div>
			</div>
			
			<br><br>
			
			<div class="form-group">
				<label for="amt" class="control-label col-sm-2">AMOUNT PAID <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" type="number" name="amt" required>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label for="pay" class="control-label col-sm-2">PAYMENT MODE <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<select class="btn dropdown-toggle" data-toggle="dropdown" name="pay" required>
						<option>NEFT/RTGS</option>
						<option>Cash Deposit to Account</option>
						<option>POS</option>
					</select>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label for="nod" class="control-label col-sm-2">NAME OF DEPOSITOR <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="nod" required>
				</div>
			</div>
			<br><br>
			<!-- <br><br> -->
			<div class="form-group">
				<label for="ban" class="control-label col-sm-2">BANK ACCOUNT NO. (if available)</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="ban">
				</div>
			</div>
			<br><br>
			<div class="form-group"> <!-- Date input -->
				<label class="control-label col-sm-2" for="dop">DATE OF PAYMENT <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" id="date" name="dop" placeholder="MM/DD/YYY" type="date" required />
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label for="trans" class="control-label col-sm-2">TRANSACTION NO. <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="trans" required>
				</div>
			</div>
			<br><br>
			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name ="sub" class="btn btn-default">Submit</button>
				</div>
			</div>
			<br><br>
			<br><br>
		</div>
	</form>
	<?php 
	}
	else{
		echo ' <script type="text/javascript">
		alert("Payment has ALREADY been made for this VT NO.");
	</script>
	';
}
}
}

}
	if(isset($_POST['sub']))
	{ 
		//This part is for taking the input and inserting it into the database.
		$session = $_POST['session'];
		$vt_no = $_POST['vt'];
		$amt = $_POST['amt'];
		$pay = $_POST['pay'];
		$nod = $_POST['nod'];
		$ban = $_POST['ban'];
		$dop = $_POST['dop'];
		$trans = $_POST['trans'];
		$vt_no = $_POST['vt'];
		$query2 = "select * from vt_info where vt_no = '$vt_no'";

		$q2 = mysqli_query($link,$query2);
		$q22 = mysqli_num_rows($q2);
		if($q22==0)
		{
			echo ' <script type="text/javascript">
			alert("This VT NO. is not Registered Yet!!! Please Register it First.");
		</script>
		';
	}
	else{
		
		while($row = mysqli_fetch_array($q2))
		{
			if($row[12]==0)
			{
				$query1 = "update vt_info set amt='$amt',pay ='$pay',name_of_depositor='$nod',acc_no='$ban',date_of_pay='$dop',trans='$trans' where vt_no = '$vt_no' and session='$session'";
				if(mysqli_query($link,$query1))
				{
					echo ' <script type="text/javascript">
					alert("Details are Inserted Successfully!!!!");
				</script>
				';
			}
			else{
				echo ' <script type="text/javascript">
				alert("Error in Insertion!!!!");
			</script>
			';
		}
	}
	else{
		echo ' <script type="text/javascript">
		alert("Payment has ALREADY been made for this VT NO.");
	</script>
	';
}
}
}


}


include"sail_footer.php";
?>

