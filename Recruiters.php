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

}}
?>

<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  	<script>
        function showGraph(company,can)
        {
            {
                $.post("data_IGATE.php/abc/"+company,
                function (data)
                {
                    console.log(data);
                    console.log(company);
                    var obj=JSON.parse(data)
                     var year = [];
                    var student = [];
                    var color= [  '#00B3E6', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', 
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', 
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', 
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3', 
		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
                   
                    
                    	for (var i in obj) {
                    		console.log(i);
                    		console.log(obj[i]);
						    year.push(obj[i].year);
                        	student.push(obj[i].countnum);
						    }
						    
                    console.log(year);
                    console.log(student);
                    console.log(company)

                    var chartdata = {
                        labels: year,
                        datasets: [
                            {
                                label: year,
                                backgroundColor: color,
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: student
                            }
                        ]
                    };

                    var graphTarget = $(can);

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata
                    });
                });
            }
        }
        </script>
	  <style>
	  	.container12 { float: left; position: relative; } 
		.image_hover {
		  opacity: 1;
		  transition: .5s ease;
		  backface-visibility: hidden;
		}
		.container12:hover .image_hover {
		  opacity: 0.2;
		}
		
		.graphCanvasClass { position: absolute; top: 0; right: 0; opacity:0; } 

		.container12:hover .graphCanvasClass {
		  opacity: 1;
		  transition: .5s ease;
		}
		</style>
		
	  
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
<br>


<br>

<center>
<h3>Major Recruiters</h3>
<br>
<table>


<tr> 
	<td style="cellpadding:20; margin-left:20px" ><div class="container12"><img class='image_hover' src="TCS logo.jpg" hspace="20" height="200px" width="250px">
																			<canvas id="graphCanvasTCS" class="graphCanvasClass"></canvas></div></td>
	
	<td style="cellspacing:20; margin-left:20px"><div class="container12"><img class='image_hover'src="capgemini.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvascapeg" class="graphCanvasClass"></canvas></div></td>
	
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img src="MindCraft.jpg" class='image_hover' hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasmindcraft" class="graphCanvasClass"></canvas></div></td>
</tr>


<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="HSBC.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvashsbc" class="graphCanvasClass"></canvas></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="cactus.jpeg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvascactus" class="graphCanvasClass"></canvas></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="polaris.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvaspolaris" class="graphCanvasClass"></canvas></div></td>
</tr>


<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="rave.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasrave" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="LnT.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvaslnt" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="infosys.png" hspace="20" height="100px" width="250px">
	<canvas id="graphCanvasinfosys" class="graphCanvasClass"></div></td>
</tr>


<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="hettich.PNG" hspace="20" height="150px" width="250px">
		<canvas id="graphCanvashettich" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="oberoi.png" hspace="20" height="100px" width="250px">
	<canvas id="graphCanvasoberoi" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="ibm.jpg" hspace="20" height="100px" width="250px">
	<canvas id="graphCanvasibm" class="graphCanvasClass"></div></td>
</tr>


<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="reliance.jpg" hspace="20" height="150px" width="250px">
	<canvas id="graphCanvasreliance" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="IGATE.jpg" hspace="20" height="100px" width="250px">
	<canvas id="graphCanvasigate" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="zycus.jpg" hspace="20" height="150px" width="250px">
	<canvas id="graphCanvaszycus" class="graphCanvasClass"></div></td>
</tr>
<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="godrej-infotech-logo.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasgodrej" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="Quinnox.jpg" hspace="20" height="150px" width="250px">
	<canvas id="graphCanvasquinnox" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="national_stock_exchange_logo.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasnsel" class="graphCanvasClass"></div></td>
</tr>
<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="toyo.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvastoyo" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="ncdex.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasncdex" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="huawei(1).png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvashuawei" class="graphCanvasClass"></div></td>
</tr>
<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="taj.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvastaj" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="Chemplast-Sanmar.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvaschem" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="tibco.png" hspace="20" height="100px" width="250px">
	<canvas id="graphCanvastibco" class="graphCanvasClass"></div></td>
