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

?><!DOCTYPE html>
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
		<img id= "logo" src="logo1.png">
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
                        
                                
                 ?>				<li><a href="logout.php">Logout</a></li> <?php } ?>

        		</ul>
		
      		</div>
    	</div>

<div class="main-content">
	<div class="container"><br>
		<div class="col-md-4">
		    <div class="hovereffect">
			<img class="img-responsive" src="10_big.jpg" style="height:200px; width:100%" alt="">
			<div class="overlay">
			   <h2>The Institute</h2>
			   <a class="info" href="ADInstitute.php">link here</a>
			</div>
		    </div>
		</div>

		<div class="col-md-4">
		    <div class="hovereffect">
			<img class="img-responsive" src="mission-and-vision-statement.jpg" style="height:200px; width:100%" alt="">
			<div class="overlay">
			   <h2>Vision and Mission</h2>
			   <a class="info" href="ADVision.php">link here</a>
			</div>
		    </div>
		</div>
		
		<div class="col-md-4">
		    <div class="hovereffect">
			<img class="img-responsive" src="history.jpg" style="height:200px; width:100%" alt="">
			<div class="overlay">
			   <h2>History</h2>
			   <a class="info" href="ADHistory.php">link here</a>
			</div>
		    </div>
		</div>	

		<br><br><br><br><br><br><br><br><br><br>
		<div class="content-change">
		<h3><center>The Institute</center></h3>
		<p>
		
Fr. Tony D'Souza, the Provincial of the Mumbai province of the Salesians of Don Bosco entrusted the task of building the Don Bosco Institute of Technology (DBIT) to Fr. Mario Vaz, now its Director and his team comprising Fr. Jeffrey Fernandes the Principal of S.J.I.T.I and Fr. Anthony Santarita the then administrator. In the mind of the Salesians, DBIT would have to be an engineering college with a difference and so right from the start emphasis was laid on good infrastructure and well qualified staff that would cultivate and nurture every entrant into the portals of DBIT and inspire them to excellence. This meant setting up policies and processes that would ensure this objective.<br><br>

We are fortunate in having Dr. B. S. Bhatt, former principal of VJTI as our advisor who guides us every step of the way. Mr. Albert D'souza, a friend of the Salesians was instrumental in ensuring that every requirement for the engineering college was met.<br><br>

In Dr. S.Krishnamoorthy, the Salesians found a man not only highly qualified and experienced but also a person with sound values and pedagogical principles that were akin to the philosophy of Don Bosco's system of education. Innovation, quality systems and processes that focus on development and growth for both faculty and students, are goals that are constantly being pursued.<br><br>

It is our cherished hope that every student who passes out of DBIT will be self-reliant and a socially conscious engineer.

		</p></div>

	</div>
</div>
    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
  </body>
</html>
