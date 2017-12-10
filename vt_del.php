<?php
  session_start();
  include"sail_header.php";
  if(isset($_SESSION['vt_login'])=="1")
  {
    //header("Location:vt_inside_admin.php");
    //echo $_SESSION['vt_login'];
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
      <!-- <link rel = "stylesheet" href="css/bootstrap.min.css">
      <script rel = "stylesheet" href="js/bootstrap.min.js"></script> -->
    </head>
    <?php
    
      include"dbconnect_sail.php";
      $j=0;
      $query1 = "select * from vt_info";
      $q1 = mysqli_query($link,$query1);
      echo "<br><br><div style='overflow:scroll; width:98%'><table id='edit_page_table' border='4'><tr><th><h3>VT_NO.</h3></th><th><h3>NAME</h3></th><th><h3>COLLEGE</h3></th><th><h3>BRANCH</h3></th><th><h3>SEM</h3></th><th><h3>YEAR</h3></th>
      <th><h3>AREA OF TRAINING</h3></th><th><h3>FROM</h3></th><th><h3>TO</h3></th><th><h3>CONTACT NO.</h3></th><th><h3>PAYMENT MADE</h3></th><th><h3>DEL CHECKBOX</h3></th></tr>";
      echo'<form method="post">';
      while($row = mysqli_fetch_array($q1)) 
      {

        ?>

        <tr>

          <td> <input name = "vt[]" type="number" style="width:100%" value="<?php echo $row[0]; ?>" readonly ></td>
          <td> <input name = "name[]" type="text" style="width:100%" value="<?php echo $row[1]; ?>"  readonly></td>
          <td> <input name = "college[]" type="text" style="width:100%" value="<?php echo $row[19]; ?>"  readonly></td>
          <td> <input  name="branch[]" style="width:100%" value='<?php echo $row[2] ; ?>' readonly></td>
          <td> <input  name="sem[]" style="width:100%" value='<?php echo $row[3] ; ?>' readonly></td>
          <td> <input  name="year[]" style="width:100%" value='<?php echo $row[4] ;?>' readonly></td>
          
          <td> <input  name="aot[]" style="width:100%" value='<?php $aot = $row[6] ;
            echo $aot ; ?>' readonly></td>
            <td> <input type="date" name="fromm[]" style="width:100%" value="<?php echo $row[7]; ?>"  readonly></td>
            <td> <input type="date" name="too[]" style="width:100%" value="<?php echo $row[8]; ?>"  readonly></td>
            <td> <input type="number" name="mob[]" style="width:100%" value="<?php echo $row[11]; ?>"  readonly></td>

            <td> <input name="pay[]" style="width:100%" value="<?php if($row['amt']==0)
              {
                echo  'No' ;
              }
              else{
                echo 'Yes';
              }?>" readonly></td>
              <td> <input type="checkbox"  name="<?php echo $j; ++$j;?>"  style="width:100%"></td>
            </tr>

            <?php   
          }
          echo'</table></div>';
          ?>
          <br><br>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <button id="edit_submit" type="submit" name ="submit" onclick="return confirm('Are you sure you want to DELETE this VT_NO\'s?')" class="btn btn-danger btn"><span class="glyphicon glyphicon-trash"></span>Delete Selected Ones</button>

            </div>
          </div>
          <br><br>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10 text-center">
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
            $query1 = "select * from vt_info";
            $q1 = mysqli_query($link,$query1);
            $i=0;
            $flag=0;
            while($row=mysqli_fetch_array($q1))
            {
              $vt = $_POST['vt'][$i];
              
              //$del = $_POST['del'][$i];

              if(isset($_POST[''.$i.'']))
              {
                //echo " hi";
                $query11 = "delete from vt_info where vt_no='$vt'";
                if(mysqli_query($link,$query11))
                {
                  $flag=0;
                }
                else
                {
                  $flag=1;
                  break;
                  
                }
                
        // echo $name;
            
          }
          ++$i;       
        }
        if($flag==1)
                {
                  echo ' <script type="text/javascript">
                  alert("Error!!!!");
                </script>
                ';
                echo'<script>window.open("vt_del.php","_self");</script>';
              }
              else{
                echo ' <script type="text/javascript">
                alert("Deletion Successfull!!!!!");
              </script>
              ';
              echo'<script>window.open("vt_del.php","_self");</script>';
            }
      }
       if(isset($_POST['delall']))
          {
            $query22 = "delete from vt_info";
            if(mysqli_query($link,$query22))
            {
              echo ' <script type="text/javascript">
                alert("Deletion Successfull!!!!!");
              </script>
              ';
              echo'<script>window.open("vt_del.php","_self");</script>';
            }
            else
            {
              echo ' <script type="text/javascript">
                alert("Deletion Successfull!!!!!");
              </script>
              ';
              echo'<script>window.open("vt_del.php","_self");</script>';
            }
          }
      
    
    
    include"sail_footer.php";
    ?>


