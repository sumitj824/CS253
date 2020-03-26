<?php 
	
$servername = "localhost";
$conn = mysqli_connect($servername,"root","");
mysqli_select_db($conn,"testlog2");
if(isset($_POST['reg_user'])){
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM m_tech_25 WHERE SNo = 1";// use session variable
	$result = $conn->query($sql);
	$fields  = $result->fetch_fields();
	$row = $result->fetch_row(); 
	for($i = 0; $i < $result-> field_count ; $i++){
		$field_info = $result -> fetch_field();
		//if($row[$i])$user = mysqli_real_escape_string($conn,$_POST['username'.$i.'']);
		if($row[$i])$user = mysqli_real_escape_string($conn,$_POST['username'.$i.'']);
		if($user){
			//echo "!";
			$query = "UPDATE m_tech_25 SET ".$field_info->name." = '$user' WHERE SNo = 1"; 
//$query = "INSERT INTO logininfo (usern,pass) VALUES('$user','$password')
			$result2 = mysqli_query($conn,$query);
		}
	}
	if($result2){
		 header('location: editable.php');
	}
	$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
<div class = "box">
    	<div class = "heading">Dashboard</div>
    	<hr>
		<div class = "first">
			<a href="registration.php">Register a TA</a>
		</div>
		<hr>
		<div class = "second">
			<a href="#">Assign students to TA</a>
		</div>
		<hr>
		<div class = "third">
			<a href="changeview.php">View as a TA</a>
		</div>
		<hr>
		<div class = "fourth">
			<a href="queries.php">Queries from TA</a>
		</div>
	</div>
    <div class="main-space">   
    <form  class="form-signin" action = "editable.php" method = "post">
	   <?php
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conn,"testlog2");
            // Check connection
            if ($conn->connect_error) {
            	die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM m_tech_25 WHERE SNo = 1";// use session variable
            $result = $conn->query($sql);
            //if ($result->num_rows > 0) {
			$fields  = $result->fetch_fields();
            if($row = $result->fetch_row()) {
				for($i = 0;  $i < $result-> field_count; $i++){ //$i < $result-> field_count
					$field_info = $result -> fetch_field();
					if($row[$i])echo '<li>'.$field_info->name.'<a>-</a>'.$row[$i] .'<a>_________</a><input type="text" class="form-control" name="username'.$i.'"></li>';
			//echo '';
				}
			}
			$conn->close();
        ?>
		
		<button name="reg_user" class="btn btn-lg btn-primary btn-block" type = "submit">SUBMIT</button>
    </form>
    </div>      
	

</body>
</html>