
  <html>
<head>
	<title>VT Management System</title>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="https://sail.co.in/misc/favicon.ico">
	<link rel = "stylesheet" href="sail_header.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<div class="container-fluid">
		<div id="header1" class="page-header"> 
			<img src="https://sail.co.in/sites/all/themes/sail/new/images/sail-logo.jpg">
			
			
			<p id="text1">VOCATIONAL TRAINING MANAGEMENT SYSTEM<p>
				<p id="text2">RESEARCH AND DEVELOPMENT CENTER FOR IRON AND STEEL</p>
				<img id="satyamev" src="https://sail.co.in/sites/all/themes/sail/new/images/satyamave-logo.jpg" align="right">
				
			</div>
		</head>
		
			</div>
		</head>
		
		<nav class="navbar navbar-light" style="background-color: #2938D4;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="background-color: #FFFFFF;" href="#">Welcome<?php echo " " ;?><span class="glyphicon glyphicon-user"></span><?php echo ' '.$_SESSION['user'];?></a>
    </div>
    <ul class="nav navbar-nav" style="background-color: #FFFFFF;">
      <li ><a href="vt_home_button.php"><span class="glyphicon glyphicon-home" ></span>Home</a></li>
     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="	glyphicon glyphicon-cog" ></span>Settings<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="vt_settings.php"><span class="glyphicon glyphicon-lock"></span>Change Password</a></li>
          </ul>
      </li>
      <li ><a href="vt_logout_button.php"><span class="glyphicon glyphicon-log-out" ></span>Log Out</a></li>
        </ul>
      
  </div>
</nav>
	</div>

	
	</html>