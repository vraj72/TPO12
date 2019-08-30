<?php
session_start();

include("includes/config.php"); 

if(isset($_SESSION['login_admin']))
  $username = $_SESSION['login_admin'];
else if(isset($_SESSION['login_student']))
  $username=$_SESSION['login_student'];


$sql="select * from application where stu_id= '$username' ";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 11)
{
  $_SESSION['registered'] = $username;
}

if (!empty($_POST['new'])) {

foreach($_POST['branch'] as $k_branch => $v_branch)
{

 $title=$_POST['title'];
 $content = $_POST['content'];
 $branch = $v_branch;
 
 $ten= $_POST['ten'];
 $twelve= $_POST['twelve'];
$diploma = $_POST['diploma'];

$fe=$_POST['fe'];
$se=$_POST['se'];
$te=$_POST['te'];

 $sql = "INSERT INTO post (title,content,branch,ten,twelve,diploma,fe,se,te)VALUES('$title','$content','$branch','$ten','$twelve','$diploma','$fe','$se','$te')";

 $result = mysqli_query($con,$sql);
}
 if($result)
  {			     echo "<script type='text/javascript'> alert('Added!');</script>";                  
}
else
{
  echo "<script type='text/javascript'> alert(Failed. Try again.);</script>";               
}


}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="main.css">
  <style>
  .hidden{
    display: none;
  }
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script type="text/javascript" src="js/ajax_jquery.js"></script>
  <script>
  $(document).ready(function(){
    var session = '<?php echo $_SESSION['login_student'] ?>';
    $("#std_name").val(session);
    $(".btn").click(function(){
      var a = $(this).attr("ID");
      $("#c_name").val(a);
      
        $.ajax({
          method: "POST",
          url: "drive_proc.php",
          data: {sname: $("#std_name").val(),cname:$("#c_name").val()},
          success: function(data,err){
            alert(data);
            window.location.reload();


          }
        });
      });
    });
  </script>

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
  <br>

  <?php
  include("includes/config.php");
  $stmt ='SELECT postid,title,content,date,branch,ten,twelve,diploma,fe,se,te FROM post ORDER BY postid DESC';
  $result=mysqli_query($con,$stmt);
  $count=mysqli_num_rows($result);

  if(isset($_SESSION['login_student']))
  {
   $stu=$_SESSION['login_student'];
   $stmt ="SELECT * FROM student where stu_id='$stu' and status='allowed'";
   $result=mysqli_query($con,$stmt);
   $altrue=mysqli_num_rows($result);

   $stmt_acad ="SELECT * FROM student_academic_info where stu_id='$stu' ";
   $res_stmt_acad=mysqli_query($con,$stmt_acad);
   while($row_stmt_acad = mysqli_fetch_assoc($res_stmt_acad))
   {
	   //echo "<pre>";
	   $stu_x = ($row_stmt_acad['X']);
	   $stu_xii = ($row_stmt_acad['XII']);
	   $stu_d = ($row_stmt_acad['Dip']);
	   $stu_1 = (($row_stmt_acad['sem1']+$row_stmt_acad['sem2'])/2);
	   $stu_2 = (($row_stmt_acad['sem3']+$row_stmt_acad['sem4'])/2);
	   $stu_3 = (($row_stmt_acad['sem5']+$row_stmt_acad['sem6'])/2);
	   $stu_lkt =($row_stmt_acad['LKTs']);
	   //echo "</pre>";
	   
   }

 }


 if(isset($_SESSION['login_admin']))
 {
  if($_SESSION['login_admin']=='abcd')
  {
    ?>

    <script language="javascript">

    $(document).ready(function(){
      $("button").click(function(){
        $("img").attr("width", "500");
      });
    });


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
      return true;
    }
    </script>
    <center><div class="des" style="width:68%"><div class="row"><h2>Posts</h2></div></center><br>
    <center><table width="800" border="0" cellspacing="1" cellpadding="1px" class="table-responsive">
      <tr>
        <td><form name="form1" method="post" action="" onsubmit="return validate();">
          <table class="table table-striped" width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#ccebff">

            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Branch</th>
				<th>10th</th>
				<th>12th</th>
				<th>Diploma</th>
				<th>FE </th>
				<th>SE</th>
				<th>TE </th>
				
				
              </tr>
            </thead>
            <tbody>


              <?php
              while($rows=mysqli_fetch_array($result)){
                ?>



                <tr>
                  <td align="center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['postid']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['postid']; ?>&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['title']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['content']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['date']; ?>&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['branch']; ?>&nbsp;&nbsp;&nbsp;</td>
				  <td><?php echo $rows['ten']; ?>&nbsp;&nbsp;&nbsp;</td>
				<td><?php echo $rows['twelve']; ?>&nbsp;&nbsp;&nbsp;</td>
				<td><?php echo $rows['diploma']; ?>&nbsp;&nbsp;&nbsp;</td>
				<td><?php echo $rows['fe']; ?>&nbsp;&nbsp;&nbsp;</td>
				<td><?php echo $rows['se']; ?>&nbsp;&nbsp;&nbsp;</td>
				<td><?php echo $rows['te']; ?>&nbsp;&nbsp;&nbsp;</td>
				
                </tr>

                <?php
              }
              ?>

              <tr>
                <td colspan="6" align="center"><br><input name="delete" type="submit" id="delete" value="Delete" class="btn btn-danger"></td>
              </tr>



              <?php
              if(isset($_POST['delete'])){
               for($i=0;$i<count($_POST['checkbox']);$i++){

                $del_id=$_POST['checkbox'][$i];   
                $sql = "DELETE FROM post WHERE postid='$del_id'";
                $result = mysqli_query($con,$sql);
              }
// if successful redirect to delete_multiple.php 
              if($result){
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=drive.php\">";
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
}

else if($altrue)
{
  $sql = "select title,content,date,ten,twelve,diploma,fe,se,te FROM post WHERE branch IN (select branch from student where stu_id='$username') and title not IN (select c_name from student_applied where stu_id='$username')";

  $result = mysqli_query($con,$sql);


  ?>

  <center>
    
    <table width="800" border="0" cellspacing="1" cellpadding="2px">
      <tr>
        <td>
          <table class="table table-striped" width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#ccebff">
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td colspan="4" bgcolor="#FFFFFF"><strong>Posts</strong> </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><strong>Title</strong></td>
              <td align="center" bgcolor="#FFFFFF"><strong>Content</strong></td>
              <td align="center" bgcolor="#FFFFFF"><strong>Date</strong></td>

            </tr>



            <?php
            while($rows=mysqli_fetch_array($result)){
				
				if(empty($stu_d))
					$stu_d = 100;
				if(empty($stu_xii))
					$stu_d = 101;
				if(($rows['ten'] > $stu_x)||($rows['twelve'] > $stu_xii)||($rows['diploma'] > $stu_d) || ($rows['fe'] > $stu_1) || ($rows['se'] > $stu_2) || ($rows['te'] > $stu_3) || ($stu_lkt!=0))
						continue;
              ?>



              <tr>
                <td align="center" bgcolor="#FFFFFF"><?php echo $rows['title']; ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo $rows['content']; ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo $rows['date']; ?></td>
                <td bgcolor="#FFFFFF"><input type="submit" value="apply" id="<?php echo $rows['title']; ?>" class="btn" ></td>
                <!-- <td><input type="hidden" id="c_name" class="hidden"></div></td>
                <td><input type="hidden" class="hidden" id="std_name"></div></td> -->
              </tr>

              <?php }?>
            </table>
          </td>
        </tr>
      </table>
    <form id="driveForm" name="driveForm">
      <input type="hidden" id="c_name" class="hidden">
      <input type="hidden" class="hidden" id="std_name">
    </form>
  </center>






    <hr>
    <br>      <br>
    <br>



    <!-- here applied drives-->
    <?php
    $sql = "select title,content,date,ten,twelve,diploma,fe,se,te FROM post WHERE branch IN (select branch from student where stu_id='$username') and title IN (select c_name from student_applied where stu_id='$username')";

  $result = mysqli_query($con,$sql);


  ?>

  <center>
    
    <table width="800" border="0" cellspacing="1" cellpadding="2px">
      <tr>
        <td>
          <table class="table table-striped" width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#ccebff">
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td colspan="4" bgcolor="#FFFFFF"><strong>Applied Drives</strong> </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><strong>Title</strong></td>
              <td align="center" bgcolor="#FFFFFF"><strong>Content</strong></td>
              <td align="center" bgcolor="#FFFFFF"><strong>Date</strong></td>

            </tr>



            <?php
            while($rows=mysqli_fetch_array($result)){
              ?>
              <tr>
                <td align="center" bgcolor="#FFFFFF"><?php echo $rows['title']; ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo $rows['content']; ?></td>
                <td align="center" bgcolor="#FFFFFF"><?php echo $rows['date']; ?></td>
                
                <!-- <td><input type="hidden" id="c_name" class="hidden"></div></td>
                <td><input type="hidden" class="hidden" id="std_name"></div></td> -->
              </tr>

              <?php }?>
            </table>
          </td>
        </tr>
      </table>
    <form id="driveForm" name="driveForm">
      <input type="hidden" id="c_name" class="hidden">
      <input type="hidden" class="hidden" id="std_name">
    </form>
  </center>
    <hr>
    <br>      <br>
    <br>
    <!-- to here applied drives-->



    <?php
  }


  if(isset($_SESSION['login_admin']))
    { if($_SESSION['login_admin']=='abcd')
  {
                            //echo '<p id=heading>Enter new post here</p>';

    ?>  
    <br>
    <center><div class="des" style="width:68%"><div class="row"><h2>Enter new drive here</h2></div></center><br>
    
	<center>* INDICATES MANDATORY FIELDS</center>
	
	
    <form class="form-horizontal" role="form" action="drive.php" method="post" >

      <div class="form-group">
       <label class="control-label col-sm-2" for="title" style="font-size:20px">Title:</label>
       <div class="col-sm-10">
        <input style="width:800px" type="text" class="form-control" id="title" name="title" placeholder="title of post" required>
      </div>
    </div>
	
	<div class="form-group">
			<label class="control-label col-sm-2" for="content" style="font-size:20px">Content:</label>
		
		<div class="col-sm-10">
			<textarea class="form-control" rows="5" id="content" style="width:400px" name="content" required></textarea>
			</div>

   </div>
   
   <br>
   
   
   
    <div class="form-group">
    <label class="control-label col-sm-2" for="content" style="font-size:20px">Branch:</label>
   <select  name="branch[]" id="get">
  <option selected hidden>Choose </option>
  <option value="IT">IT</option>
  <option value="COMPS">COMPS</option>
  <option value="EXTC">EXTC</option>
  <option value="MECH">MECH</option>
</select>
	
	
<br>
	
	
	
	<label class="control-label col-sm-2" for="content" style="font-size:20px">10th Percentage:*</label>
	<input type="number"  name="ten" id="ten" style="width:80px;margin-left:20px; margin-top:10px;height:40px;" max="100" min="0" >

	<br>
	
	<label class="control-label col-sm-2" for="content" style="font-size:20px">12th Percentage:*</label>
	<input type="number"  name="twelve" id="twelve" style="width:80px;margin-left:20px; margin-top:10px;height:40px;" max="100" min="0">
	
	<br>
	
	<label class="control-label col-sm-2" for="content" style="font-size:20px">Diploma Percentage:*</label>
	<input type="number"  name="diploma" id="diploma" style="width:80px;margin-left:20px; margin-top:10px;height:40px;" max="100" min="0">
	
	<br>
	
	<label class="control-label col-sm-2" for="content" style="font-size:20px">FE CGPA:*</label>
	<input type="number"  name="fe" id="fe" style="width:80px;margin-left:20px; margin-top:10px;height:40px;" max="10" min="0">
	
	<br>
	
	<label class="control-label col-sm-2" for="content" style="font-size:20px">SE CGPA:*</label>
	<input type="number"  name="se" id="se" style="width:80px;margin-left:20px; margin-top:10px;height:40px;" max="10" min="0">
	
	<br>
	
	<label class="control-label col-sm-2" for="content" style="font-size:20px">TE CGPA:*</label>
	<input type="number"  name="te" id="te" style="width:80px;margin-left:20px; margin-top:10px;height:40px;" max="10" min="0">

	<br>
<br>

  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
    <input type="submit"  style="width:300px"  class="btn btn-lg btn-primary btn-block"  name="new" value="Submit">
  </div>
</div>
</form>





<?php
}} 



?>


<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
} /*if($altrue==0)
{*/
  ?>
		<!-- <br><br>
		<center><p style="font-family: Impact; font-size:20px">You have been debarred from placements.<br> Kindly contact your TPC for further details.</p>
      <br><br></center> -->
      <?php
	  //}
      ?>


      <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
       <p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
     </div>

   </div>
 </body>
 </html>
