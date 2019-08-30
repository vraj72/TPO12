<?php  
include("includes/config.php");
$sql = "SELECT * FROM `newsfeed` order by datetime desc limit 1";
$result = $con->query($sql);
$con->close();
?>

<!DOCTYPE html>
<html>
<body>
	<style type="text/css">
		.textbox{padding-right: 20%;
  padding-left: 20%;
  font-size: 20px;
 }
	</style>
	<div class="textbox">
<marquee behavior="alternate" scrollamount="10"; direction="left" onmouseover="this.stop();" onmouseout="this.start();">
<?php 
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo   $row["Content"]. "<br>";
    }}
    else{
    	echo "No News";
    }
 ?>
 </marquee>
</div>
</body>

</html>
