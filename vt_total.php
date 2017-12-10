					

<?php
include"vt_check_session.php";


?>
<html>
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" href="vt_form2.css">
	<link rel = "stylesheet" href="css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script rel = "stylesheet" href="js/bootstrap.min.js"></script>
</head>
<body>
	<form method="post" class="form-group">
		<div class="container">
			<br><br>

			<!-- <br><br> -->
			<div class="form-group">
				<label for="session" class="control-label col-sm-2">FINANCIAL YEAR</label>
				<div class="col-sm-10">
					<select  class="btn dropdown-toggle" data-toggle="dropdown"  name="session" >
						<option value="none"> -- Select an Option -- </option>
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
					<label for="aot" class="control-label col-sm-2">AREA OF TRAINING</label>
					<div class="col-sm-10">
						<select name="aot" class="btn dropdown-toggle" data-toggle="dropdown" required>
							<option value="none"> -- Select an Option -- </option>
							<?php $query1 = "select * from master_aot";
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
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name ="sub" class="btn btn-default">Submit</button>
						</div>
					</div>
					<br><br><br><br><br><br>
				</body>
				</html>
				<?php
				
				include"dbconnect_sail.php";
				if(isset($_POST['sub']))
				{
					//Variable for taking the various fields datas
					
					$session = $_POST['session'];
					$aot = $_POST['aot'];
					
					$i=1;
					if($session!="none")
					{
						$cond1 = "session = '$session'";

						$condfinal = $cond1;
						++$i;
					}
					if($aot!="none")
					{
						$cond2 = "aot = '$aot'";
						if($i>1)
						{
							$cond2 = $cond2.' and '.$condfinal;
							
						}
						$condfinal = $cond2;
						++$i;
					}
					
				//Inserting into the Database
					$total = 0;
					if($i>1)
					{
						$query1 = "select amt from vt_info where $condfinal";
					}
					else
					{
						$query1 = "select amt from vt_info";
					}
					$q1 = mysqli_query($link,$query1);
					if($q1)
					{
						while($row = mysqli_fetch_array($q1))
						{
							$total = $total + $row['amt']; 
						}
						if($i>1)
						{
							if($session=="none" and $aot!="none")
							{
								echo "<blockquote class='blockquote'><p class='mb-0'>Total Amount Collected from ".$aot." for all Financial Year is <i class='fa fa-inr'></i> ".$total."</p></blockquote>";
							}
							else if($session!="none" and $aot=="none")
							{
								echo "<blockquote class='blockquote'><p class='mb-0'>Total Amount Collected from ".$session." for all Areas is <i class='fa fa-inr'></i> ".$total."</p></blockquote>";
							}
							else
							{
								echo "<blockquote class='blockquote'><p class='mb-0'>Total Amount Collected from ".$session." for ".$aot." is <i class='fa fa-inr'></i> ".$total."</p></blockquote>";
							}
						}
						else
						{
							echo "<blockquote class='blockquote'><p class='mb-0'>Total Amount Collected from all Financial Years and all Areas is <i class='fa fa-inr'></i> ".$total."</p></blockquote>";
						}
					}
					else{
						echo ' <script type="text/javascript">
						alert("Error!!!!");
					</script>
					';
				}

			}
			include"sail_footer.php";

			?>

