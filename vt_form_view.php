<?php
  include"vt_check_session.php";
  
  
  ?>
  <html>
  <head>
    
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel = "stylesheet" href="vt_form.css">
  	</head>
    <body>
    <form method="post" class="form-group">
            <div class="container">
              <br><br>
              
              <!-- <br><br> -->
              <div class="form-group">
                <label for="session" class="control-label col-sm-2">FINANCIAL YEAR</label>
                <div class="col-sm-10">
                  <select  class="btn dropdown-toggle" data-toggle="dropdown" type="submit" name="session" >
                  <option value="none">All Financial Year</option>
                  <?php $query1 = "select * from master_session";
                        $q1 = mysqli_query($link,$query1);
                        while($row = mysqli_fetch_array($q1))
                        {
                          ?>
                          <option><?php echo $row[0]?></option>
                        <?php } ?>
                    
                  </select>
                 <button type="submit" name ="sub" class="btn btn-default">Submit</button>
                  </div>
                  </div>
                  <br><br>
                  
                  </div>
                  </form>
                  </body>
    </html>
    <?php
    
    if(isset($_POST['sub']))
    {
      $_SESSION['se']=$_POST['session'];
      $session = $_SESSION['se'];
      //echo'<script>window.open("vt_payment_view_table.php","_self");</script>';

      
    }
else
{
  $session = $_SESSION['se'];
  }
  
$i=1;
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
    if($session=="none")
    {
      $query1 = "select * from vt_info limit $page1,$p";
    }
    else
    {
      $query1 = "select * from vt_info where session='$session' limit $page1,$p";
    }
    $q1 = mysqli_query($link,$query1);
echo "<div class='container' id='div1' style='overflow:scroll; width:98%'><table id='edit_page_table' border='4'><tr><th><h3>SESSION</h3></th><th><h3>VT_NO.</h3></th><th><h3>NAME</h3></th><th><h3>COLLEGE</h3></th><th><h3>BRANCH</h3></th><th><h3>SEM</h3></th><th><h3>YEAR</h3></th>
<th><h3>COLLEGE ROLL NO. (EXAM REG NO.)</h3></th><th><h3>AREA OF TRAINING</h3></th><th><h3>PROJECT TITLE</h3></th><th><h3>FROM</h3></th><th><h3>TO</h3></th><th><h3>TO BE SENT AT</h3></th><th><h3>REFERENCE</h3></th><th><h3>CONTACT NO.</h3></th><th><h3>PAYMENT MADE</h3></th><th><h3>CERTIFICATE PRINTED</h3></th></tr>";
while($row = mysqli_fetch_array($q1))
{
	echo "<tr>";
	echo "<td><p>" . $row['session'] . "</p></td>";
	echo "<td><p>" . $row['vt_no'] . "</p></td>";
	echo "<td><p id='name'>" . $row['name'] . "</p></td>";
	echo "<td><p id='college'>" . $row['college'] . "</p></td>";
	echo "<td><p id='branch'>" . $row['branch'] . "</p></td>";
	echo "<td><p>" . $row['sem'] . "</p></td>";
	echo "<td><p>" . $row['year'] . "</p></td>";
	echo "<td><p>" . $row['reg_no'] . "</p></td>";
	echo "<td><p id='aot'>" . $row['aot'] . "</p></td>";
	echo "<td><p id='pt'>" . $row['project_title'] . "</p></td>"; 
	echo "<td><p id='fromm'>" . $row['fromm'] . "</p></td>";
	echo "<td><p id='too'>" . $row['too'] . "</p></td>";
	echo "<td><p id='tbsa'>" . $row['tbsa'] . "</p></td>";
	echo "<td><p id='ref'>" . $row['ref'] . "</p></td>";
	echo "<td><p>" . $row['mob'] . "</p></td>";
	if($row['amt']==0)
	{
		echo "<td><p>" . "No" . "</p></td>";
	}
	else{
		echo "<td><p>" . "Yes" . "</p></td>";
	}
	if($row['certificate_print']==0)
		{
		echo "<td><p>" . "No" . "</p></td>";
	}
	else{
		echo "<td><p>" . "Yes" . "</p></td>";
	}
  // echo "<td><p>" . $row['trans'] . "</p></td>";
  // echo "<td><p>" . $row['amt'] . "</p></td>";
  // echo "<td><p>" . $row['pay'] . "</p></td>";

	echo "</tr>";


}
echo"</table>";
echo"</div>";

if($session=="none")
{
  $count_query = "select * from vt_info";
}
else
{
  $count_query = "select * from vt_info where session = '$session'";
}
$count_process = mysqli_query($link,$count_query);
$count_pages = mysqli_num_rows($count_process);
$count = ceil(($count_pages)/$p);
?>
<div class="container">
<ul class="pagination">

<?php
for($i=1; $i<=$count; ++$i)
{
  ?> <li><a href="vt_form_view.php?pages=<?php echo $i ?>" ><?php echo $i; ?></a></li>
<?php } ?>

</ul>
<br><br>
<button id="print_button" class="btn btn-success btn-lg" onclick="printContent('div1')"><span class="glyphicon glyphicon-print"></span>Print Page</button><br><br><br><br>
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
    ?>
    <?php
include"sail_footer.php";
?>