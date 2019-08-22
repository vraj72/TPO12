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
if (!empty($_POST['new'])) {
 $title=$_POST['title'];
 $content = $_POST['content'];
 $branch = $_POST['branch'];

 $sql = "INSERT INTO post (title,content,branch)VALUES('$title','$content','$branch')";

 $result = mysqli_query($con,$sql);
 if($result)
  {			     echo "<script type='text/javascript'> alert('Added!');</script>";                  
}
else
{
  echo "<script type='text/javascript'> alert(Failed. Try again.);</script>";               
}
}

$s_name= $_POST['sname'];
$c_name=$_POST['cname'];

$sql_stud_details = "SELECT * FROM student WHERE stu_id = '$s_name' ";
$result_stud_details = mysqli_query($con,$sql_stud_details);

while($row = mysqli_fetch_assoc($result_stud_details)){
	$stu_name = $row["name"];
	$branch = $row["branch"];
	$email = $row["email"];

	$sql_insert = "INSERT INTO student_applied (stu_id,c_name,stu_name,email,branch) VALUES('$s_name','$c_name','$stu_name','$email','$branch')";
	$result = mysqli_query($con,$sql_insert);
	 if($result){
	 	/*die($s_name." ".$c_name);*/
	 	die("Successfully Applied");
	 }
	else{
		die("Try Again");
	}
}
//die($s_name." ".$c_name);
?>