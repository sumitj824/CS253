<?php

	session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
	<div class = "box">
		<div class = "heading"><?php echo 'Welcome, ' . $_SESSION['usern']; ?></div>
    	<div class = "heading">Dashboard</div>
    	<hr>
		<div class = "first">
			<a href="List_of_students_to_each_TA.php">View List of Students</a>
		</div>
		<hr>
		<!--<div class = "second">
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
	</div>-->
	<!--<div class = "main-space2">
		<iframe type="application/pdf" src="" width="100%" height="100%" align="right"></iframe>
	</div>-->
	<!--<div class = "main-space">
		
	
	</div>-->

</body>
</html>





