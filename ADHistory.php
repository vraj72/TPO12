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
                        
                                
                 ?>				<li><a href="logout.php">Logout</a></li> <?php } ?>

        		</ul>

		
      		</div>
    	</div>

<div class="main-content">
	<div class="container"><br>
		<div class="col-md-4">
		    <div class="hovereffect">
			<img class="img-responsive" src="img/10_big.jpg" style="height:200px; width:100%" alt="">
			<div class="overlay">
			   <h2>The Institute</h2>
			   <a class="info" href="ADInstitute.php">link here</a>
			</div>
		    </div>
		</div>

		<div class="col-md-4">
		    <div class="hovereffect">
			<img class="img-responsive" src="img/mission-and-vision-statement.jpg" style="height:200px; width:100%" alt="">
			<div class="overlay">
			   <h2>Vision and Mission</h2>
			   <a class="info" href="ADVision.php">link here</a>
			</div>
		    </div>
		</div>
		
		<div class="col-md-4">
		    <div class="hovereffect">
			<img class="img-responsive" src="img/history.jpg" style="height:200px; width:100%" alt="">
			<div class="overlay">
			   <h2>History</h2>
			   <a class="info" href="ADHistory.php">link here</a>
			</div>
		    </div>
		</div>	

		

		<br><br><br><br><br><br><br><br><br><br>
		<div class="content-change">
		<h3><center>History</center></h3>
		<p>
		

Mumbai is a large industrial city of India. Considering this fact, the Salesians who were established at Matunga since 1928 decided to start a technical school. This was done to cater to the growing demand for skilled workers in the industrial sector. Fr. Maschio and Fr. Rubio took charge of finding a plot for this purpose. They finally settled on a plot at Kurla shown to them by Rev. Peter Pereira, the parish priest of Holy Cross Church, Kurla. Now on this plot are three excellent Technical Institutes known to Mumbai.
St. Joseph's ITI<br><br>

His Eminence Valerian Cardinal Gracias laid the foundation stone for the St. Joseph's Industrial Training Institute on January 30, 1963 and the first session of the training school started on August 27, 1965. St. Joseph's I.T.I was the first institute set up by the Salesians at Kurla. It started with 56 students and today has a strength of 198 students. The I.T.I provides training in trades such as Fitters, Machinists, Motor Vehicle Mechanic, Electrical maintenance, Electronics, A.C. maintenance etc. These courses usually run for a period of two years. Till date it has produced a number of quality technicians and is now one of the premier ITIs in Mumbai.
Don Bosco Maritime Academy (D.B.M.A)<br><br>

In 1998 , the Salesians thought of expanding and extending their services, from the technical field to the sea world. Don Bosco Maritime Academy was set up to train prospective & serving seagoing personnel, as per the STCW Convention of International Maritime Organization (IMO). It was a driving ambition to make sure that students turn out to be excellently trained, competent and committed Engineers. DBMA thus became the first institute to start the 'ATS' (Alternate Training Scheme) course. This unique venture, a three-year program, provided those aspiring to be marine engineers, an entry into the Merchant Navy. DBMA is committed to producing Engineers who will be among the best in the Marine Industry.Don Bosco Institute of Technology (D.B.I.T)<br>
Don Bosco Institute of Technology (D.B.I.T)<br><br>

With globalization and a radical shift of the industry into the Electronic and IT fields, the need of the hour was excellent engineers. With its vast experience in managing educational institutes and especially technical ones, it was natural that the Salesians enter the engineering field. Thus DBIT came into existence in 2001.


		</p></div>

	</div>
</div>
    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
  </body>
</html>
