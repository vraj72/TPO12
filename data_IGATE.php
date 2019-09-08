<?php
$company=end(explode("/", $_SERVER['REQUEST_URI']));
abc($company);

function abc($company){
include("includes/config.php");
#$company="IGATE";
$company = urldecode($company);
// echo $company;
$sql="select year,count(stud_name) as countnum from placed_info where company = '$company' group by year";
$result = mysqli_query($con,$sql);
$data1 = array();
foreach ($result as $row) {
	$data1[] = $row;
	// echo $row[year];echo $row['count(stud_name)'];
}
echo json_encode($data1);}

?>