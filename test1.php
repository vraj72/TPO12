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
	<body>
		<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>


 <?php
function datacompany($comapny){
$sql="select year,count(stud_name) as countnum from placed_info where company = 'IGATE' group by year";
$result = mysqli_query($con,$sql);
$data1 = array();
foreach ($result as $row) {
	$data1[] = $row;
	// echo $row[year];echo $row['count(stud_name)'];
}
echo json_encode($data1);}
?>

    <script>
        $(document).ready(function () {
            showGraph();
        });
        function showGraph()
        {
            {


            	var company="IGATE"
            	var data =<?php echo datacompany(company);?>

               // $.post("data_IGATE.php",
                function (data)
                {
                    console.log(data);
                    var obj=JSON.parse(data);
                     var year = [];
                    var student = [];
                    var color= ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', 
		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', 
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', 
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', 
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3', 
		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
                   //document.getElementById("demo").innerHTML = data.year;
                    
                    	for (var i in obj) {
                    		
                    		console.log(i);
                    		console.log(obj[i]);
						    year.push(obj[i].year);
                        	student.push(obj[i].countnum);
						    }
						    
                    console.log(year);
                    console.log(student);

                    var chartdata = {
                        labels: year,
                        datasets: [
                            {
                                label: 'Student number',
                                backgroundColor: color,
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: student
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'barGraph',
                        data: chartdata
                    });
                }//);
            }
        }
        </script>
        </body>
</html>