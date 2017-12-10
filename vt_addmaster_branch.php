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
  <!-- <form method="post" class="form-group">
    <div class="container">
      <br><br>
      <div class="form-group">
        <label for="session" class="control-label col-sm-2">FINANCIAL YEAR<span style="color:red;">*</span></label>
        <div class="col-sm-10">
          <div class="input-group">
            <input class="form-control" type="text" name="session" placeholder="YYYY-YY" required><span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="fy">Submit</button>
          </span>
        </div>
      </div>
    </div>
  </div>
</form> -->
<form method="post" class="form-group">
  <div class="container">
    <br><br>
    <div class="form-group">
      <label for="branch" class="control-label col-sm-2">BRANCH<span style="color:red;">*</span></label>
      <div class="col-sm-10">
        <div class="input-group">
          <input class="form-control" type="text" name="branch" placeholder="BRANCH" required><span class="input-group-btn">
          <button class="btn btn-default" type="submit" name="br">Submit</button>
        </span>
      </div>
    </div>
  </div>
</div>
</form>
<!-- <form method="post" class="form-group">
  <div class="container">
    <br><br>
    <div class="form-group">
      <label for="aot" class="control-label col-sm-2">AREA OF TRAINING<span style="color:red;">*</span></label>
      <div class="col-sm-10">
        <div class="input-group">
          <input class="form-control" type="text" name="aot" placeholder="AREA OF TRAINING" required><span class="input-group-btn">
          <button class="btn btn-default" type="submit" name="area">Submit</button>
        </span>
      </div>
    </div>
  </div>
</div>
</form>
<form method="post" class="form-group">
  <div class="container">
    <br><br>
    <div class="form-group">
      <label for="college" class="control-label col-sm-2">COLLEGE<span style="color:red;">*</span></label>
      <div class="col-sm-10">
        <div class="input-group">
          <input class="form-control" type="text" name="college" placeholder="COLLEGE" required><span class="input-group-btn">
          <button class="btn btn-default" type="submit" name="coll">Submit</button>
        </span>
      </div>
    </div>
  </div>
</div>
</form> -->
</body>

</html>

