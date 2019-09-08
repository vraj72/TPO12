<?php
session_start();
include("includes/config.php");
if(isset($_SESSION['login_admin']))
$username = $_SESSION['login_admin'];
else if(isset($_SESSION['login_student']))
$username=$_SESSION['login_student'];
    
if(isset($_SESSION['login_student']))
{$sql="select * from application where stu_id='$username'";
    $result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 1)
{
                $_SESSION['registered'] = $username;

}
   
// echo $_SESSION['login_student'];
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
                                
                 ?>
                    
                    
                    <li><a href="logout.php">Logout</a></li>
<?php
                    }
                    
                    
                    
                    ?>

        		</ul>
		
      		</div>
    	</div>
	<br>
	
	<center>
	<div class="des" style="border-radius:25px;width:68%" >
      <center><H1 style="font-family:Impact">Register for placements</H1></center>

	<br><br>

    
   <?php
      
      function generateStrongPassword($length=9, $add_dashes=false, $available_sets='luds')
{
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';
	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}
	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[array_rand($all)];
	$password = str_shuffle($password);
	if(!$add_dashes)
		return $password;
	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
}
//print_r($_POST);

      if($_SERVER["REQUEST_METHOD"]=="POST")
if(isset($_POST["submit"]))
    {
         // $pp=generateStrongPassword();
         /*  echo "Hi";
		  echo "<pre>";
		  print_r($_FILES);
		  echo "</pre>";
		  exit; */
	   $resume = $_POST['resume'];
       $graduation = $_POST['graduation'];
	   $fname = $_POST['fname'];
	   $mname = $_POST['mname'];
       $lname = $_POST['lname'];
	   $dept = $_POST['dept'];
	   $gender = $_POST['gender'];
	   $mob = $_POST['mob'];
	   $email = $_POST['email'];
	   $dob = $_POST['dob'];
       $caste = $_POST['caste'];
	   $religion = $_POST['religion'];
	   $pob = $_POST['pob'];
	   $aadhaar = $_POST['aadhaar'];
	   $address = $_POST['address'];
	   $city = $_POST['city'];
	   $state = $_POST['state'];
	   $pc = $_POST['pc'];  
           $place = $_POST['place'];
	   $placestat = $_POST['placestat'];
         
$sql = "insert into student_placement_info(stu_id,resume_upload, 
grad_year,fname,mname,lname,dept,gender,mobile,email,dob,caste,religion,pob,aadhaar,address,city,state,pc,interest,status) values('$username','$resume','$graduation','$fname','$mname','$lname','$dept','$gender','$mob','$email','$dob','$caste','$religion','$pob','$aadhaar','$address','$city','$state','$pc','$place','$placestat')" or die(mysql_error());

          $result1 = mysqli_query($con,$sql);

         
          
	   $X = $_POST['X'];
	   $Xboard = $_POST['Xboard'];
	   $XII = $_POST['XII'];
	   $XIIboard = $_POST['XIIboard'];
	   $Dip = $_POST['Dip'];
	   $Dipboard = $_POST['Dipboard'];
	   $sem1 = $_POST['sem1'];
       $sem2 = $_POST['sem2'];
	   $sem3 = $_POST['sem3'];
	   $sem4 = $_POST['sem4'];
	   $sem5 = $_POST['sem5'];
	   $sem6 = $_POST['sem6'];
	   $sem7 = $_POST['sem7'];
	   $LKTs = $_POST['LKTs'];
	   $DKTs = $_POST['DKTs'];
	   $cert = $_POST['cert'];
          
	   $sql = "insert into student_academic_info(stu_id,X,Xboard,XII,XIIboard,Dip,Dipboard,sem1,sem2,sem3,sem4,sem5,sem6,sem7,LKTs,DKTs,cert) values('$username','$X','$Xboard','$XII','$XIIboard','$Dip','$Dipboard','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$LKTs','$DKTs','$cert')" or die(mysql_error());
             
            
$result2 = mysqli_query($con,$sql);






	   $ffname = $_POST['ffname'];
	   $foccupation = $_POST['foccupation'];
	   $fmob = $_POST['fmob'];
	   $femail = $_POST['femail'];
	   $mfname = $_POST['mfname'];
	   $moccupation = $_POST['moccupation'];
	   $mmob = $_POST['mmob'];
       $memail = $_POST['memail'];
	  
$sql = "insert into student_parent_info(stu_id,fname,foccupation,fmob,femail,mname,moccupation,mmob,memail) values('$username','$ffname','$foccupation','$fmob','$femail','$mfname','$moccupation','$mmob','$memail')" or die(mysql_error());
          $result3 = mysqli_query($con,$sql);






/* echo "<pre>";
		  print_r($_FILES);
		  echo "</pre>"; */

