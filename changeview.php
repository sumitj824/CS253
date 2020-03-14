<?php 
  $conn = mysqli_connect("localhost","root","");
  $connresult = mysqli_select_db($conn,"logins");
  if(!$connresult){
  	// echo  '<div class="alert alert-danger">
   //              <a href="changeview.php" class="close" data-dismiss="alert" aria-label="close">Close X</a>
   //              <p><strong>Alert!</strong></p>
   //              Sorry! There is some problem with the connection. Please try again!.
   //          </div>';
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change View</title>
	<link rel="stylesheet" type="text/css" href="css/changeview.css">
</head>
<body>
	<div class = "box">
    	<div class = "heading">Dashboard</div>
    	<hr>
		<div class = "first">
			<a href="registration.php">Register TA/Manager</a>
		</div>
		<hr>
		<div class = "second">
			<a href="#">Distribute Applications</a>
		</div>
		<hr>
		<div class = "third">
			<a href="changeview.php">View a Member</a>
		</div>
		<hr>
		<div class = "fourth">
			<a href="#">Queries from Manager</a>
		</div>
	</div>
</body>
</html>
