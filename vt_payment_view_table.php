<html>
  <head>
    
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel = "stylesheet" href="vt_form.css">
    </head>
    </html>
    <?php

  session_start();
  include"sail_header.php";
  if(isset($_SESSION['se']))
{
  include"dbconnect_sail.php";
  $session = $_SESSION['se'];
$i=1;
    $p=15;
     ;
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
    
    echo "<br><br><div class='container' id='div1' style='overflow:scroll; width:98%'><table id='edit_page_table' border='4'><tr><th><h3>SESSION</h3></th><th><h3>VT_NO.</h3></th><th><h3>NAME</h3></th><th><h3>PAYMENT MADE</h3></th><th><h3>AMOUNT PAID</h3></th><th><h3>PAYMENT MODE</h3></th><th><h3>NAME OF DEPOSITOR</h3></th></th><th><h3>ACCOUNT NO.</h3></th></th></th><th><h3>DATE OF PAYMENT</h3></th><th><h3>TRANSACTION NO.</h3></th></tr>";
    while($row = mysqli_fetch_array($q1)) 
    {
      
    echo "<tr>";
    echo "<td><p>" . $row['session'] . "</p></td>";
    echo "<td><p>" . $row['vt_no'] . "</p></td>";
    echo "<td><p id='name'>" . $row['name'] . "</p></td>";
    if($row['amt']==0)
    {
    echo "<td><p>" . "No" . "</p></td>";
  }
  else{
  echo "<td><p>" . "Yes" . "</p></td>";
}

echo "<td><p>" . $row['amt'] . "</p></td>";
echo "<td><p>" . $row['pay'] . "</p></td>";
echo "<td><p>" . $row['name_of_depositor'] . "</p></td>";
echo "<td><p>" . $row['acc_no'] . "</p></td>";
echo "<td><p>" . $row['date_of_pay'] . "</p></td>";
echo "<td><p>" . $row['trans'] . "</p></td>";
echo "</tr>";
++$i;

}
echo"</table></div>";
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
  ?> <li><a href="vt_payment_view_table.php?pages=<?php echo $i ?>" ><?php echo $i; ?></a></li>
<?php } }?>

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
<?php
include"sail_footer.php";
?>