$updatefilename = basename($_FILES["pdfFile"]["name"]);

  $target_dir = "resumes/";
  $target_file = $target_dir .$updatefilename;
  $uploadOk = 1;
 // echo $target_file;
  
  
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  //echo $imageFileType;exit;
  
  
  
  // Check file size
  if ($_FILES["pdfFile"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  
  
  // Allow certain file formats
  if($imageFileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
  }
 
  
  // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
  //    echo "The file for user ".$_SESSION["userid"]." with name: ". basename( $_FILES["pdfFile"]["name"]). " has been uploaded.";
   	$addedfile=1;
	} else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

//echo "added file status=".$addedfile;



/*var_dump($result1);
var_dump($result2);
var_dump($result3);*/
          if($result1 && $result2 && $result3 )
          {


          /*
$to = "$email";
$subject = "Placement application";
$headers = "From: $email\n";
$message = "A student applied for placements.\n Resume uploaded:$resume\n Graduation year:$graduation\nFirst name:$fname\n Middle name:	   $mname\n Last name:$lname\n Department:$dept\nGender:$gender\nMobile number:$mob\nEmail ID:$email\n Date of Birth:$dob\nCaste:$caste\n Religion:$religion\nPlace of birth:$pob\n Aadhaar card no.:$aadhaar\nAddress:$address\nCity:$city\nState:$state\nPin code:$pc\nInterested in placements:$place\n Placement status:placestat";
mail($to,$subject,$message);
//phpinfo();
*/

 /*$filename = "registration.txt";
 $f_data= '
Name : '.$username.'
Email :  '.$email.'
Password :  '.$pp.'
 ==============================================================================
';
          $file = fopen($filename, "a");
fwrite($file,$f_data);
fclose($file);
*/   



            $sql="insert into application(stu_id) values ('$username')";
    		$result = mysqli_query($con,$sql);
//    echo "";
              if($result)
              {

              	$_SESSION['registered']=$username;
              }
                echo "<script type='text/javascript'> alert('Successful!');</script>";
              	echo "<script type='text/javascript'> document.location = 'index1.php'; </script>";
              
              //If invalid*
			} 
             else
          {
              
              			     echo "<script type='text/javascript'> alert('Invalid! Try 1 again');</script>";                  //Ifinvalid

              
          }
      
 
      }
        
        
        
    if(isset($_SESSION['registered']))
        {
        
          ?>
        	<p>You have already registered. Kindly wait for further notifications.</p>
        
        <?php
        }
        	if(!isset($_SESSION['registered']))
        {
            ?>
        


        
        <center>
	<div class="des" style="border-radius:25px;width:68%">
        	
	</div>
      </center>
	<br><br>
	<center>

<form class="form-signin" action="index1.php" method="post" enctype="multipart/form-data">
	<table border="2" width="68%">
		<tr>
		<td><center>Resume uploaded?</center></td>
		<td><center>
			<input type="radio" name="resume" value="yes">Yes</input>
			<input type="radio" name="resume" value="no">No</input>
		</center>
		</td>
			
		</tr>
		
		<tr>
			
		<td>
			<br>
<center>Year of graduation</center>	<br>
</td>
		<td>
<center>
<br>
<select id="year_option" name="graduation">
<?php
for($i =date("Y")-5; $i < date ("Y")+5 ; $i++){

	echo '<option value="'.$i.'">'.$i.'</option>';

}
?>

</select><br><br>
			
		</center>
		</td>
		</tr>
		<tr>
		<td>	<br>
<center>First name*</center>	<br>
</td>
		<td>
<center>
			<input type="text" name="fname"   pattern="[a-zA-z]+" required></input>
    </center>

		</td>
		</tr>
		<tr>
		<td><br><center>Middle name*</center><br></td>
		<td><center>
			<input type="text" name="mname" pattern="[a-zA-z]+" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Last name*</center><br></td>
		<td><center>
			<input type="text" name="lname" pattern="[a-zA-z]+" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Department*</center><br></td>
		<td>
		<center>	
			<select>
				<option selected hidden>Choose One</option>
				<option>Information Technology</option>
				<option>Mechanical</option>
				<option>Electronics and Telecommunication</option>
				<option>Computer</option>
			</select>

		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Gender</center><br></td>
		<td><center>
			
			<input type="radio" name="gender" >Male&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</input>
			<input type="radio" name="gender" >Female</input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Mobile number*</center><br></td>
		<td><center>
			
			<label>+91 </label><input type="tel" name="mob" required  maxlength="10" pattern="[0-9]{10}">[10 digit number only]</input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Email Id*</center><br></td>
		<td><center>
			
			<input type="text" name="email" required>[e.g:abc@gmail.com]</input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Date of Birth*</center><br></td>
		<td>
<center>
<input type="date" name="dob"/>
<br><br>
</center>
		
		</td>
		</tr>
		<tr>
		<td><br><center>10 Std % and Board*</center><br></td>
		<td><center>
			
			<input type="number" name="X" min="35" max="100" placeholder="Percentage" required></input> &nbsp&nbsp <input type="text" placeholder="Board" name="Xboard" pattern="[a-zA-z]+"  required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>12 Std % and Board</center><br></td>
		<td><center>
			
			<input type="number" name="XII" min="35" max="100" placeholder="Percentage"></input> &nbsp&nbsp <input type="text" placeholder="Board" name="XIIboard" pattern="[a-zA-z]+" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Diploma % and Board</center><br></td>
		<td><center>
			
			<input type="number" name="Dip" min="40" max="100" placeholder="Percentage"></input> &nbsp&nbsp <input type="text" placeholder="Board" name="Dipboard" pattern="[a-zA-z]+"></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Enter CGPA</center><br></td>
		<td><center>
			
			Sem I*: <input type="number" name="sem1" min="1" max="10" step="0.01" required></input> <br> <br> 
			Sem II*: <input type="number" name="sem2" min="1" max="10" step="0.01" required><br><br></input>
			Sem III*: <input type="number" name="sem3" min="1" max="10" step="0.01" required></input><br> <br> 
			Sem IV*: <input type="number" name="sem4" min="1" max="10" step="0.01"  required><br><br></input>
			Sem V*: <input type="number" name="sem5" min="1" max="10" step="0.01" required></input><br>  <br> 
			Sem VI*: <input type="number" name="sem6" min="1" max="10" step="0.01" required><br><br></input>
			Sem VII*: <input type="number" name="sem7" min="1" max="10"step="0.01" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>No of KTs</center><br></td>
		<td><center>
			
			<br>Live: <input type="number" name="LKTs" min="0" max="20"></input> <br><br>Dead:<input type="number" name="DKTs" min="0" max="20"></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Additional certifications</center><br></td>
		<td><center>
			
			Enter license number:<input type="text" name="cert"></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Category*</center><br></td>
		<td><center>
			
			<input type="radio" name="caste">OBC&nbsp&nbsp&nbsp</input>
			<input type="radio" name="caste">ST&nbsp&nbsp&nbsp</input>
			<input type="radio" name="caste">SC&nbsp&nbsp&nbsp</input>
			<input type="radio" name="caste">Open&nbsp&nbsp&nbsp</input>
			<input type="radio" name="caste">Others&nbsp&nbsp&nbsp</input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Religion*</center><br></td>
		<td><center>
			
			<input type="text" name="religion" pattern="[a-zA-z]+" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Place of birth*</center><br></td>
		<td><center>
			
			<input type="text" name="pob" pattern="[a-zA-z]+" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Aadhar number</center><br></td>
		<td><center>
			
			<input type="text" name="aadhaar" placeholder="12 digit" pattern="[0-9]{12}"></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Address*</center><br></td>
		<td><center>
			
			<textarea name="address" rows="3" cols="50" required></textarea>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>City*</center><br></td>
		<td><center>
			
			<input type="text" name="city" pattern="[a-zA-z]+" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>State*</center><br></td>
		<td><center>
			
			<input type="text" name="state" pattern="[a-zA-z]+" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Pin code*</center><br></td>
		<td><center>
			
			<input type="text" name="pc" pattern="[0-9]{6}" required></input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Father's details</center><br></td>
		<td><center>
			
			Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="ffname" pattern="[a-zA-z]+" required></input><br><br>
			Occupation: <input type="text" name="foccupation" pattern="[a-zA-z]+" required></input><br><br>
			Mobile number: <input type="tel" name="fmob" maxlength="10" pattern="[0-9]{10}" required></input><br><br>
			Email Id: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="email" name="femail" required></input><br><br>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Mother's details</center><br></td>
		<td><center>
			Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="mfname" pattern="[a-zA-z]+" required></input><br><br>
			Occupation: <input type="text" name="moccupation" pattern="[a-zA-z]+" required></input><br><br>
			Mobile number: <input type="tel" name="mmob" maxlength="10" pattern="[0-9]{10}" required></input><br><br>
			Email Id: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="email" name="memail" required></input><br><br>

			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Interested in placements</center><br></td>
		<td><center>
			
			<input type="radio" name="place" value="yes">Yes&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</input>
			<input type="radio" name="place" value="no">No</input>
			
		</center>
		</td>
		</tr>
		<tr>
		<td><br><center>Placement Status</center><br></td>
		<td><center>
			
			<input type="radio" name="placestat" value="placed">Already placed&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</input>
			<input type="radio" name="placestat" value="unplaced">Unplaced</input>
			
		</center>
		</td>
		</tr>

		<tr>
		<td colspan="2"><center><br>	
		<input type="file" accept="pdf" name="pdfFile" id="s5" required></input>
		<br></center></td></tr>
		
		<td colspan="2"><center><br>	
		<input type="submit" value="Submit" name="submit" id="addfile"></input>
		<br></center></td>
				
      </table>
</form>
</center>
<?php } ?>
	<br>
<br>
</div>
     
    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>

  </body>
</html>
