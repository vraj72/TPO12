<?php 

	$con=mysqli_connect('localhost','root','','dbit3') or die("sorry");
	


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <form method="GET">
		MARQUEE:<input type="text" name="marquee">
		<input type="submit" value="INSERT">
	</form>
 </body>
 </html>
<?php 
$mar = $_GET['marquee'];
$sql="INSERT INTO newsfeed VALUES ($mar')";

mysqli_query($con,$sql);

 ?>
