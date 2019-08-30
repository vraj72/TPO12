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
	    <p>Don Bosco Institute of Technology, Kurla</p><br>
	</div> 
	</a><br>
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
    </div><br>
 <div class="container">
		<center>
		<a href="https://www.google.co.in/maps/place/Don+Bosco+Institute+Of+Technology/@19.0813686,72.8869326,17z/data=!3m1!4b1!4m2!3m1!1s0x3be7c8866a456c9f:0x8d1745d15baac575">
		<img src="img/donbosco.png" height="20%" width="70%"></a>
		</center>
	</div><br><br>
	<br><br>
    	
<div class="container pages">
	<div class="row">
		<div class="col-md-6"> 
			<div class="des">
				<div class="row">
					<h2>&nbsp;Enter Details</h2>
				</div>
			</div>
        		<br>
			<form class="form-horizontal" role="form" action="contactus.php" method="post" >
            			<div class="form-group">
					<label class="control-label col-sm-2" for="user" style="font-size:15px">Name:</label>
						<div class="col-sm-10">
							<input style="width:350px" type="text" class="form-control" id="name" name="uname" placeholder="Enter name" required>
						</div>
     
            			</div>
           			<div class="form-group">
					<label class="control-label col-sm-2" for="email" style="font-size:15px">Email ID:</label>
						<div class="col-sm-10">
							<input style="width:350px" type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
						</div>
				</div>
            
            
            			<div class="form-group">
					<label class="control-label col-sm-2" for="contact" style="font-size:15px">Phone no:</label>
						<div class="col-sm-10">
							<input style="width:200px" type="tel" class="form-control" id="phone" name="phone" placeholder="Enter contact no.">
						</div>
				</div>
           
            
            			<div class="form-group">
					<label class="control-label col-sm-2" for="company" style="font-size:15px">Institute/<br>Company:</label>
						<div class="col-sm-10">
							<input style="width:350px" type="text" class="form-control" id="comp" name="comp" placeholder="Company name">
						</div>
				</div>
            
            
            			<div class="form-group">
					<label class="control-label col-sm-2" for="site" style="font-size:15px">Website:</label>
						<div class="col-sm-10">
							<input style="width:350px" type="url" class="form-control" id="website" name="website" placeholder="Website/url">
						</div>
				</div>
            
            			 <div class="form-group">
  					<label class="control-label col-sm-2" for="query" style="font-size:15px">Query:</label>
                 				<div class="col-sm-10">
                     					<textarea class="form-control" rows="5" id="query" style="width:350px" name="query"></textarea>
                     				</div>
				</div>
                        
	   			<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button style="width:300px;" type="submit" class="btn btn-lg btn-primary btn-block" >Submit</button>
					</div>
				</div>
				</form>
		</div> 
        <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$email = $_POST['email'];
$name = $_POST['uname'];
$contact = $_POST['phone'];
$comp = $_POST['comp'];
$url=$_POST['website'];
$query = $_POST['query'];

$sql = "INSERT INTO contact (name,email,phone, company,url,query)VALUES('$name','$email','$contact','$comp','$url','$query')";
      
		$result = mysqli_query($con,$sql);
        if($result)
        {			     echo "<script type='text/javascript'> alert('Successful!');</script>";                  
}
            else
            {
                			     echo "<script type='text/javascript'> alert('Invalid data');</script>";               
            }

/*
$to = "candida2295@gmail.com";
$subject = "Placement contact";
$headers = "From: $email\n";
$message = "A visitor to your site has sent the following data.\nEmail Address: $email\nName: $name\nContact no: $contact\nCompany: $comp\nQuery $query";
mail($to,$subject,$message);
//phpinfo();
*/

 $filename = "mydata.txt";
 $f_data= '
Name : '.$name.'
Email :  '.$email.'
Contact :  '.$contact.'
Company/Organization :  '.$comp.'

Query: '.$query.' 
 ==============================================================================
';


$file = fopen($filename, "a");
fwrite($file,$f_data);
fclose($file);
}

?>
	
    		<div class="col-md-0">
    		</div>
    
   	<div class="col-md-6">
		<div class="des">
			<div class="row">
				<h2>&nbsp;Contact Us</h2>
            		</div>
		</div>
        	<h3>Don Bosco Institute of Technology</h3>
		<h4>Mumbai University</h4>
		<p>
           		 Premier Automobiles Road, Opp. Fiat Company Kurla West, 
            		 Amar Nagar,<br> Vidyavihar Society, Kurla, Mumbai,<br>
           		 Maharashtra 400 070<br>  <br>Telephone: 022 2504 2018
			<br>        
			Visit: <a href="http://www.dbit.in">www.dbit.in</a>
			<br>
			Timings: 9AM-5PM 
		</p>
        
		<div class="des">
			<div class="row">
				<h2>&nbsp;T&P Officer</h2>
            		</div>
		</div>
			<h3> Mr. BharatKumar Bhandary</h3>
			<h4>Don Bosco Institute of Technology</h4>
			<p>
            			Tel : 022 25040508 EXT 290 <br>
						Mobile : 7738393020
				<br>        
				Email:   tpo@dbit.in / dbittpocell@gmail.com
				<br>
			</p>
	</div>
	</div>
</div> 
<div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
</body>
</html>
<?php //} 
//else
//{
	//echo "<script type='text/javascript'> document.location = 'Homee.php'; </script>";
//}?>
