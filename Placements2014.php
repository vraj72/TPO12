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
   // $login2=$_SESSION['login2'];

}}

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
                <li><a href="Placements2015.php">Placement Records</a></li>
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
    <li><a href="Placements2014.php">Placements 2013-14</a></li>
    <li><a href="Placements2015.php">Placements 2014-15</a></li>
    <li><a href="Placements2016.php">Placements 2015-16</a></li>
  </ul>
 </span>
  
<span class="col-md-9">
<center>
<h3>Placements 2013-14</h3>
<?php
    include("includes/config.php");
    $stmt ='SELECT stud_name,branch ,company FROM placed_info where year = "2014"';
    $result=mysqli_query($con,$stmt);
    $count=mysqli_num_rows($result);
    $i=0;
    // echo $i;
    // echo $count;
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
              ?> 
              </tbody></table>
  </span>
</center>
</div>
 <?php
echo $i;
echo $count;

              ?> 
              <br><br><br><br><br>
 <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
  <p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
  </body>
</html> 
