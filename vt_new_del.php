					

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
								<label for="session" class="control-label col-sm-3">FINANCIAL YEAR</label>
								<div class="col-sm-3">
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
									<!-- </div> -->
							


							<!-- <br><br> -->
							<!-- <div class="form-group"> -->
								<label for="vt_no" class="control-label col-sm-3">VT NO.</label>
								<div class="col-sm-3">
									<input class="form-control" type="text" name = "vt" value="none">
								</div>
							</div>
							<br><br>
							
							<!-- <div class="form-group">
								<label for="vt" class="control-label col-sm-2">VT NO.</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" name="vt" >
								</div>
							</div>
							<br><br> -->
							<!-- <div class="form-group">
								<label for="name" class="control-label col-sm-2">NAME OF STUDENT</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="name">
								</div>
							</div>
							<br><br> -->
							<div class="form-group">
								<label for="college" class="control-label col-sm-3">NAME OF COLLEGE</label>
								<div class="col-sm-3">
									<select  class="btn dropdown-toggle" data-toggle="dropdown"  name="college" >
									<option value="none"> -- Select an Option -- </option>
									<?php $query1 = "select * from master_college";
									      $q1 = mysqli_query($link,$query1);
									      while($row = mysqli_fetch_array($q1))
									      {
									      	?>
									      	<option><?php echo $row[0]?></option>
									      <?php } ?>
										
									</select>
								</div>
							<!-- </div> -->


							<!-- <br><br> -->
							<!-- <div class="form-group"> -->
								<label for="branch" class="control-label col-sm-3">BRANCH</label>
								<div class="col-sm-3">
									<select  class="btn dropdown-toggle" data-toggle="dropdown"  name="branch" >
									<option value="none"> -- Select an Option -- </option>
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
								
								<label for="sem" class="control-label col-sm-3">SEMESTER</label>
								<div class="col-sm-3">
									<select name="sem" class="btn dropdown-toggle" data-toggle="dropdown">
										<option value="none"> -- Select an Option -- </option>
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
							<!-- </div>
							<br><br> -->
							<!-- <div class="form-group" > -->
								<label for="year" class="control-label col-sm-3">YEAR</label>
								<div class="col-sm-3">
									<select name="year" class="btn dropdown-toggle" data-toggle="dropdown">
										<option value="none"> -- Select an Option -- </option>
										<option>FIRST</option>
										<option>SECOND</option>
										<option>THIRD</option>
										<option>FOURTH</option>
									</select>
								</div>
							</div>
							<br><br>
							<!-- <div class="form-group">
								<label for="reg_no" class="control-label col-sm-2">COLLEGE ROLL(EXAM REG NO.)</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" name="reg_no">
								</div>
							</div>
							<br><br> -->
							<!-- <br><br> -->
							<div class="form-group">
								<label for="aot" class="control-label col-sm-3">AREA OF TRAINING</label>
								<div class="col-sm-3">
									<select name="aot" class="btn dropdown-toggle" data-toggle="dropdown">
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
							<!-- </div>
							<br><br> -->
							<!-- <br><br> -->
							<!-- <div class="form-group"> -->
								<label for="amount" class="control-label col-sm-3">AMOUNT PAID</label>
								<div class="col-sm-3">
									<select name="amount" class="btn dropdown-toggle" data-toggle="dropdown">
										<option value="none"> -- Select an Option -- </option>
										<option>Yes</option>
										<option>No</option>

									</select>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label for="cp" class="control-label col-sm-3">CERTIFICATE PRINTED</label>
								<div class="col-sm-3">
									<select name="cp" class="btn dropdown-toggle" data-toggle="dropdown">
										<option value="none"> -- Select an Option -- </option>
										<option>Yes</option>
										<option>No</option>

									</select>
								</div>
							</div>
							<br><br>
							
					<!-- <div class="form-group">
						<label for="tbsa" class="control-label col-sm-2">TO BE SENT AT</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="tbsa">
						</div>
					</div>
					<br><br> -->
					<!-- <br><br> -->
					<!-- <div class="form-group">
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
					</div> -->
					<!-- <br><br> -->
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
						<div class="col-sm-offset-5 col-sm-10">
							<button type="submit" name ="sub" class="btn btn-primary">Submit</button>
						</div>
					</div>
					<br><br>
					</div>
					
					
					</form>

					
				</body>
				<br><br>
				</html>
				<?php
				
				include"dbconnect_sail.php";
  
				if(isset($_POST['sub']) || isset($_SESSION['sub']))
				{
				if(isset($_POST['sub']))
				{
					
					
					$_SESSION['sub']=1;
					//Variable for taking the various fields datas
					$_SESSION['session'] = $_POST['session'];
					$session = $_SESSION['session'];
					$_SESSION['vt'] = $_POST['vt'];
					$vt = $_SESSION['vt'];

					$_SESSION['college'] = $_POST	['college'];
					$college = $_SESSION['college'];
						$_SESSION['branch'] = $_POST['branch'];
					$branch = $_SESSION['branch'];
					$_SESSION['aot'] = $_POST['aot'];
					$aot = $_SESSION['aot'];	
					$_SESSION['sem'] = $_POST['sem'];
					$sem = $_SESSION['sem'];	
					$_SESSION['year'] = $_POST['year'];
					$year = $_SESSION['year']	;
					$_SESSION['cp'] = $_POST['cp'];
					$cp = $_SESSION['cp'];	
					$_SESSION['amount'] = $_POST['amount'];
					$amount = $_SESSION['amount'];
				}
				else	
				{
					$session = $_SESSION['session'];
					$vt = $_SESSION['vt'];
					$college = $_SESSION['college'];
					$branch = $_SESSION['branch'];
					$aot = $_SESSION['aot'];
					$sem = $_SESSION['sem'];
					$year = $_SESSION['year'];
					$cp = $_SESSION['cp'];
					$amount = $_SESSION['amount'];
				}
					//echo"$college";
				$i = 1;
					if($session!="none")
					{
						$cond1 = "session = '$session'";

						$condfinal = $cond1;
						++$i;
					}

					if($college!="none")
					{
						$cond2 = "college = '$college'";
						if($i>1)
						{
							$cond2 = $cond2.' and '.$condfinal;
							
						}
						$condfinal = $cond2;
						++$i;
					}
					if($year!="none")
					{
						$cond3 = "year = '$year'";
						if($i>1)
						{
							$cond3 = $cond3.' and '.$condfinal;
							
						}
						$condfinal = $cond3;
						++$i;
					}
					if($aot!="none")
					{
						$cond4 = "aot = '$aot'";
						if($i>1)
						{
							$cond4 = $cond4.' and '.$condfinal;
							
						}
						$condfinal = $cond4;
						++$i;
					}
					if($sem!="none")
					{
						$cond5 = "sem = '$sem'";
						if($i>1)
						{
							$cond5 = $cond5.' and '.$condfinal;
							
						}
						$condfinal = $cond5;
						++$i;
					}
					if($branch!="none")
					{
						$cond6 = "branch = '$branch'";
						if($i>1)
						{
							$cond6 = $cond6.' and '.$condfinal;
							
						}
						$condfinal = $cond6;
						++$i;
					}
					if($vt!="none")
					{
						$cond7 = "vt_no = '$vt'";
						if($i>1)
						{
							$cond7 = $cond7.' and '.$condfinal;
							
						}
						$condfinal = $cond7;
						++$i;
					}
					if($cp!="none")
					{
						if($cp=="No")
						{
							$cond8 = "certificate_print = '0'";
						}
						else
						{
							$cond8 = "certificate_print <> '0'";
						}
						
						if($i>1)
						{
							$cond8 = $cond8.' and '.$condfinal;
							
						}
						$condfinal = $cond8;
						++$i;
					}
					if($amount!="none")
					{
						if($amount=="No")
						{
							$cond9 = "amt = '0'";
						}
						else
						{
							$cond9 = "amt <> '0'";
						}
						
						if($i>1)
						{
							$cond9 = $cond9.' and '.$condfinal;
							
						}
						$condfinal = $cond9;
						++$i;
					}
					$kkk=$i;
					$j=1;
    $p=15;
     
     $page1 = @$_GET["pages"];
     if($page1=="" || $page1=="1")
     {
       $page1 = 0;

    }
    else
    {
      $page1 = ($page1 * $p)-$p;
    }
                  //
		echo'<div class="container">
<ul class="pagination">';
if($i>1)
					{

					 $count_query = "select * from vt_info where $condfinal";
					}
					else
					{
						$count_query = "select * from vt_info";
					}	
					$count_process = mysqli_query($link,$count_query);
$count_pages = mysqli_num_rows($count_process);
$count = ceil(($count_pages)/$p);	

for($i=1; $i<=$count; ++$i)
{
  echo'<li><a href="vt_new_del.php?pages='.$i.'" >'.$i.'</a></li>';
 }
 echo'</ul>';


			//echo $session;
					// $vt_no = $_POST['vt'];
					// $name = $_POST['name'];
					// $branch = $_POST['branch'];
					// $sem = $_POST['sem'];
					// $year = $_POST['year'];
					// $reg_no = $_POST['reg_no'];
					// $aot = $_POST['aot'];
					//$fromm = $_POST['fromm'];
					//$too = $_POST['too'];
					// $tbsa = $_POST['tbsa'];
					// $ref = $_POST['ref'];
					// $mob = $_POST['mob'];
					
					//echo $college;
				//Inserting into the Database
					if($kkk>1)
					{

					 $query1 = "select * from vt_info where $condfinal limit $page1,$p";
					}
					else
					{
						$query1 = "select * from vt_info limit $page1,$p";
					}
					
					$q1 = mysqli_query($link,$query1);
					echo'<form method="post">
						';
					echo "<br><br><div id='div1' style='overflow:scroll; width:98%'><table id='edit_page_table' border='4'><tr><th><h3>CHECKBOX</h3></th><th><h3>SESSION</h3></th><th><h3>VT_NO.</h3><th><h3>NAME</h3></th><th><h3>COLLEGE</h3></th><th><h3>BRANCH</h3></th><th><h3>SEM</h3></th><th><h3>YEAR</h3></th>
<th><h3>COLLEGE ROLL NO. (EXAM REG NO.)</h3></th><th><h3>AREA OF TRAINING</h3></th><th><h3>PROJECT TITLE</h3></th><th><h3>FROM</h3></th><th><h3>TO</h3></th><th><h3>TO BE SENT AT</h3></th><th><h3>REFERENCE</h3></th><th><h3>CONTACT NO.</h3></th><th><h3>PAYMENT MADE</h3></th><th><h3>CERTIFICATE PRINTED</h3></th></tr>";
$jj=1;}
while($row = mysqli_fetch_array($q1))
{
	echo "<tr>";
	echo "<td> <input name = '".$row['sno']."' type='checkbox'  value='".$row['sno']."' style='width:100%'></td>";
	echo "<td> <input name = 'session[]' type='text' style='width:100%' value='".$row['session']."' readonly ></td>";
	echo "<td> <input name = 'vt[]' type='number' style='width:100%' value='".$row['vt_no']."'  readonly></td>";
	echo "<td> <input name = 'name[]' type='text' style='width:100%' value='".$row['name']."'  readonly></td>";
	echo "<td> <input name = 'college[]' type='text'  value='".$row['college']."'  readonly></td>";
	echo "<td> <input name = 'branch[]' type='text' style='width:100%' value='".$row['branch']."'  readonly></td>";
	echo "<td> <input name = 'sem[]' type='number' style='width:100%' value='".$row['sem']."'  readonly></td>";
	echo "<td> <input name = 'year[]' type='text' style='width:100%' value='".$row['year']."'  readonly></td>";
	echo "<td> <input name = 'rno[]' type='text' style='width:100%' value='".$row['reg_no']."' readonly ></td>";
	echo "<td> <input name = 'aot[]' type='text' style='width:100%' value='".$row['aot']."'  readonly></td>";
	echo "<td> <input name = 'pt[]' type='text' style='width:100%' value='".$row['project_title']."' readonly></td>";
	echo "<td> <input name = 'fromm[]' type='text' style='width:100%' value='".$row['fromm']."'  readonly></td>";
	echo "<td> <input name = 'too[]' type='text' style='width:100%' value='".$row['too']."'  readonly></td>";
	echo "<td> <input name = 'tbsa[]' type='text' style='width:100%' value='".$row['tbsa']."'  readonly></td>";
	echo "<td> <input name = 'ref[]' type='text' style='width:100%' value='".$row['ref']."'  readonly></td>";
	echo "<td> <input name = 'contact[]' type='text' style='width:100%' value='".$row['mob']."'  readonly></td>";
	echo "<td> <input name = 'amt[]' type='text' style='width:100%' value='".$row['amt']."'  readonly></td>";
	echo "<td> <input name = 'cp[]' type='text' style='width:100%' value='".$row['certificate_print']."'  readonly></td>";
	
	// echo "<td><p id='name'>" . $row['name'] . "</p></td>";
	// echo "<td><p id='college'>" . $row['college'] . "</p></td>";
	// echo "<td><p id='branch'>" . $row['branch'] . "</p></td>";
	// echo "<td><p>" . $row['sem'] . "</p></td>";
	// echo "<td><p>" . $row['year'] . "</p></td>";
	// echo "<td><p>" . $row['reg_no'] . "</p></td>";
	// echo "<td><p id='aot'>" . $row['aot'] . "</p></td>";
	// echo "<td><p id='pt'>" . $row['project_title'] . "</p></td>"; 
	// echo "<td><p id='fromm'>" . $row['fromm'] . "</p></td>";
	// echo "<td><p id='too'>" . $row['too'] . "</p></td>";
	// echo "<td><p id='tbsa'>" . $row['tbsa'] . "</p></td>";
	// echo "<td><p id='ref'>" . $row['ref'] . "</p></td>";
	// echo "<td><p>" . $row['mob'] . "</p></td>";
	// if($row['amt']==0)
	// {
	// 	echo "<td><p>" . "No" . "</p></td>";
	// }
	// else{
	// 	echo "<td><p>" . "Yes" . "</p></td>";
	// }
	// if($row['certificate_print']==0)
	// 	{
	// 	echo "<td><p>" . "No" . "</p></td>";
	// }
	// else{
	// 	echo "<td><p>" . "Yes" . "</p></td>";
	// }
  // echo "<td><p>" . $row['trans'] . "</p></td>";
  // echo "<td><p>" . $row['amt'] . "</p></td>";
  // echo "<td><p>" . $row['pay'] . "</p></td>";

	echo "</tr>";
++$jj;

}
echo"</table>";
echo"</div>";

