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
  $stmt ='SELECT id,name,email,phone,company,url,query,id,id,id,id FROM contact ORDER BY id DESC';
  $result=mysqli_query($con,$stmt);
  $count=mysqli_num_rows($result);

  


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
    <center><div class="des" style="width:68%"><div class="row"><h2>Contacted Us</h2></div></center><br>
    <center><table width="800" border="0" cellspacing="1" cellpadding="1px" class="table-responsive">
      <tr>
        <td><form name="form1" method="post" action="" onsubmit="return validate();">
          <table class="table table-striped" width="800" border="0" cellpadding="3" cellspacing="1" bgcolor="#ccebff">

            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
				<th>Query</th>
				<!-- <th>12th</th>
				<th>Diploma</th>
				<th>FE </th>
				<th>SE</th>
				<th>TE </th> -->
				
				
              </tr>
            </thead>
            <tbody>


              <?php
              while($rows=mysqli_fetch_array($result)){
                ?>



                <tr>
                  <td align="center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['id']; ?>&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['email']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['phone']; ?>&nbsp;&nbsp;&nbsp;</td>
                  <td><?php echo $rows['company']; ?>&nbsp;&nbsp;&nbsp;</td>
				          <td><?php echo $rows['query']; ?>&nbsp;&nbsp;&nbsp;</td>
				
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
                $sql = "DELETE FROM contact WHERE id='$del_id'";
                $result = mysqli_query($con,$sql);
              }
// if successful redirect to delete_multiple.php 
              if($result){
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=contacted.php\">";
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
// Admin ends here


?>




      <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
       <p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
     </div>

   </div>
 </body>
 </html>
