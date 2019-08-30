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
		<img id="logo" src="img/logo1.png">
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
		<div class="des">
				<div class="row">
					<h2>&nbsp;T&P Officer</h2>
				</div>
		</div>
		<br><!img src="img/TPO.jpg" hspace="20" style="float:right" width="25%" height=25%"/>
		<p><br>
		<b>Mr. BharatKumar Bhandary</b> , Training & Placement officer (DBIT) is an experienced industry professional and presently heading 
   		 T&P Cell of Don Bosco Institute Of Technology (Mumbai) .
		<br><br> He has experience of working with leading overseas recruitment consultancies & has recruited people across levels 			for Middle East, Africa & India. <br><br>
		Educational Qualification:
                <br> 
    		<ul>
       			<li>Diploma in Mechanical Engineering </li>
        		<li>Bachelor of Engineering (B.E)  - Production Engineering </li>
        		<li>M.B.A - Human Resource Management & Finance Management</li> 
        	</ul>
        	</p><br>	
			
		<div class="row">
			<div class="des">
				<div class="row">
					<h2>&nbsp;Placement Coordinators</h2>
				</div>
			</div>
			<div class="col-md-6" >
				<div class="section">
					<h3>Dept. of Mechanical Engineering</h3>
					<img src="img/atul.jpg" style="float:right;width:20%;height:20%">
					<p><b>Mr.Atul Lohar</b><br><br>
					<b>Degree:</b>BE ,M.Tech (Production)<br>
					<b>Teaching Experience:</b> 1 year<br>
					<b>Industry Experience:</b>	1 years <br>
					<b>Area of Specialization:</b><br>
					Production Engineering
					
					</p>
					
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="section">
					<h3>Dept. of Information Technology</h3>
					<img src="img/udaynayak.jpg" style="float:right;width:20%;height:20%">
					<p><b>Mr.Uday Nayak</b><br><br>
					<b>Degree:</b>MS (Master of Science) in Computer Science (2002)
					University of Toledo, OHIO, USA<br>
					<b>Teaching Experience:</b> 15 years<br>
					<b>Area of Specialization:</b><br>
					1. Machine Learning, Big Data Analytics,<br>&nbsp;&nbsp;&nbsp; Data Mining & Business 							Intelligence<br>
					2. Security in Computing & Cryptography<br>
					3. Theory of Computation / Automata Theory
					
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="section">
					<h3>Dept. of Computer Science</h3>
					<img src="img/kalpita.jpg" style="float:right;width:20%;height:20%">
					<p><b>Mrs.Kalpita K</b><br><br>
					<b>Degree:</b>  M.Tech (Computer Engineering) <br>
					<b>Teaching Experience:</b> 15 years<br>
					<b> Industry Experience:</b>	5 years <br>
					<b>Area of Specialization:</b><br>
					Gird computing,Distributed system,embedded system,distributed database,parallel computing
				
					
					</p>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="section">
					<h3>Dept. of Electronics and Telecommunication</h3>
					<!img src="img/sample.jpg" style="float:right;width:20%;height:20%">
					<p><b>Ms.Anjum Khan</b><br><br>
					<b>Degree:</b>BE, ME(Electronics and Telecommunication)<br>
					<b>Teaching Experience:</b> 15 years<br>
					<b>Area of Specialization:</b><br>
					1. Machine Learning, Big Data Analytics,<br>&nbsp;&nbsp;&nbsp; Data Mining & Business 							Intelligence<br>
					2. Security in Computing & Cryptography<br>
					3. Theory of Computation / Automata Theory
					
					</p>
				</div>
			</div>
		</div>

	</div>
                                                                                  
</div>
                                                                                  <br><br><br><br><br>
    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
  </body>
</html>
