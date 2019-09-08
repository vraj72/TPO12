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

  
<span class="col-md-12">
<center>
<h3>Registered Students</h3>
<?php
//$result = mysqli_query($con,"SELECT * FROM student_applied where branch='IT'");
$result = mysqli_query($con,"SELECT * FROM student where branch='IT'");
echo "<table border='1'>
<tr>
<th>Student ID</th>
<th>Student Name</th>
<th>Email</th>
<th>Branch</th>
<th>10th</th>
<th>12th</th>
<th>Diploma</th>
<th>Engg Aggregate</th>
<th>Graduation Year</th>
<th>Gender</th>
<th>Mobile No</th>
<th>DOB</th>
<th>Religion</th>
<th>Aadahar</th>
<th>Address</th>
<th>City</th>
<th>State</th>
</tr>";
while($row = mysqli_fetch_array($result)){
  echo "<tr>";
  echo "<td>".$row['stu_id']."</td>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "<td>".$row['branch']."</td>";

  $sname = $row['stu_id'];
  $result1 = mysqli_query($con,"SELECT * FROM student_academic_info WHERE stu_id = '$sname' ");
  while($row1 = mysqli_fetch_array($result1)){
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
$sname = $row['stu_id'];
$result2 = mysqli_query($con,"SELECT * FROM student_placement_info WHERE stu_id = '$sname' ");
while($row = mysqli_fetch_array($result2)){
  
  echo "<td>".$row['grad_year']."</td>";
  echo "<td>".$row['gender']."</td>";
  echo "<td>".$row['mobile']."</td>";
  echo "<td>".$row['dob']."</td>";
  echo "<td>".$row['religion']."</td>";
  echo "<td>".$row['aadhaar']."</td>";
  echo "<td>".$row['address']."</td>";
  echo "<td>".$row['city']."</td>";
  echo "<td>".$row['state']."</td>";
    }
  echo "</tr>";
  
}

$result3 = mysqli_query($con,"SELECT * FROM student where branch='MECH'");

while($row = mysqli_fetch_array($result3)){
  echo "<tr>";
  echo "<td>".$row['stu_id']."</td>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "<td>".$row['branch']."</td>";

  $sname = $row['stu_id'];
  $result4 = mysqli_query($con,"SELECT * FROM student_academic_info WHERE stu_id = '$sname' ");
  while($row1 = mysqli_fetch_array($result4)){
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
$sname = $row['stu_id'];
$result5 = mysqli_query($con,"SELECT * FROM student_placement_info WHERE stu_id = '$sname' ");
while($row = mysqli_fetch_array($result5)){
  
  echo "<td>".$row['grad_year']."</td>";
  echo "<td>".$row['gender']."</td>";
  echo "<td>".$row['mobile']."</td>";
  echo "<td>".$row['dob']."</td>";
  echo "<td>".$row['religion']."</td>";
  echo "<td>".$row['aadhaar']."</td>";
  echo "<td>".$row['address']."</td>";
  echo "<td>".$row['city']."</td>";
  echo "<td>".$row['state']."</td>";
    }
  echo "</tr>";
  
}

$result6 = mysqli_query($con,"SELECT * FROM student where branch='COMPS'");

while($row = mysqli_fetch_array($result6)){
  echo "<tr>";
  echo "<td>".$row['stu_id']."</td>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "<td>".$row['branch']."</td>";

  $sname = $row['stu_id'];
  $result7 = mysqli_query($con,"SELECT * FROM student_academic_info WHERE stu_id = '$sname' ");
  while($row1 = mysqli_fetch_array($result7)){
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
$sname = $row['stu_id'];
$result8 = mysqli_query($con,"SELECT * FROM student_placement_info WHERE stu_id = '$sname' ");
while($row = mysqli_fetch_array($result8)){
  
  echo "<td>".$row['grad_year']."</td>";
  echo "<td>".$row['gender']."</td>";
  echo "<td>".$row['mobile']."</td>";
  echo "<td>".$row['dob']."</td>";
  echo "<td>".$row['religion']."</td>";
  echo "<td>".$row['aadhaar']."</td>";
  echo "<td>".$row['address']."</td>";
  echo "<td>".$row['city']."</td>";
  echo "<td>".$row['state']."</td>";
    }
  echo "</tr>";
  
}

$result9 = mysqli_query($con,"SELECT * FROM student where branch='EXTC'");

while($row = mysqli_fetch_array($result9)){
  echo "<tr>";
  echo "<td>".$row['stu_id']."</td>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "<td>".$row['branch']."</td>";

  $sname = $row['stu_id'];
  $result11 = mysqli_query($con,"SELECT * FROM student_academic_info WHERE stu_id = '$sname' ");
  while($row1 = mysqli_fetch_array($result11)){
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
$sname = $row['stu_id'];
$result10 = mysqli_query($con,"SELECT * FROM student_placement_info WHERE stu_id = '$sname' ");
while($row = mysqli_fetch_array($result10)){
  
  echo "<td>".$row['grad_year']."</td>";
  echo "<td>".$row['gender']."</td>";
  echo "<td>".$row['mobile']."</td>";
  echo "<td>".$row['dob']."</td>";
  echo "<td>".$row['religion']."</td>";
  echo "<td>".$row['aadhaar']."</td>";
  echo "<td>".$row['address']."</td>";
  echo "<td>".$row['city']."</td>";
  echo "<td>".$row['state']."</td>";
    }
  echo "</tr>";
  
}
echo "</table>";
?>


<br><br>
   <!--  <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
  <p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div> -->
  </body>
</html>