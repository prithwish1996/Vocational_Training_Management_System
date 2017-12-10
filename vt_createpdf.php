<?php
session_start();
//This part of the code is for generating the certificate of the students those who have fulfilled the criterias.
include"sail_header.php";
if(isset($_SESSION['vt_login'])=="1")
	{
		include"dbconnect_sail.php";
		

	}
	else{
		
	header("Location:vt_login.php");
	}
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
	<!-- <input type="submit" name="logout" value="Logout"> -->
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

									
								</div>
							</div>
	
			<br><br>
			<div class="form-group">
				<label for="vt" class="control-label col-sm-2">VT NO. <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<div class="input-group">
						<input class="form-control" type="number" name="vt" required><span class="input-group-btn">
						<button class="btn btn-default" type="submit" name="view">View</button>
					</span>
				</div>
			</div>
		</div>
		<br>
		<!-- <input id="in15" type="submit" name="check" value="Check"> -->
	</div>
</form>
<?php
if(isset($_POST['view']))
{
	//This is for viewing the details. Here it will show the details whose vt no. is already been registered.
	$vt = $_POST['vt'];
	$session = $_POST['session'];
	$query1 = "select * from vt_info where vt_no = '$vt' and session='$session'";
	$q1 = mysqli_query($link,$query1);
	if(mysqli_num_rows($q1)==0)
	{
		echo ' <script type="text/javascript">
		alert("This VT NO. is not Registered Yet!!! Please Register it First.");
	</script>
	';
}
else
{  //Here immediate change can be done of the details for generating the certificate. Here if the candidate has not cleared 	the dues then their certificate won't be generated. The due field is disabled so you have to go to edit page to edit 		that part.
	$date = date('Y-m-d');
	while($row = mysqli_fetch_array($q1))
		{?>
	<form method="post" action = "vt_createpdf.php" class="form-group">
		<div class="container">
			<br><br>
			<div class="form-group">
				<label for="vt" class="control-label col-sm-2">FINANCIAL YEAR  <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="session" value = "<?php echo $row[29]; ?>" readonly>
				</div>
			</div>
			<br><br>
			<div class="form-group">
				<label for="vt" class="control-label col-sm-2">VT NO.  <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" type="number" name="vt" value = "<?php echo $row[0]; ?>" readonly>
				</div>
			</div>



			<br><br>


			<br><br>
			<div class="form-group">
				<label for="name" class="control-label col-sm-2">NAME OF STUDENT <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="name" value = "<?php echo $row[1]; ?>" required>
				</div>
			</div>


			<br><br>


			<div class="form-group">
				<label for="college" class="control-label col-sm-2">NAME OF COLLEGE <span style="color:red;">*</span></label>
				<div class="col-sm-10">
					<input class="form-control" type="text" name="college" value = "<?php echo $row[19]; ?>" required>
				</div>
			</div>


			<br><br>


			<div class="form-group">
				<label for="aot" class="control-label col-sm-2">AREA OF TRAINING</label>
				<div class="col-sm-10">
					<select  class="btn dropdown-toggle" data-toggle="dropdown" name="aot[]" style="width:100%" value='<?php $aot = $row[6] ;
									?>'>
									<?php $query2 = "select * from master_aot";
									$q2 = mysqli_query($link,$query2);
									while($row1 = mysqli_fetch_array($q2))
									{ 
										?>
										<option <?php if($aot==$row1[0])echo ' selected="selected" ';  ?> <?php echo $aot; ?>><?php echo $row1[0]; ?></option>
										<?php } ?></select>
			</div>
		</div>
		<br><br>



		<div class="form-group"> <!-- Date input -->
			<label class="control-label col-sm-2" for="fromm">FROM <span style="color:red;">*</span></label>
			<div class="col-sm-10">
				<input class="form-control"  name="fromm" placeholder="MM/DD/YYY" type="date" value = "<?php echo $row[7]; ?>" required />
			</div>
		</div>
		<br><br>
		<div class="form-group"> <!-- Date input -->
			<label class="control-label col-sm-2" for="too">TO <span style="color:red;">*</span></label>
			<div class="col-sm-10">
				<input class="form-control"  name="too" placeholder="MM/DD/YYY" type="date" value = "<?php echo $row[8]; ?>" required />
			</div>
		</div>
		<br><br>
		<div class="form-group"> <!-- Date input -->
			<label class="control-label col-sm-2" for="pt">PROJECT TITLE <span style="color:red;">*</span></label>
			<div class="col-sm-10">
				<input class="form-control" id="date" name="pt" value = "<?php echo $row[18]; ?>" type="text" required />
			</div>
		</div>
		<br><br>

		<div class="form-group">
			<label for="eval" class="control-label col-sm-2">OVERALL EVALUATION<span style="color:red;">*</span></label>
			<div class="col-sm-10" >
				<select  name="eval" value='<?php $eval = $row[21] ;
				echo $eval ; ?>' class="btn dropdown-toggle" data-toggle="dropdown" required>
				<option <?php if($eval=='Excellent') echo ' selected="selected" ';  ?> <?php echo $eval; ?>>Excellent</option>
				<option <?php if($eval=='Good') echo ' selected="selected" ';  ?> <?php echo $eval; ?>>Good</option>
				<option <?php if($eval=='Average') echo ' selected="selected" ';  ?> <?php echo $eval; ?>>Average</option>
			</select>
		</div>
	</div>
	<br><br>


	<div class="form-group"> <!-- Date input -->
		<label class="control-label col-sm-2" for="mo">MARKS OBTAINED (out of 100) <span style="color:red;">*</span></label>
		<div class="col-sm-10">
			<input class="form-control" id="date" name="mo" type="number" value = "<?php echo $row[22]; ?>" required />
		</div>
	</div>
	<br><br>

	<div class="form-group">
		<label for="att" class="control-label col-sm-2">FULL ATTENDANCE  </label>
		<div class="col-sm-10">
			<select  name="att" value='<?php $att = $row[24] ;
			echo $att ; ?>' class="btn dropdown-toggle" data-toggle="dropdown">
			<option <?php if($att=='Yes') echo ' selected="selected" ';  ?> <?php echo $att; ?>>Yes</option>
			<option <?php if($att=='No') echo ' selected="selected" ';  ?> <?php echo $att; ?>>No</option>
		</select>
	</div>
</div>
<br><br>
<div class="form-group">
	<label for="dues" class="control-label col-sm-2">ANY DUES <span style="color:red;">*</span></label>
	<div class="col-sm-10" >
		<select  name="dues" value='<?php $amt = $row[12] ;
		if($amt=="0")
			$dues="Yes";
		else
			$dues="No"; 
		echo $dues ; ?>' class="btn dropdown-toggle" data-toggle="dropdown" disabled>
		<option <?php if($dues=='No') echo ' selected="selected" ';  ?> <?php echo $dues; ?>>No</option>
		<option <?php if($dues=='Yes') echo ' selected="selected" ';  ?> <?php echo $dues; ?> >Yes</option>
		
	</select>
	<input type="hidden" name="dues" value='<?php $amt = $row[12] ;
	if($amt=="0")
		$dues="Yes";
	else
		$dues="No"; 
	echo $dues ; ?>' />
</div>
</div>
<br><br>
<div class="form-group">
	<label for="official" class="control-label col-sm-2">NAME OF OFFICIAL <span style="color:red;">*</span></label>
	<div class="col-sm-10">
		<input class="form-control" type="text" name="official" value = "<?php echo $row[26]; ?>" required>
	</div>
</div>
<br><br>
<div class="form-group">
	<label for="designation" class="control-label col-sm-2">DESIGNATION <span style="color:red;">*</span></label>
	<div class="col-sm-10">
		<input class="form-control" type="text" name="designation" value = "<?php echo $row[27]; ?>" required>
	</div>
</div>
<br><br>
<div class="form-group"> <!-- Date input -->
	<label class="control-label col-sm-2" for="date_cert">DATE OF PUBLISHING CERTIFICATE <span style="color:red;">*</span></label>
	<div class="col-sm-10">
		<input class="form-control" id="date_cert" name="date_cert" placeholder="MM/DD/YYY" value = "<?php echo $date; ?>" type="date" required />
	</div>
</div>
<br><br>
<div class="form-group"> <!-- Date input -->
	<label class="control-label col-sm-2" for="times">NO. OF TIMES THE CERTIFICATE PRINTED <span style="color:red;">*</span></label>
	<div class="col-sm-10">
		<input class="form-control" id="date" name="times" value = "<?php echo $row[28]; ?>" type="number" readonly />
	</div>
</div>
<br><br>

<br><br><br>
<div class="form-group">
	<label for="wd">WORK DONE(a small description) </label>
	<input class="form-control input-lg" id="inputlg" type="text" name = "wd" value = "<?php echo $row[20]; ?>" >
</div>
<br><br>
<div class="form-group">
	<label for="rem">SPACE FOR REMARKS(if any) </label>
	<input class="form-control input-lg" name = "rem" id="inputlg" value = "<?php echo $row[23]; ?>" type="text">
</div>
<br><br>
<div class="form-group">        
	<div class="col-sm-10">
		<button type="submit" name ="print" class="btn btn-default"><span class="glyphicon glyphicon-print"></span>Print Certificate</button>
	</div>
</div>
<br><br><br><br><br><br>
</div>
</form>
<br><br>


<?php }	
}
}

