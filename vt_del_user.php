<?php
session_start();

if(isset($_SESSION['vt_login'])=="1")
{
  
  $uname = $_SESSION['user'];
  if($uname=='Admin')
  {
    include"dbconnect_sail.php";
    include"sail_header.php";
  }
  else
  {
    header("Location:vt_logout_button.php");
  }
}
else
{
  header("Location:vt_login_button.php");
}
?>
<html>
<head>

  <meta charset = "utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" href="vt_form2.css">
      <!-- <link rel = "stylesheet" href="css/bootstrap.min.css">
      <script rel = "stylesheet" href="js/bootstrap.min.js"></script> -->
    </head>
    <?php
    
    include"dbconnect_sail.php";
    $j=0;
    $query1 = "select * from pdetails where username<>'Admin'";
    $q1 = mysqli_query($link,$query1);
    echo "<br><br><div class='table-responsive col-sm-offset-4 col-sm-4'><table border='4'><tr><th><h3>USERS</h3></th><th><h3>DEL CHECKBOX</h3></th></tr>";
    echo'<form method="post">';
    while($row = mysqli_fetch_array($q1)) 
    {

      ?>

      <tr>

        <td> <input name = "user[]" type="text" style="width:100%" value="<?php echo $row[0]; ?>" readonly ></td>
        
        
        <td> <input type="checkbox"  name="<?php echo $j; ++$j;?>"  style="width:100%"></td>
      </tr>

      <?php   
    }
    echo'</table><br><br></div>';
    ?>
    <br><br>
    <div class="form-group">        
      <div class="col-sm-offset-6 col-sm-4">
        <button id="edit_submit" type="submit" name ="submit" onclick="return confirm('Are you sure you want to DELETE this VT_NO\'s?')" class="btn btn-danger btn"><span class="glyphicon glyphicon-trash"></span>Delete Selected Ones</button>
        <br><br>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-6 col-sm-4 ">
        <button id="edit_submit" type="submit" name ="delall" onclick="return confirm('Are you sure you want to DELETE ALL VT_NO\'s?')" class="btn btn-danger btn"><span class="glyphicon glyphicon-trash"></span>Delete All</button>
        
      </div>
    </div>
    <br><br>
    <br><br>
    <!-- <input type="submit" name="logout" value="Logout"> --> 

    <?php
    echo'</form>';

    $flag=0;
    if(isset($_POST['submit']))
    {
      
      $i=0;
      while($i<$j)
      {
        if(isset($_POST[''.$i.'']))
        {
          $uname = $_POST['user'][$i];
          $query1 = "delete from pdetails where username='$uname'";
          if(mysqli_query($link,$query1))
          {
           
            $flag=0;  
          }
          else
          {
            $flag=1;
            break;
          }
          
        }
        ++$i;
      }
      
      if($flag==0)
        {echo ' <script type="text/javascript">
      alert("Deletion Successfull!!!!!");
    </script>
    ';}
    
    else{
     echo ' <script type="text/javascript">
     alert("Error!!!!");
   </script>
   ';
   
 }
 echo'<script>window.open("vt_del_user.php","_self");</script>'; 
}
if(isset($_POST['delall']))
{
  $query22 = "delete from pdetails where username<>'Admin'";
  if(mysqli_query($link,$query22))
  {
    echo ' <script type="text/javascript">
    alert("Deletion Successfull!!!!!");
  </script>
  ';
  
}
else
{
  echo ' <script type="text/javascript">
  alert("Deletion Successfull!!!!!");
</script>
';

}
echo'<script>window.open("vt_del_user.php","_self");</script>';
}



include"sail_footer.php";
?>


