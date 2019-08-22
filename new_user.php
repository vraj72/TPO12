<!doctype html>
<?php
	$servername = "localhost";
$username = "viraj";
$password = "qwerty";
$dbname = "dbit2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$rollno = $_POST['rollno'];
		$branch = $_POST['branch'];	
		$email = $_POST['email'];
		$status = "allowed";
		$result = mysqli_query($conn,"SELECT branch,rollno FROM undertakingcheck WHERE branch = '$branch' AND rollno = '$rollno'");
		if (mysqli_num_rows($result)>0){
			echo "<script>alert('Please Submit the Undertaking Form'); </script>";
			$status="reject";
			}
		else{
			
		$sql = "INSERT INTO student (sr_no, stu_id, password, name, rollno, branch, email, status) VALUES (1, '$username', '$password', '$fullname', 
		'$rollno', '$branch', '$email', '$status')";
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('User Registered Successfully!Please Sign In');
			document.location.href='Homee.php';</script>";
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	
		}
	}
?>
<html>
	<head>
		<title>Register New User</title>
		<style>
		</style>
		<link rel="stylesheet" href="bootstrap.css">
		<link rel="stylesheet" href="main.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="jquery.min.js"></script>
		<script src="bootstrap.min.js"></script>
		<meta charset="utf-8">
	</head
	<body>
		<a href="Homee.php" style="text-decoration:none">
			<div class="heads">
				<img id="logo" src="logo1.png">
				<h1>Training and Placement Cell</h1>
				<p>Don Bosco Institute of Technology, Kurla</p>
				<br>
			</div>
		</a>
		<div class="nav nav-tabs">
			<div class="container">
				<ul class="pull-right nav nav-pills">
					<li><a href="Homee.php">Home</a></li>
					<li><a href="ADInstitute.php">About DBIT</a></li>
					<li><a href="Academics.php">T&P Cell</a></li>
					<li><a href="Recruiters.php">Recruiters</a></li>
					<li><a href="Placements2016.php">Placement Records</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
				</ul>
			</div>
		</div>
		<br>
		<marquee scrolldelay="" behavior="" style=""> <b> <h4>&lt;&lt;&lt;News Feed : Infosys coming to DBIT soon.</h4></b> </marquee>
		<br>
		<center>
			<div style="background-color:#f1f4f4; font-size:14px;width:30%;">
				<div class="login"  style="outline-style:double;outline-color:#4db8ff;outline-width:thick" >
					<center>
						<form class="form-signin" method="post" action="<?php $_PHP_SELF ?>">
							<label style="font-size:20px">Register New User</label><br>
							<!--<label for="inputEmail" class="sr-only">Username</label>-->
							<input name="username" style="margin-top:5px;" type="name" class="form-control" placeholder="Moodle ID" required/>
							<br>
							<!--<label for="inputPassword" class="sr-only">Password</label>-->
							<input style="margin-top:5px;" name="password" type="password" class="form-control" placeholder="Moodle Password" required/>
							<br>
							<!--Input for Full Name-->
							<input style="margin-top:5px;" name="fullname" type="name" class="form-control" placeholder="Full Name" required/>
							<br>
							<!--Input for Roll no.-->
							<input style="margin-top:5px;" name="rollno" type="rollno" class="form-control" placeholder="Roll no." required/>
							<br>							
							<!--Input for Email-->
							<input style="margin-top:5px;" name="email" type="email" class="form-control" placeholder="Email" required/>
							<br>
							<!--Branch Selection-->
							<select name="branch" default="Select Branch">
								<option hidden value="Select Your Branch">Select Your Branch</option>
								<option value="EXTC">EXTC</option>
								<option value="IT">IT</option>
								<option value="COMPS">COMPS</option>
								<option value="MECH">MECH</option>
							</select>
							<br>
							
							<br>
							<!--Submit Button-->
							<input  style="margin-top:5px;" class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Register"></input>
							<br>
						</form>
					</center>
				</div>
			</div>
			<br><br>
			<div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
				<p align="center"> CopyRight &copy; 2017 DBIT. Don Bosco Institute of Technology.</p>
			</div>
		</center>
	</body>
</html>