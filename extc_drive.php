<?php
session_start();
include("includes/config.php");      
if(isset($_SESSION['login_admin']))
$username = $_SESSION['login_admin'];
else if(isset($_SESSION['login_student']))
$username=$_SESSION['login_student'];

   
$sql="select * from application where stu_id='$username'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 1)
{
                $_SESSION['registered'] = $username;
   // $login2=$_SESSION['login2'];

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
    <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style> 
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
    <li><a href="it_drive.php">IT</a></li>
    <li><a href="comps_drive.php">COMPS</a></li>
    <li><a href="extc_drive.php">EXTC</a></li>
    <li><a href="mech_drive.php">MECHANICAL</a></li>
  </ul>
 </span>
  
<span class="col-md-9">
<center>
<h3>IT applicants</h3>
<?php
$result = mysqli_query($con,"SELECT * FROM student_applied WHERE branch = 'extc' ");

echo "<table border='1'>
<tr>
<th>Student ID</th>
<th>Company Name</th>
<th>Student Name</th>
<th>Email</th>
<th>Branch</th>
<th>10th</th>
<th>12th</th>
<th>Diploma</th>
<th>Engg Aggregate</th>
</tr>";
$arr = array();


$ind = 0;
while($row = mysqli_fetch_array($result)){
  $arr[$ind][] = $row['stu_id'];
  $arr[$ind][] = $row['c_name'];
  $arr[$ind][] = $row['stu_name'];
  $arr[$ind][] = $row['email'];
  $arr[$ind][] = $row['branch'];
  

  echo "<tr>";
  echo "<td>".$row['stu_id']."</td>";
  echo "<td>".$row['c_name']."</td>";
  echo "<td>".$row['stu_name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "<td>".$row['branch']."</td>";
  $sname = $row['stu_id'];
  $result1 = mysqli_query($con,"SELECT * FROM student_academic_info WHERE stu_id = '$sname' ");
  while($row1 = mysqli_fetch_array($result1)){
	  $arr[$ind][] = $row1['sem1'];
	  $arr[$ind][] = $row1['sem2'];
	  $arr[$ind][] = $row1['sem3'];
	  $arr[$ind][] = $row1['sem4'];
	  $arr[$ind][] = $row1['sem5'];
	  $arr[$ind][] = $row1['sem6'];
	  $arr[$ind][] = $row1['X'];
	  $arr[$ind][] = $row1['XII'];
	  $arr[$ind][] = $row1['Dip'];
    $i = $row1['sem1'];
    $ii = $row1['sem2'];
    $iii = $row1['sem3'];
    $iv = $row1['sem4'];
    $v = $row1['sem5'];
    $vi = $row1['sem6'];
    $agg = ($i+$ii+$iii+$iv+$v+$vi)/6;
    echo "<td>".$row1['X']."</td>";
    echo "<td>".$row1['XII']."</td>";
    echo "<td>".$row1['Dip']."</td>";
    echo "<td>".$agg."</td>";
  }
  echo "</tr>";
   $ind++;
  
}
echo "</table>";
echo "</center>";
 /*
 echo "<pre>";
   print_r($arr);
   echo "</pre>";*/
   
   
$filename='file_EXTC'.strtotime(date('Y-m-d')).'.csv';
$fp=fopen($filename,'w');

foreach($arr as $fields)
{
		fputcsv($fp,$fields);
	
}

fclose($fp);
echo "<a href='".$filename."'><button value='Download' name='Download'>Download</button></a>";

?>


<br><br>
   <!--  <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
  <p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div> -->
  </body>
</html>
