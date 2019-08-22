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
				<!--<li><a href="addnews.php">Add</a></li> -->
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
                        
                                
                 ?>				<li><a href="logout.php">Logout</a></li> <?php } ?>

        		</ul>
		
      		</div>
    	</div>
	
	
	

		<?php if($username=='abcd')
{
      //echo $username;
      ?>
      <center><H1>Welcome Admin</H1>

<br><br>
     <div class="des" style="border-radius:25px; width:50%"><a href=drive.php style="text-decoration:none" ><h4 style="font-family: Impact">Add new drive</h4></a></center></div>
            <br><br>
			<center><div class="des" style="border-radius:25px; width:50%"><a href="it.php" style="text-decoration:none" > <center><h4 style="font-family: Impact"> View list of applicants</h4></a></center></div>
      <br><br>
  <center><div class="des" style="border-radius:25px; width:50%"><a href="it_drive.php" style="text-decoration:none" > <center><h4 style="font-family: Impact"> View list of Applied Student</h4></a></center></div>	  
	<br><br> 
  <center><div class="des" style="border-radius:25px; width:50%"><a href="registered_students_list.php" style="text-decoration:none" > <center><h4 style="font-family: Impact"> View list of Registered Students</h4></a></center></div>
   <br><br>
			<center><div class="des" style="border-radius:25px; width:50%"><a href="undertakingcheck.php" style="text-decoration:none" > <center><h4 style="font-family: Impact">Undertaking</h4></a></center></div>
      <br><br>
	  
	  <center><div class="des" style="border-radius:25px; width:50%"><a href="addnews.php" style="text-decoration:none" > <center><h4 style="font-family: Impact">Change News Feed</h4></a></center></div>
      <br><br>
	  <?php }
      
       ?>
            
      
<br>
      <br>
    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>

  </body>
</html>
<?php  

	//echo "<script type='text/javascript'> document.location = 'Homee.php'; </script>";
?>
