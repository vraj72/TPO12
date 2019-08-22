<?php
header('Content-Type: application/json');

include("includes/config.php");     

$sqlQuery = "select stud_name,  year from placed_info where company = 'TCS'";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}


echo json_encode($data);
?>

<!-- 

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

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var year = [];
                    var student = [];
                    var obj JSON.parse(data);
                    document.getElementById("demo").innerHTML = obj;
                    for (var i = 0; i < data.length; i++) {
    						var object = data[i];
						    year.push(data[i].year);
                        	student.push(data[i].countnum);
						    }
						    // If property names are known beforehand, you can also just do e.g.
    // alert(object.id + ',' + object.Title);


                    // for (var i in data) {
                    //     year.push(data[i].year);
                    //     student.push(data[i].countnum);
                    // }
                    //document.getElementById("demo").innerHTML = year;
                    //document.getElementById("demo2").innerHTML = student;
                    

                    var chartdata = {
                        labels: year,
                        datasets: [
                            {
                                label: 'Student number',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: student
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
        <p id="demo"></p>
        <p id="demo2"></p>
	</body>
</html> -->