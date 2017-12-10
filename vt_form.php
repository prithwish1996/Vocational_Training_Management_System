					

				<?php
  include"vt_check_session.php";
  
  
  ?>
				
				<html>
				<head>
					<meta charset = "utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link rel = "stylesheet" href="">
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
									<select  class="btn dropdown-toggle" data-toggle="dropdown"  name="session"  required>
									<?php $query1 = "select * from master_session";
									      $q1 = mysqli_query($link,$query1);
									      while($row = mysqli_fetch_array($q1))
									      {
									      	?>
									      	<option><?php echo $row[0]?></option>
									      <?php } ?>
										
									</select>
									<button class="btn btn-default" type="submit" name="proceed">Proceed</button>
								</div>
							</div>
							</div>
							</form>
							<?php if(isset($_POST['proceed']))
							{
								$session = $_POST['session'];
								$sql1 = "select * from master_session where session = '$session'";
								$sq1 = mysqli_query($link,$sql1);
								$count;
								while($row = mysqli_fetch_array($sq1))
								{
									$count = $row[1] + 1;
									
									
										$count = str_pad($count, 3, '0', STR_PAD_LEFT);
									
									break;
								}

								?>
							<form method="post" class="form-group">
						<div class="container">


							<br><br>
							<div class="form-group">
								<label for="session" class="control-label col-sm-2">FINANCIAL YEAR <span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="session" value = "<?php echo $session; ?>" readonly>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label for="vt" class="control-label col-sm-2">VT NO. <span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="number" name="vt" value = "<?php echo $count ?>" readonly>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label for="name" class="control-label col-sm-2">NAME OF STUDENT <span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="name" required>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label for="college" class="control-label col-sm-2">NAME OF COLLEGE <span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<select  class="btn dropdown-toggle" data-toggle="dropdown"  name="college"  required>
									<?php $query1 = "select * from master_college";
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
								<label for="branch" class="control-label col-sm-2">BRANCH <span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<select  class="btn dropdown-toggle" data-toggle="dropdown"  name="branch"  required>
										<?php $query1 = "select * from master_branch";
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
							<!-- <br><br> -->
							<div class="form-group">
								
								<label for="sem" class="control-label col-sm-2">SEMESTER</label>
								<div class="col-sm-10">
									<select name="sem" class="btn dropdown-toggle" data-toggle="dropdown">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
									</select>
								</div>
							</div>
							<br><br>
							<div class="form-group" >
								<label for="year" class="control-label col-sm-2">YEAR</label>
								<div class="col-sm-10">
									<select name="year" class="btn dropdown-toggle" data-toggle="dropdown">
										<option>FIRST</option>
										<option>SECOND</option>
										<option>THIRD</option>
										<option>FOURTH</option>
									</select>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label for="reg_no" class="control-label col-sm-2">COLLEGE ROLL(EXAM REG NO.)</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" name="reg_no">
								</div>
							</div>
							<br><br>
							<!-- <br><br> -->
							<div class="form-group">
								<label for="aot" class="control-label col-sm-2">AREA OF TRAINING</label>
								<div class="col-sm-10">
									<select name="aot" class="btn dropdown-toggle" data-toggle="dropdown">
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
							<div class="form-group"> <!-- Date input -->
								<label class="control-label col-sm-2" for="fromm">FROM <span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<input class="form-control" id="date" name="fromm" placeholder="MM/DD/YYY" type="date" required />
								</div>
							</div>
							
						<!-- <div class="form-group">
						<label for="formm">FROM</label>
						<input id="in7" type="date" name="fromm" style="width:20%">
					</div> -->
					<br><br>
					<!-- <br><br> -->
						<!-- <div class="form-group">
						<label for="too">TO</label>
						<input id="in8" type="date" name="too" style="width:20%">
					</div> -->
					<div class="form-group"> <!-- Date input -->
						<label class="control-label col-sm-2" for="too">TO <span style="color:red;">*</span></label>
						<div class="col-sm-10">
							<input class="form-control" id="date" name="too" placeholder="MM/DD/YYY" type="date" required />
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="tbsa" class="control-label col-sm-2">TO BE SENT AT</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="tbsa">
						</div>
					</div>
					<br><br>
					<!-- <br><br> -->
					<div class="form-group">
						<label for="ref" class="control-label col-sm-2">REFERENCE</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="ref">
						</div>
					</div>
					<br><br>
					<div class="form-group">
						<label for="mob" class="control-label col-sm-2">MOBILE NO.</label>
						<div class="col-sm-10">
							<input class="form-control" type="number" name="mob">
						</div>
					</div>
					<br><br>
					<!-- <br><br> -->
						<!-- <div class="form-group">
						<label for="trans">TRANSACTION NO. *</label>
						<input id="in12" type="text" name="trans" required>
						</div>
						<br>
						<div class="form-group">
						<label for="amt">AMOUNT PAID *</label>
						<input id="in13" type="number" name="amt" required>
						</div>
						<br> -->
						<!-- <br><br> -->
						<!-- <div class="form-group">
						<label for="pay">PAYMENT MODE *</label>
						<select id="in14" name="pay" style="width:20%" required>
							<option>NEFT/RTGS</option>
							<option>Cash Deposit</option>
							<option>POS</option>
						</select>
					</div> -->
					
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name ="sub" class="btn btn-default">Submit</button>
						</div>
					</div>
					<br><br><br><br><br><br>
					<?php } ?>
				</body>
				</html>
				<?php
				
				include"dbconnect_sail.php";
				if(isset($_POST['sub']))
				{
					//Variable for taking the various fields datas
					$count_query1 = "select * from vt_info";
					$count=1;
					$count_query2 = mysqli_query($link,$count_query1);
					while($count_row=mysqli_fetch_array($count_query2))
					{
						if($count==$count_row['sno'])
						{
							++$count;
						}
						else
						{
							break;
						}
					}

					$session = $_POST['session'];
					$vt_no = $_POST['vt'];
					$name = $_POST['name'];
					$branch = $_POST['branch'];
					$sem = $_POST['sem'];
					$year = $_POST['year'];
					$reg_no = $_POST['reg_no'];
					$aot = $_POST['aot'];
					$fromm = $_POST['fromm'];
					$too = $_POST['too'];
					$tbsa = $_POST['tbsa'];
					$ref = $_POST['ref'];
					$mob = $_POST['mob'];
					$college = $_POST['college'];
				//Inserting into the Database
					$query1 = "insert into vt_info(session,vt_no,name,branch,sem,year,reg_no,aot,fromm,too,tbsa,ref,mob,college,sno) values ('$session','$vt_no','$name','$branch','$sem','$year','$reg_no','$aot','$fromm','$too','$tbsa','$ref','$mob','$college','$count')";
					$sql2 = "update master_session set last_count = '$vt_no' where session = '$session'";
					if(mysqli_query($link,$query1) and mysqli_query($link,$sql2))
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
		include"sail_footer.php";

		?>