if(isset($_POST['print']))
{
	$session = $_POST['session'];
	$vt = $_POST['vt'];
	$name = $_POST['name'];
	$college = $_POST['college'];
	$aot = $_POST['aot'];
	$fromm = $_POST['fromm'];
	$too = $_POST['too'];
	$pt = $_POST['pt'];
	$eval = $_POST['eval'];
	$mo = $_POST['mo'];
	$att = $_POST['att'];
	$dues = $_POST['dues'];
	$official = $_POST['official'];
	$designation = $_POST['designation'];
	$wd = $_POST['wd'];
	$rem = $_POST['rem'];
	$date_cert = $_POST['date_cert'];
	$month_fromm = strtotime(''.$fromm.'');
	$month_too = strtotime(''.$too.'');
	$month_cert = strtotime(''.$date_cert.'');
	$cert_print = $_POST['times'];

	//$m = date('F', $month);
	$mf = date('F',$month_fromm);
	$df = date('d',$month_fromm);
	$yf = date('Y',$month_fromm);
	$mt = date('F', $month_too);
	$dt = date('d',$month_too);
	$yt = date('Y',$month_too);
	$mc = date('F',$month_cert);
	$dc = date('d',$month_cert);
	$yc = date('Y',$month_cert);
	$session_too = $too;
	//$session_fromm = $too-1;
	$month_session_too = strtotime(''.$session_too.'');
	$mst = date('Y',$month_session_too);
	$mst = $mst - 1;
	$mstt = date('y',$month_session_too);
	//$t = date('Y M', $too);
	
	if($dues=="Yes")
	{
		echo ' <script type="text/javascript">
		alert("This VT NO. has not cleared the dues so Certificate CAN\'T be printed. Please clear the dues in Edit Payment Page.");
	</script>
	';	
}
else
{
	$cert_print = $cert_print + 1;
	$query2 = "update vt_info set project_title = '$pt',evaluation = '$eval', marks = '$mo',full_attendance='$att',  work_done='$wd', remarks='$rem', certificate_print='$cert_print' where vt_no='$vt'";
	$query3 = "update vt_info set official='$official', designation='$designation'";
	if(mysqli_query($link,$query2) and mysqli_query($link,$query3))
	{
		echo ' <script type="text/javascript">
		alert("You will be redirected to the PDF");
	</script>
	';
	?>
	<?php
	require("fpdf181/fpdf.php");
	require_once('fpdi/fpdi.php');

ob_end_clean(); //    the buffer and never prints or returns anything.
ob_start(); // it starts buffering

$pdf = new FPDI();

    // add a page
$pdf->AddPage();

    // set the source file
$pdf->setSourceFile("trfinal.pdf");

    // import page 1
$tplIdx = $pdf->importPage(1);


    // use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);

    // now write some text above the imported page
$pdf->SetFont('Arial','B',14);
$pdf->SetMargins(1, 20, 10, 0);
    // $pdf->SetFillColor(255, 0, 0);
    // $pdf->SetTextColor(255, 0, 0);
   // $pdf->SetFillColor(255,0,0);
    // $pdf->Multicell(0,2,"This is a multi-line text string\nNew line\nNew line"); 
    //  $pdf->Output(); 

$pdf->SetTitle("Title Here"); 
$pdf->setFillColor(255,0,0); 
$pdf->SetXY(10,123);
$pdf->Cell(0,0,''.$name.'',0,0,'C');

//$pdf->Cell(0,0,''.$college.'',0,0,'C'); 

$len2 = strlen(''.$college.'');
$array2 = explode( "\n", wordwrap( $college, 65));
if($len2>=65)
{
	if(isset($array2[1]))
	{
	$pdf->SetXY(10,136);
	$pdf->Cell(0,0,''.$array2[0].'',0,0,'C'); 
	$pdf->SetXY(10,143);
	 $pdf->Cell(0,0,''.$array2[1].'',0,0,'C');
	}
	else
	{
		$pdf->SetXY(10,139);
	$pdf->Cell(0,0,''.$array2[0].'',0,0,'C');	
	}
}
else
{
	$pdf->SetXY(10,139);
	$pdf->Cell(0,0,''.$array2[0].'',0,0,'C');
}
$len = strlen(''.$pt.'');

$array = explode( "\n", wordwrap( $pt, 65));

if($len>=65)
{
	if(isset($array[1]))
	{
	$pdf->SetXY(10,166);
	$pdf->Cell(0,0,'"'.$array[0].'',0,0,'C'); 
	$pdf->SetXY(10,173);
	 $pdf->Cell(0,0,''.$array[1].'"',0,0,'C');
	}
	else
	{
		$pdf->SetXY(10,172);
	$pdf->Cell(0,0,'"'.$array[0].'"',0,0,'C');	
	}
}
else
{
	$pdf->SetXY(10,172);
	$pdf->Cell(0,0,'"'.$array[0].'"',0,0,'C');
}
//$pdf->Cell(0,0,''.wordwrap($pt,63).'',0,0,'C'); 
//$pdf->MultiCell(0,10,''.wordwrap($pt,63).'',1,1,'C');

$pdf->SetXY(10,218);
$pdf->Cell(0,0,''.$mf.' ' .$df .', '. $yf .' to '. $mt .' '.$dt .', '. $yt.'.',0,0,'C');
  // $pdf->SetFillColor(255,0,0);
$pdf->SetXY(10,255);
$pdf->SetMargins(0, 0, 25, 20);
$pdf->Cell(0,0,'('.$official.')',0,0,'R');
$pdf->SetXY(10,263);
$pdf->SetMargins(0, 0, 25, 20);
$pdf->Cell(0,0,''.$designation.'',0,0,'R');
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(70,78.3);
$pdf->SetMargins(0, 0, 0, 0);
$pdf->Cell(0,0,''.$session.'/'.$vt.'',0,0,'L');
$pdf->SetXY(10,78.3);
$pdf->SetMargins(0, 0, 25, 20);
$pdf->Cell(0,0,''.$mc.' ' .$dc .', '. $yc .'',0,0,'R');
$pdf->Output('I',$vt.'('.$session.')'); 

      // $pdf->Cell(0,10,'Center text:',0,0,'C');
     // $pdf->Write(0, 'Project Title');
 


	ob_end_flush(); // It's printed here, because ob_end_flush "prints" what's in
              // the buffer, rather than returning it
              //     (unlike the ob_get_* functions)
	?>
	<?php
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


include"sail_footer.php";
?>



