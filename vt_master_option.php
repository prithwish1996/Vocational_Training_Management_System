	<!-- Various Options in Admin Homepage -->

	<?php
	include"vt_check_session.php";
	
	
	?>
	<html>
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" href="vt_form.css">
		<link rel = "stylesheet" href="css/bootstrap.min.css">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<script rel = "stylesheet" href="js/bootstrap.min.js"></script>
	</head>
	<body>
		<form method="post" class="form-group">
			<div class="container">
				  
					<br><br><br>
					<div class=" col-md-offset-4 col-md-5">
					<p><a  href="vt_addmaster_session.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-list"></span> Enter Financial Year</a><br><br></p>
					</div>
					<div class=" col-md-offset-4 col-md-5">
					<p><a href="vt_addmaster_branch.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-list"></span> Enter Branch</a></p><br></div>
					<div class=" col-md-offset-4 col-md-5">
					<p><a  href="vt_addmaster_college.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-list"></span> Enter College</a></p><br></div>
					<div class=" col-md-offset-4 col-md-5">
					<p>
					<a  href="vt_addmaster_aot.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-list"></span> Enter Area of Training</a></p><br><br><br><br></div>
					<!-- <div class="col-md-6">
					<p><a  href="vt_new_payment_view.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-eye-open"></span> View Payment Details</a></p><br></div>
					<div class="col-md-6"><p>
					<a  href="vt_createpdf.php" class="btn btn-primary custom"><span class="fa fa-certificate"></span> Generate Certificate</a></p><br></div>
					<div class="col-md-6"><p>
					<a  href="vt_total.php" class="btn btn-primary custom"><i class="fa fa-inr"></i> Total Payment</a></p><br></div>
					<div class="col-md-6"><p>
					<a  href="vt_addmaster.php" class="btn btn-primary custom"><i class="fa fa-file"></i> Master</a></p><br><br></div>
					<div class="col-md-offset-3 col-md-6"><p>
					<a  href="vt_new_del.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-trash"></span> Delete</a></p><br><br></div> -->

				
			</div>
		</form>
	</body>
	</html>
	
	<?php
	include"sail_footer.php";
	?>