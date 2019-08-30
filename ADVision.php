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
		<h3><center>Vision And Mission</center></h3>
		<p>
		

What is our vision?<br>

DBIT will be known to have an innovative, enjoyable and holistic learning environment that enhances individual success, the Don Bosco way. We seek to make DBIT the preferred choice of students, employers hiring engineering graduates and practitioners seeking further education.<br>

We aim to provide service in the best tradition of Don Bosco, by seeking to develop entrepreneurial attitude and social commitment in every student we train. DBIT will make a contribution to society through its educative process in a diverse and stimulating learning environment wherein students, faculty and staff can strive and grow.<br>

 
What do we care about?<br>

    To produce engineers who will excel in industry and research.<br>

    To provide consultancy to various industries.<br>

    To provide programmes which are contemporary and relevant to industry.<br>

    To share expertise and resources for the benefit of underprivileged youth of local communities.<br>

    To be a center of research and development in the field of technology.<br>

    To gain recognition in the field of technical education, both nationally and internationally.<br>


		</p></div>

	</div>
</div>
    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
  </body>
</html>
