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
          			<li><a href="Academics.php">T&P cell</a></li>
				<li><a href="Recruiters.php"> Recruiters </a></li>
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
	<br>
	
	
<center>
      <div class="des" style="width:68%"><center><h2>Login</h2></center></div></center>
<br><br>

    
   <?php
      if($_SERVER["REQUEST_METHOD"]=="POST")
    {
	   $pass = $_POST['pass'];
          $username=$_SESSION['login_student'];
        $sql = "select * from stu_details where username='$username' AND password='$pass'" or die(mysql_error());
$result = mysqli_query($con,$sql);
          if(mysqli_num_rows($result) == 1)
          {
              $_SESSION['login3'] = $username.'3';
              
              echo "<script type='text/javascript'> document.location = 'drive.php'; </script>";

          }
          else
          {
              			     echo "<script type='text/javascript'> alert('Invalid');</script>";

          }
      
      }
      
    if(!isset($_SESSION['login3']))
    {
      ?>
<center>
      <div style="outline: 1px solid black; width:68%"><br>
      <center><form class="form-signin" method="post" action="plogin.php" >
        <label style="margin-left:20px;font-size:20px">Placement Login</label><br>
        <input style="width:500px;margin-left:20px;margin-top:10px;height:40px;" name="pass" type="password" id="inputpass" class="form-control" placeholder="Password" required>
		<br>
        <button class="btn btn-lg btn-primary btn-block"  style="width:400px;margin-left:20px;margin-top:10px" type="submit" name="submit">Login</button>
      </form></center><br>
</div>
      </center>
<?php }
      

/*else
{
            $_SESSION['login2'] = $username.'2';
}*/ 
      ?>
      


      <br>      <br>
      <br>
      <br>
      <br>

    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
  </body>
</html>