</tr>
<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="hafele.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvashafele" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="techmah.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvastechmah" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="Directi.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasdirecti" class="graphCanvasClass"></div></td>
</tr>
<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="abo.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasabo" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="deliotte.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasdeliotte" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="hp.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvashp" class="graphCanvasClass"></div></td>
</tr>
<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="elgi.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvaselgi" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="atos.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasatos" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="jacobs.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasjacobs" class="graphCanvasClass"></div></td>
</tr>
<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="merilent.png" hspace="20" height="50px" width="250px">
	<canvas id="graphCanvasmerilent" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="bms.jpg" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasbms" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="vistaar.png" hspace="20" height="100px" width="250px">
	<canvas id="graphCanvasvistaar" class="graphCanvasClass"></div></td>
</tr>
<tr>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="bosch.png" hspace="20" height="90px" width="250px">
	<canvas id="graphCanvasbosch" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="viteos.png" hspace="20" height="90px" width="250px">
	<canvas id="graphCanvasviteos" class="graphCanvasClass"></div></td>
	<td style="cellpadding:20; margin-left:20px"><div class="container12"><img class='image_hover' src="regada.png" hspace="20" height="200px" width="250px">
	<canvas id="graphCanvasregada" class="graphCanvasClass"></div></td>
</tr>
</table>
<script>
        $(document).ready(function () {
            showGraph("TCS","#graphCanvasTCS");
            showGraph("CAPGIMINI","#graphCanvascapeg");
            showGraph("MINDCRAFT","#graphCanvasmindcraft");
            showGraph("HSBC GLT","#graphCanvashsbc");
            showGraph("CACTUS","#graphCanvascactus");
            showGraph("POLARIS","#graphCanvaspolaris");
            showGraph("Rave Technologies","#graphCanvasrave");
            showGraph("L&T INFOTECH","#graphCanvaslnt");
            showGraph("Infosys","#graphCanvasinfosys");
            showGraph("Hettich India Pvt. Ltd","#graphCanvashettich");
            showGraph("OBEROI","#graphCanvasoberoi");
            showGraph("IBM","#graphCanvasibm");
            showGraph("RELIANCE RETAIL","#graphCanvasreliance");
            showGraph("IGATE","#graphCanvasigate");
            showGraph("ZYCUS","#graphCanvaszycus");
            showGraph("GODREJ","#graphCanvasgodrej");
            showGraph("QUINNOX","#graphCanvasquinnox");
            showGraph("NSEL","#graphCanvasnsel");
            showGraph("Toyo Engineering","#graphCanvastoyo");
            showGraph("NCDEX","#graphCanvasncdex");
            showGraph("HUAWEI","#graphCanvashuawei");
            showGraph("TAJ","#graphCanvastaj");
            showGraph("Chemi Plant Engineering","#graphCanvaschem");
            showGraph("TIBCO","#graphCanvastibco");
            showGraph("HAFELE","#graphCanvashafele");
            showGraph("Tech Mahindra","#graphCanvastechmah");
            showGraph("DIRECTI","#graphCanvasdirecti");
            showGraph("ABO VALVES","#graphCanvasabo");
            showGraph("deliotte","#graphCanvasdeliotte");
            showGraph("HP INDIA","#graphCanvashp");
            showGraph("ELGI Equipments","#graphCanvaselgi");
            showGraph("ATOS","#graphCanvasatos");
            showGraph("JACOBS","#graphCanvasjacobs");
            showGraph("MERILENT","#graphCanvasmerilent");
            showGraph("BOOK MY SHOW","#graphCanvasbms");
            showGraph("VISTAAR TECHNOLOGIES","#graphCanvasvistaar");
            showGraph("BOSCH","#graphCanvasbosch");
            showGraph("VITEOS","#graphCanvasviteos");
            showGraph("REGADA","#graphCanvasregada");
        });</script>
 <div class="panel panel-default panel-footer" style="background-color:#80cbff; color:white">
	<p align="center"> CopyRight &copy; 2016 DBIT. Don Bosco Institute of Technology.</p>
    </div>


  </body>
</html>

<?php

// $sql="select count(stud_name) from placed_info where company = 'TCS' ";
// $result = mysqli_query($con,$sql);
// while($row = mysql_fetch_array($result)) {
//     print_r($row);
// echo "<h1>".$result"</h1>";
 /*} 
else
{
	echo "<script type='text/javascript'> document.location = 'Homee.php'; </script>";
}*/?>
