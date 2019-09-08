<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("includes/config.php");

if(isset($_SESSION['login_admin']))
$username = $_SESSION['login_admin'];
else if(isset($_SESSION['login_student']))
$username=$_SESSION['login_student'];

   



if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['user']) && !empty($_POST['pass']))
	{
		$username = $_POST['user']; 
		$password = $_POST['pass'];
    
/*//include ldap auth file
include('ldap_auth.php');


	$user=_auth_ldap($username,$password);
	if($user == 2)
	{
		$_SESSION["login_error"] = "<br>ERROR : Invalid credentials. Please try again.";
		header("Location: logout.php");exit;
	}
	
*/
        $stmt = mysqli_prepare($con,"SELECT * FROM student WHERE stu_id=? AND password=?");
        mysqli_stmt_bind_param($stmt,"ss",$username,$password);
        mysqli_stmt_execute($stmt);
	//echo "Hi1";
	
        $result = mysqli_stmt_get_result($stmt) ;
	//echo $result ;


	//echo "Hi2";
        $row = mysqli_num_rows($result);
        if($row==1)                                                                                 /*If student*/
            
		{
			$_SESSION['login_student'] =$username;
            $sql="select * from application where stu_id='$username'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 1)
{
                $_SESSION['registered'] = $username;
   // $login2=$_SESSION['login2'];
}
			echo "<script type='text/javascript'> document.location = 'index1.php'; </script>";
		}
    
        else if($row==0)
	   {
		    $stmt = mysqli_prepare($con,"SELECT * FROM tpc WHERE username=? AND password=?");
            mysqli_stmt_bind_param($stmt,"ss",$username,$password);

            mysqli_stmt_execute($stmt);
            $result =mysqli_stmt_get_result($stmt);

            $row = mysqli_num_rows($result);
            if($row==1)                                                                             /*If Admin or tpc*/
		    {
			     $_SESSION['login_admin'] = $username; 
			     echo "<script type='text/javascript'> document.location = 'index2.php'; </script>";
		    }
            else
            {
			     echo "<script type='text/javascript'> alert('Invalid user Please Register yourself!');</script>";                  /*If invalid*/

            }
            
        }
    
    else
    {			     echo "<script type='text/javascript'> alert('Invalids');</script>";
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


   <meta charset="utf-8">

<script>
$(document).ready(function(){
    
	var clickEvent = false;
	$('#myCarousel').carousel({
		interval:   5000	
	}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.list-group').children().length -1;
			var current = $('.list-group li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.list-group li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
})

$(window).load(function() {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
	$('#myCarousel .list-group-item').outerHeight(triggerheight);
});
</script>	
  </head>

  <body>    
	<a href="Homee.php" style="text-decoration:none">
	<div class="heads">
		<img id="logo" src="img/logo1.png">
		<h1>Training and Placement Cell</h1>
	        <p>Don Bosco Institute of Technology, Kurla</p>
		<br>
		</a>
	</div> 

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


	<br>
	
	<?php
include("marquee.php");
  ?>
	<!--  <marquee scrollamount="" width="40">&lt;&lt;&lt;</marquee> News Feed <marquee scrollamount="5" direction="right" width="40">&gt;&gt;&gt;</marquee>
	-->
	<?php 
		//$slid=$_POST['slid'];
		//$sql = "INSERT INTO newsfeed (Content,date,time) VALUES ('$slid)";
	?>

		<br><br>



</head>
<body>
<center>
<div class="container">

  <div class="row">
  <center>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
       <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <center>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="img/03.jpg" alt="3" width="460" height="345">
        <div class="carousel-caption">
          <h3><a href="http://www.dbit.in" class="linktext">Don Bosco Institute of Technology, Kurla</a> </h3>
          <p>Know about our institution </p>
        </div>
      </div>

      <div class="item">
        <img src="img/02.jpg" alt="2" width="460" height="345">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div>
    
      <div class="item">
        <img src="img/05.jpg" alt="5" width="460" height="345">
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="img/04.jpg" alt="4" width="460" height="345">
        <div class="carousel-caption">
          <h3> <a href="#" class="linktext">Know from our students</a></h3>
          <p></p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
   <!-- Controls -->
      <div class="carousel-controls">
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>
      </center>
</div>
</center>
</div>



<br><br>
	
		<div class="row">

		<div class="col-sm-9">	

			 <div class="des" style="outline-style:double;outline-color:#4db8ff;outline-width:thick" >
		<h3>From the TPO's desk...</h3>
		
		<p align="left">
		The Training & Placement Cell of Don Bosco Institute of Technology follows best practices to make sure every talented fresh graduate engineer gets a full time employment opportunity. We have been able to develop our own unique systems & procedures to train engineering students and hence DBIT (Don Bosco Institute Of Technology) is well known as a hub for Multinational Companies recruitments. Many of the Multinational companies like TCS, Infosys, L&T Infotech, Capgimini, Jacobs Engineering, HSBC, ATOS, TAJ visit every year to recruit fresh talent from DBIT. A placement committee of faculty placement coordinators, student placement coordinators with TPO is formed to assist DBIT students in getting best in the industry jobs. DBIT Training & Placement Cell has achieved outstanding success in placing engineering students not only in MNC'S but in Small & Medium scale industries as well. Training & Placement Cell of DBIT has shown capability to ensure placement of students also in the bad non-hiring market conditions because of its excellent education quality. 
		</p>	<br><br>	
</div>




		</div>



		 <br> <br> 
        <div class="col-sm-3">

				<?php
				
if(!isset($_SESSION['login_admin']) && !isset($_SESSION['login_student']))	
{

?><div style="background-color:#f1f4f4; font-size:14px ; float:">
				
					<div class="login"  style="outline-style:double;outline-color:#4db8ff;outline-width:thick" >
					<center>
							<form class="form-signin" method="post" action="Homee.php">
								<label style="font-size:20px">Login</label><br>
								<!--<label for="inputEmail" class="sr-only">Username</label>-->
								<input name="user"  style="margin-top:5px;" type="name" id="inputEmail" class="form-control" placeholder="Username" required>
								<!--<label for="inputPassword" class="sr-only">Password</label>-->
								<input  style="margin-top:5px;" name ="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
								
								<button  style="margin-top:5px;" class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
								<input type="button" value="Register New User" onclick="window.location.href='new_user.php';" style="margin-top:5px;" class="btn btn-lg btn-primary btn-block" name="submit">
							</form>
							</center>
					</div>

						
					</div>


				</center>
				</div>
				</div>

				</div>

      
<br><br><br>

<!--
<div class="desk">
	<div class="container">
		<div class="row">
		      <div class="col-md-9"><div class="des" style="outline-style:double;outline-color:#4db8ff;outline-width:thick" >
		<h3>From the Principal's desk...</h3>
		<img src="principal.jpg" hspace="20" style="float:left" width="25%" height=25%">
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget enim leo. Nulla aliquet diam quis nisi euismod accumsan. Nulla facilisi. Nunc eleifend, risus sit amet hendrerit rhoncus, erat nibh ultricies purus, at aliquet tortor ante scelerisque neque. In vitae nisl sed ex venenatis venenatis. Nullam fringilla interdum risus, sit amet bibendum est tempus eu. Morbi dapibus est a quam volutpat ullamcorper. Proin eu nisi leo. Aliquam consequat fermentum faucibus. Sed gravida, ex sit amet egestas ultrices, orci elit tristique dui, a placerat erat quam consequat risus. Aliquam id nulla porta, tempor ante eu, sagittis elit. Phasellus ac feugiat est. Vivamus pharetra mattis nisl et dictum. Curabitur cursus est ac augue placerat luctus. Integer pulvinar metus sit amet nisl feugiat, a vestibulum ex porta. Proin viverra velit quis laoreet molestie.

		</p></div>
		<br><br>
<div class="des" style="outline-style:double;outline-color:#4db8ff;outline-width:thick" >
		<h3>From the TPO's desk...</h3>
		<img src="TPO.jpg" hspace="20" style="float:right" width="25%" height=25%">
		<p>
		The Training & Placement Cell of Don Bosco Institute of Technology follows best practices to make sure every talented fresh graduate engineer gets a full time employment opportunity. We have been able to develop our own unique systems & procedures to train engineering students and hence DBIT (Don Bosco Institute Of Technology) is well known as a hub for Multinational Companies recruitments. Many of the Multinational companies like TCS, Infosys, L&T Infotech, Capgimini, Jacobs Engineering, HSBC, ATOS, TAJ visit every year to recruit fresh talent from DBIT. A placement committee of faculty placement coordinators, student placement coordinators with TPO is formed to assist DBIT students in getting best in the industry jobs. DBIT Training & Placement Cell has achieved outstanding success in placing engineering students not only in MNC'S but in Small & Medium scale industries as well. Training & Placement Cell of DBIT has shown capability to ensure placement of students also in the bad non-hiring market conditions because of its excellent education quality. 
		</p>	<br>	
</div>
</div>     
    -->        

       
				<?php } ?>
				
				</div>
</div></div></div>


<br><br>
    

    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>


  </body>
</html>
