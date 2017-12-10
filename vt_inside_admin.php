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
				   <div class="col-md-offset-1 col-md-11">
					<br><br><br>
					<div class="col-md-6">
					<p><a  href="vt_form.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-list"></span> Enter Personal Details</a><br></p>
					</div>
					<div class="col-md-6">
					<p><a href="vt_payment.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-list"></span> Enter Payment Details</a></p><br></div>
					<div class="col-md-6">
					<p><a  href="vt_new_edit.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-edit"></span> Edit Candidate Details</a></p><br></div>
					<div class="col-md-6">
					<p>
					<a  href="vt_search.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-eye-open"></span> View Candidate Details</a></p><br></div>
					<div class="col-md-6">
					<p><a  href="vt_new_payment_view.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-eye-open"></span> View Payment Details</a></p><br></div>
					<div class="col-md-6"><p>
					<a  href="vt_createpdf.php" class="btn btn-primary custom"><span class="fa fa-certificate"></span> Generate Certificate</a></p><br></div>
					<div class="col-md-6"><p>
					<a  href="vt_total.php" class="btn btn-primary custom"><i class="fa fa-inr"></i> Total Payment</a></p><br></div>
					<div class="col-md-6"><p>
					<a  href="vt_master_option.php" class="btn btn-primary custom"><i class="fa fa-file"></i> Master</a></p><br><br></div>
					<div class="col-md-offset-3 col-md-6"><p>
					<a  href="vt_new_del.php" class="btn btn-primary custom"><span class="glyphicon glyphicon-trash"></span> Delete</a></p><br><br></div>

				</div>
			</div>
		</form>
	</body>
	</html>
	
	<?php
	include"sail_footer.php";
	?>