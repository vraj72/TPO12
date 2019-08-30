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
<br><center>
<div class="container">
<span class="col-md-3"><br>
  <ul class="nav nav-pills nav-stacked">
    <li><a href="it.php">IT</a></li>
    <li><a href="comps.php">COMPS</a></li>
    <li><a href="extc.php">EXTC</a></li>
          <li><a href="mech.php">MECHANICAL</a></li>

  </ul>
 </span>
  
<span class="col-md-9">
<center>
<h3>Comps applicants</h3>
    
    
    <?php
        include("includes/config.php");


        $stmt ="SELECT application.stu_id, student.status FROM application inner join student on application.stu_id =student.stu_id where student.branch='COMPS' ;";
		
        $result=mysqli_query($con,$stmt);
        $count=mysqli_num_rows($result);
      
if(isset($_SESSION['login_admin']))
				    {
                        
                            ?>
      
        <script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
alert("Successful");

return true;
}
</script>
<table width="800" border="0" cellspacing="1" cellpadding="1px">
<tr>
<td><form name="form1" method="post" action="" onsubmit="return validate();">
<table class="table table-striped" width="800" border="0" cellpadding="3" cellspacing="1">

   <thead>
    <tr>
      <th>#</th>
      <th>ID</th>
	        <th>Status</th>

      
    </tr>
  </thead>
  <tbody>
             
        
      <?php
while($rows=mysqli_fetch_array($result)){
?>
    
    

<tr>
<td align="center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['stu_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><?php echo $rows['stu_id']; ?>&nbsp;&nbsp;&nbsp;</td>
<td><?php echo $rows['status']; ?>&nbsp;&nbsp;&nbsp;</td>



</tr>

<?php
}
?>
    
<tr align="center">
<td <br><input name="allow" type="submit" id="allow" value="Allow" class="btn btn-success"></td>
<td <br><input name="delete" type="submit" id="delete" value="Debar" class="btn btn-danger"></td>
<td></td>

</tr>

        
        
        
        <?php
        if(isset($_POST['delete'])){
         for($i=0;$i<count($_POST['checkbox']);$i++){
             
$del_id=$_POST['checkbox'][$i]; 
$stat="debarred";  
$sql = "update student set status='$stat' WHERE stu_id='$del_id'";
$result = mysqli_query($con,$sql);
}
// if successful redirect to delete_multiple.php 
if($result){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=comps.php\">";

echo "<meta http-equiv=\"refresh\" content=\"0;URL=comps.php\">";
}
}

if(isset($_POST['allow'])){
         for($i=0;$i<count($_POST['checkbox']);$i++){
             
$del_id=$_POST['checkbox'][$i]; 
$stat="allowed";  
$sql = "update student set status='$stat' WHERE stu_id='$del_id'";
$result = mysqli_query($con,$sql);
}
// if successful redirect to delete_multiple.php 
if($result){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=comps.php\">";

echo "<meta http-equiv=\"refresh\" content=\"0;URL=comps.php\">";
}
}




//mysql_close();
?>
</tbody>
</table>
</form>
</td>
</tr>
</table>
      </center>
      
      <?php
                        
}
      
          
				    
      
      
      ?>
      
</div>


<br><br>
    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>
  </body>
</html>
