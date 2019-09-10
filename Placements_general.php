<?php
session_start();
include("includes/config.php");      
if(isset($_SESSION['login_admin']))
$username = $_SESSION['login_admin'];
else if(isset($_SESSION['login_student']))
$username=$_SESSION['login_student'];

   if(isset($_SESSION['login_student']))
   {
$sql="select * from application where stu_id='$username'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 1)
{
                $_SESSION['registered'] = $username;

}}
$year=$_GET['year'];
$year1=$year-1999; 



if(isset($_POST["upload"]))
{
 if($_FILES['Upload_format']['name'])
 {
  $filename = explode(".", $_FILES['Upload_format']['name']);
  if(end($filename) == "csv")
  {
      $handle = fopen($_FILES['Upload_format']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $name = mysqli_real_escape_string($con, $data[0]);
    $branch = mysqli_real_escape_string($con, $data[1]);  
    $company = mysqli_real_escape_string($con, $data[2]);
    $year = mysqli_real_escape_string($con, $data[3]);
    $query = "
     INSERT INTO placed_info (stud_name , branch , company , year) VALUES ('$name','$branch','$company','$year')";
    mysqli_query($con, $query);
   }
   fclose($handle);
  }
  else
  {
    echo '<script type="text/javascript">alert("Upload CSV# File")</script>';
  }
 }
 else
 {
  echo '<script type="text/javascript">alert("Upload File")</script>';
 }
 }




?>
<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>    
  </head>

  <body>    
  <a href="Homee.php" style="text-decoration:none">
  <div class="heads">
    <img id="logo" src="logo1.png">
    <h1>Training and Placement Cell</h1>
          <p>Don Bosco Institute of Technology, Kurla</p>
    <br>
    
  </div> 
  </a>

  <br>
  <div class="nav nav-tabs">
    <div class="container">
            <ul class="pull-right nav nav-pills">
        <li><a href="Homee.php">Home</a></li>
              <li><a href="ADInstitute.php">About DBIT</a></li>
                <li><a href="Academics.php">T&P Cell</a></li>
        <li><a href="Recruiters.php">Recruiters</a></li>
                <li><a href="Placements_general.php?year=2015">Placement Records</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
        <?php 
           if(isset($_SESSION['login_admin']) || isset($_SESSION['login_student']))
                    {
                        if(isset($_SESSION['login_admin']))
                        {                           
                    ?>
                              <li><a href="index2.php">Admin</a></li>
<li><a href="drive.php">Upcoming Drive</a></li>

                        <?php 

                        }
                        if(isset($_SESSION['login_student']))
                        {
                        
                            if(!isset($_SESSION['registered'])) 
                            { 
            
                                    ?>

                                    <li><a href="index1.php">Registration</a></li>
                                <?php 
                    
                            }
                        
                            else
                            {
                                
                                    ?>              
                                
                                    <li><a href="drive.php">Upcoming Drive</a></li>
                                <?php
                                }
                            }
                        
                                
                 ?>       <li><a href="logout.php">Logout</a></li> <?php } ?>
</ul>
    
          </div>
      </div>
<br><center>
<div class="container">
<span class="col-md-3"><br>
  <ul class="nav nav-pills nav-stacked">
    <!-- <li><a href="Placements2014.php">Placements 2013-14</a></li>
    <li><a href="Placements_general.php">Placements 2014-15</a></li>
    <li><a href="Placements2016.php">Placements 2015-16</a></li> -->
    <?php
    include("includes/config.php");
    $stmt ='SELECT distinct year from placed_info';
    $result_s=mysqli_query($con,$stmt);
    $count_s=mysqli_num_rows($result_s);
    while($rows=mysqli_fetch_array($result_s)){
      ?>
      <li><a href="Placements_general.php?year=<?php echo $rows['year']?>" >Placements <?php echo $rows['year']." - "; echo $rows['year']-1999; ?></a></li>
      <?php
              } ?>
              </ul><?php


               if(isset($_SESSION['login_admin']))
                        {                           
              ?> 
              <br>
              <h4>ADD New Data</h4>
              
              <a href="Upload_format.csv" style="background: lightblue;">Get CSV Format</a>
              <br><br>
              <form method="post" enctype='multipart/form-data'>
              <input type="file" name="Upload_format" style="background: lightblue"/><br>
              <input type="submit" name="upload" value="upload" />
              </form>
             
          <?php }
 ?>
  
 </span>
<span class="col-md-9">
<center>
<h3>Placements <?php echo $year; echo " - "; echo $year1; ?></h3>
<?php
 
// echo $year; 

print_table($year);
function print_table($year){
    include("includes/config.php");
    $stmt ="SELECT stud_name,branch ,company FROM placed_info where year = '$year'";
    $result=mysqli_query($con,$stmt);
    $count=mysqli_num_rows($result);
    $i=0;
    ?>
    <table border="0" cellspacing="0"><colgroup width="60"></colgroup> <colgroup width="250"></colgroup> <colgroup width="182"></colgroup> <colgroup width="279"></colgroup>
      <tbody>
        <tr>
          <td style="border: 2px solid black; padding: 10px" align="center" ><h4>SR no.</h4></td>
          <td style="border: 2px solid black; padding: 10px" align="center" ><h4>Student Name </h4></td>
          <td style="border: 2px solid black; padding: 10px" align="center"><h4>Branch</h4></td>
          <td style="border: 2px solid black; padding: 10px" align="center"><h4>Company</h4></td><br>
        </tr>
        <?php

         while($rows=mysqli_fetch_array($result)){
                        $i=$i+1;?>
                <tr>
                  <td style="border: 2px solid black;" align="center" height="25"><?php echo $i?></td>
                  <td style="border: 2px solid black;" align="center" height="25"><?php echo $rows['stud_name']; ?></td>
                  <td  style="border: 2px solid black;" align="center"><?php echo $rows['branch']; ?></td>
                  <td style="border: 2px solid black;" align="center"><?php echo $rows['company']; ?></td>
                </tr>
                <?php
              }
            }
              ?> 
              </tbody></table>
  </span>
</center>
</div>
              <br><br><br><br><br>
 <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
  <p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
  </body>
</html> 