<?php
if(isset($_POST['fy']))
{
  $session = $_POST['session'];

  $query = "select session from master_session where session LIKE '$session'";
  $q = mysqli_query($link,$query);
  $flag=0;
  while($row = mysqli_fetch_array($q))
  {
    $qq = $row[0];
    $flag=1;
    break;
  }
  if($flag==0)
  {
    
    $query2 = "insert into master_session values ('$session',0)";
    if(mysqli_query($link,$query2))
    {
      echo ' <script type="text/javascript">
            alert("Details are Inserted Successfully!!!!");
          </script>
          ';
    }
    else
    {
      echo ' <script type="text/javascript">
            alert("ERROR!!!!!");
          </script>
          ';
    }
  }
  else
  {
    echo ' <script type="text/javascript">
            alert("Financial Year is already present in the List!!!");
          </script>
          ';
  }

}
?>
<?php 
if(isset($_POST['br']))
{
  $branch = $_POST['branch'];
  $query = "select branch from master_branch where branch LIKE '$branch'";
  $q = mysqli_query($link,$query);
  $flag=0;
  while($row = mysqli_fetch_array($q))
  {
    $qq = $row[0];
    $flag=1;
    break;
  }
  if($flag==0)
  {
    $query2 = "insert into master_branch values ('$branch')";
    if(mysqli_query($link,$query2))
    {
      echo ' <script type="text/javascript">
            alert("Details are Inserted Successfully!!!!");
          </script>
          ';
    }
    else
    {
      echo ' <script type="text/javascript">
            alert("ERROR!!!!!");
          </script>
          ';
    }
  }
  else
  {
    echo ' <script type="text/javascript">
            alert("Branch is already present in the List!!!");
          </script>
          ';
  }

}
if(isset($_POST['area']))
{
  $aot = $_POST['aot'];
  $query = "select aot from master_aot where aot LIKE '$aot'";
  $q = mysqli_query($link,$query);
  $flag=0;
  while($row = mysqli_fetch_array($q))
  {
    $qq = $row[0];
    $flag=1;
    break;
  }
  if($flag==0)
  {
    $query2 = "insert into master_aot values ('$aot')";
    if(mysqli_query($link,$query2))
    {
      echo ' <script type="text/javascript">
            alert("Details are Inserted Successfully!!!!");
          </script>
          ';
    }
    else
    {
      echo ' <script type="text/javascript">
            alert("ERROR!!!!!");
          </script>
          ';
    }
  }
  else
  {
    echo ' <script type="text/javascript">
            alert("Area of Training is already present in the List!!!");
          </script>
          ';
  }

}
if(isset($_POST['coll']))
{
  $college = $_POST['college'];
  $query = "select college from master_college where college LIKE '$college'";
  $q = mysqli_query($link,$query);
  $flag=0;
  while($row = mysqli_fetch_array($q))
  {
    $qq = $row[0];
    $flag=1;
    break;
  }
  if($flag==0)
  {
    $query2 = "insert into master_college values ('$college')";
    if(mysqli_query($link,$query2))
    {
      echo ' <script type="text/javascript">
            alert("Details are Inserted Successfully!!!!");
          </script>
          ';
    }
    else
    {
      echo ' <script type="text/javascript">
            alert("ERROR!!!!!");
          </script>
          ';
    }
  }
  else
  {
    echo ' <script type="text/javascript">
            alert("College is already present in the List!!!");
          </script>
          ';
  }

}?>

    
        
          <?php
           $query1 = "select * from master_branch";
      $q1 = mysqli_query($link,$query1);
      echo "<br><br><div class='table-responsive col-sm-offset-4 col-sm-4'><table border='4' ><th><h3>BRANCH</h3></th><th><h3>DELETE</h3></th></tr>";
      //echo '<div class="container-fluid">';
      echo'<form method="post" action="vt_addmaster_branch.php">';
      while($row = mysqli_fetch_array($q1)) 
      {

        ?>

        <tr>

          <td> <input name = "<?php echo $row['branch']; ?>" value="<?php echo $row['branch']; ?>" type="text"  readonly  ></td>
          <!-- <td> <button id="edit_submit2" type="submit" name ="edit_aot"  onclick="return confirm('Are you sure you want to EDIT this VT_NO\'s?')" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></td> -->
              <td> <button id="edit_submit2" type="submit" name ="del_branch" value="<?php echo $row['branch']; ?>" onclick="return confirm('Are you sure you want to DELETE <?php echo $row['branch']; ?>')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
            

            <?php
              
          }
          echo'</table><br><br><br><br><br><br><br><br><br><br></div>';
          echo'</form>';
          ?>
         


          <!-- <br><br>
                  
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <button id="edit_submit" type="submit" name ="submit" onclick="return confirm('Are you sure you want to DELETE this VT_NO\'s?')" class="btn btn-danger btn"><span class="glyphicon glyphicon-trash"></span>Delete Selected Ones</button>

            </div>
          
          <br><br>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <button id="edit_submit" type="submit" name ="delall" onclick="return confirm('Are you sure you want to DELETE ALL VT_NO\'s?')" class="btn btn-danger btn"><span class="glyphicon glyphicon-trash"></span>Delete All</button>
              
            </div>
          </div> -->
                  <!-- <input type="submit" name="logout" value="Logout"> --> 

          <?php
          

         
          
      if(isset($_POST['del_branch']))
          {
            
            $branch = $_POST['del_branch'];
            
            $query11 = "delete from master_branch where branch='$branch'";
            if(mysqli_query($link,$query11))
            {
              echo ' <script type="text/javascript">
                alert("Deletion Successfull!!!!!");
              </script>
              ';
            }
              else
                {
                  echo ' <script type="text/javascript">
                  alert("Error!!!!");
                </script>
                ';
                //echo'<script>window.open("vt_addmaster.php","_self");</script>';
              }
             
                
              echo'<script>window.open("vt_addmaster_branch.php","_self");</script>';
            
      }
      
    
     
       


  ?>
 
  <?php
  echo'<br><br><br><br><br>';
  include"sail_footer.php";
  ?>