<?php
session_start();
include("includes/config.php");      
if(isset($_SESSION['login_admin']))
$username = $_SESSION['login_admin'];
else if(isset($_SESSION['login_student']))
$username=$_SESSION['login_student'];

/*   echo "<pre>";
print_r($_POST);
   echo "</pre>"; */
   
   
if(!empty($_POST))
{
   if($_POST['db']== "insert")
   {
   	foreach($_POST['rollno'] as $k_rollno => $v_rollno)
				{
					$rollno = $v_rollno;
					$branch = $_POST['branch'];
					$sql = "INSERT INTO undertakingcheck VALUES ('$branch','$rollno')";

					$result = mysqli_query($con,$sql) or die(mysqli_error($con));
				}
   }

   if($_POST['db']== "delete")
   {
   			foreach($_POST['rollno'] as $k_rollno => $v_rollno)
				{
					$rollno = $v_rollno;
					$branch = $_POST['branch'];
					$sql = "DELETE FROM undertakingcheck WHERE branch='$branch' AND rollno='$rollno'";
					$result = mysqli_query($con,$sql)  or die(mysqli_error($con));
				}  
   }
  
  }
  else
  {
	  //echo"Please Select INSERT or DELETE";
  }



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
	<script type="text/javascript">
	

	
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
	
	
	

		<!--<?php if($username=='abcd')
		{

      echo $username;
      }
      ?> 
	  -->
	  
      <center><H1>Welcome Admin</H1>
	   
	   
	   <br>
	   <br>
	    <form name="indel" method="post" >
		<hr>
		
		
		
			<label class="control-label col-sm-2" for="content" style="font-size:20px">Insert &nbsp &nbsp &nbsp <input type="radio" name="db" value="insert" style="font-size:20px"></label>
		
		
			<label class="control-label col-sm-2" for="content" style="font-size:20px">Delete &nbsp &nbsp &nbsp <input type="radio" name="db" value="delete" style="font-size:20px"></label>
		
		<br>
		
		<hr>
		
		<br>
		<br>
		<br>
		<br>
		

		<?php

		
		if(isset($_POST['branch']))
		{
			if($_POST['branch'] == 'IT')
			{
				$sql = "select * from undertakingcheck where branch='IT'";

				$result = mysqli_query($con,$sql) or die(mysqli_error($con));
			 
				echo "<div class='des' style='width:68%'><div class='row'><h2>Posts</h2></div><table width='800' border='0' class='table table-striped'  cellpadding='3' cellspacing='1' bgcolor='#ccebff'>
			<tr>
			<th>Branch</th>
			<th>Roll NO.</th>
			</tr>";
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
				echo "<td>" . $row['branch'] . "</td>";
				echo "<td>" . $row['rollno'] . "</td>";
				echo "</tr>";
			}
		}	 
		
		if($_POST['branch'] == 'COMPS')
		{
			$sql = "select * from undertakingcheck where branch='COMPS'";

			$result = mysqli_query($con,$sql) or die(mysqli_error($con));
			 
			 echo"<div class='des' style='width:68%'><div class='row'><h2>Posts</h2></div><table   width='800' border='0' class='table table-striped'  cellpadding='3' cellspacing='1' bgcolor='#ccebff'>
			<tr>
			<th>Branch</th>
			<th>Roll NO.</th>
			</tr>";
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
				echo "<td>" . $row['branch'] . "</td>";
				echo "<td>" . $row['rollno'] . "</td>";
				echo "</tr>";
			}
		}	 
		
		if($_POST['branch'] == 'EXTC')
		{
			$sql = "select * from undertakingcheck where branch='EXTC'";

			$result = mysqli_query($con,$sql) or die(mysqli_error($con));
			 
			 echo"<div class='des' style='width:68%'><div class='row'><h2>Posts</h2></div><table  width='800' border='0' class='table table-striped'  cellpadding='3' cellspacing='1' bgcolor='#ccebff'>
			<tr>
			<th>Branch</th>
			<th>Roll NO.</th>
			</tr>";
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
				echo "<td>" . $row['branch'] . "</td>";
				echo "<td>" . $row['rollno'] . "</td>";
				echo "</tr>";
			}
		}	 
		
		if($_POST['branch'] == 'MECH')
		{
			$sql = "select * from undertakingcheck where branch='MECH'";

			$result = mysqli_query($con,$sql) or die(mysqli_error($con));
			 
			 echo"<div class='des' style='width:68%'><div class='row'><h2>Posts</h2></div><table  width='800' border='0' class='table table-striped'  cellpadding='3' cellspacing='1' bgcolor='#ccebff'>
			<tr>
			<th>Branch</th>
			<th>Roll NO.</th>
			</tr>";
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
				echo "<td>" . $row['branch'] . "</td>";
				echo "<td>" . $row['rollno'] . "</td>";
				echo "</tr>";
			}
		}	 
		}

?>


		
		
		 <div class="form-group">
		<label class="control-label col-sm-2" for="content" style="font-size:20px">Branch:</label>
			<select name="branch" id="get">
			<option selected hidden>Choose One</option>
			<option value="IT">IT</option>
			<option value="COMPS">COMPS</option>
			<option value="EXTC">EXTC</option>
			<option value="MECH">MECH</option>
			</select>
		</div>
		
		<div class="form-group">
		<label class="control-label col-sm-2" for="content" style="font-size:20px">Roll No's:</label>
		<select multiple name="rollno[]" id="get">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			<option value="32">32</option>
			<option value="33">33</option>
			<option value="34">34</option>
			<option value="35">35</option>
			<option value="36">36</option>
			<option value="37">37</option>
			<option value="38">38</option>
			<option value="39">39</option>
			<option value="40">40</option>
			<option value="41">41</option>
			<option value="42">42</option>
			<option value="43">43</option>
			<option value="44">44</option>
			<option value="45">45</option>
			<option value="46">46</option>
			<option value="47">47</option>
			<option value="48">48</option>
			<option value="49">49</option>
			<option value="50">50</option>
			<option value="51">51</option>
			<option value="52">52</option>
			<option value="53">53</option>
			<option value="54">54</option>
			<option value="55">55</option>
			<option value="56">56</option>
			<option value="57">57</option>
			<option value="58">58</option>
			<option value="59">59</option>
			<option value="60">60</option>
			<option value="61">61</option>
			<option value="62">62</option>
			<option value="63">63</option>
			<option value="64">64</option>
			<option value="65">65</option>
			<option value="66">66</option>
			<option value="67">67</option>
			<option value="68">68</option>
			<option value="69">69</option>
			<option value="70">70</option>
			<option value="71">71</option>
			<option value="72">72</option>
			<option value="73">73</option>
			<option value="74">74</option>
			<option value="75">75</option>
			<option value="76">76</option>
			<option value="77">77</option>
			<option value="78">78</option>
			<option value="79">79</option>
			<option value="80">80</option>
			<option value="81">81</option>
			<option value="82">82</option>
			<option value="83">83</option>
			<option value="84">84</option>
			<option value="85">85</option>
			<option value="86">86</option>
			<option value="87">87</option>
			<option value="88">88</option>
			<option value="89">89</option>
			<option value="90">90</option>
		</select>
		</div>
		<br>
		<br>
		<div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
    <input type="submit"  style="width:100px"  class="btn btn-lg btn-primary btn-block" name="submit" value="submit" >
  </div>
</div>
	 </form>
	 <br>
	 <br>
	
	  
	  
	  <br>
      <br>
    <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>

  </body>
</html>

<?php  

	//echo "<script type='text/javascript' >document.location = 'Homee.php'; </script>";
?>