echo'<br><br><div class="form-group">        
						<div class="col-sm-offset-5 col-sm-4">';
						?>
							<button type="submit" name ="del" class="btn btn-primary" onclick="return confirm('Are you sure you want to DELETE these selected Students?')">Delete</button>
						
					
					
					        
						
							<button type="submit" name ="delall" class="btn btn-primary" onclick="return confirm('Are you sure you want to DELETE All Students from this list?')">Delete All</button>
						</div>
					</div>
					<?php echo'<br><br>
					
					
					</form>';
					
if(isset($_POST['del']))
{
	$count_query = 'SELECT MAX(sno) FROM vt_info';
	$count_query_process = mysqli_query($link,$count_query);
	while($r = mysqli_fetch_array($count_query_process))
	{
		$max = $r[0];
		break;
	}
	$e = "select * from vt_info";
	$ee = mysqli_query($link,$e);
	
	// $checkbox = $_POST['checkbox'];
 //    $count = count($checkbox);

	 
	 while($r = mysqli_fetch_array($ee))
	{
		$rr = $r['sno'];
         

		if(isset($_POST[''.$rr.'']))
		{
			
			$delete_query = "delete from vt_info where sno = '$rr'";
			if(mysqli_query($link,$delete_query))
			{
				$flag=0;
			}
			else
			{
				$flag=1;
				break;
			}
			//echo $rr;
		}
		 // $t =  $_POST[''.$jj.''];
		 // echo $t;
		

	}
	if($flag==1)
	{
		echo ' <script type="text/javascript">
                  alert("Error!!!!");
                </script>
                ';
	}
	else
	{
		echo ' <script type="text/javascript">
                  alert("Deletetion Successfull!!");
                </script>
                ';
	}
	
echo'<script>window.open("vt_new_del.php","_self");</script>';
}
if(isset($_POST['delall']))
{	if($kkk>1)
	{
		$delall = "delete from vt_info where $condfinal";
	}
	else
	{
		$delall = "delete from vt_info";
	}
	if(mysqli_query($link,$delall))
		echo ' <script type="text/javascript">
                  alert("Deletetion Successfull!!!!");
                </script>
                ';
                else
                	echo ' <script type="text/javascript">
                  alert("ERROR!!!");
                </script>
                ';
                echo'<script>window.open("vt_new_del.php","_self");</script>';

}
	


// 
		
		
		
		?>
		</div>
<br>
<div class="col-sm-offset-5 col-sm-4">
						<button  class="btn btn-success btn-lg" style="background-color: #2938D4;" onclick="printContent('div1')"><span class="glyphicon glyphicon-print"></span>Print Page</button><br><br><br><br><br></div>
<script>
  function printContent(el)
  {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
</div>
   
    <?php
    // 
    echo'<br><br>';
include"sail_footer.php";
?>


