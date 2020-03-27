<?php 

session_start();

$cstudent = $_GET['id'];
$servername = "localhost";
$conn = mysqli_connect($servername,"root","");
mysqli_select_db($conn,"cs253");
if(isset($_POST['reg_user'])){
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM m_tech_25 WHERE `S.No.` ='" .$cstudent ."'";// use session variable
	$result = $conn->query($sql);
	$fields  = $result->fetch_fields();
	$row = $result->fetch_row(); 
	for($i = 0; $i < $result-> field_count ; $i++){
		$field_info = $result -> fetch_field();
		//if($row[$i])$user = mysqli_real_escape_string($conn,$_POST['username'.$i.'']);
		//if($row[$i])$user = mysqli_real_escape_string($conn,$_POST['username'.$i.'']);
		$user = mysqli_real_escape_string($conn,$_POST['username'.$i.'']);

		if($user){
			//echo "!";
			$query = "UPDATE m_tech_25 SET `".$field_info->name."` = '$user' WHERE `S.No.` ='" .$cstudent ."'"; 
//$query = "INSERT INTO logininfo (usern,pass) VALUES('$user','$password')
			$result2 = mysqli_query($conn,$query);
		}
	}
	if($result2){
		 header('location: queries.php');
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
        <div class = "heading"><?php echo 'Welcome, ' . $_SESSION['userMan'] ?></div>
    	<div class = "heading"><a href = "dashboard.php">Dashboard</a></div>
    	<hr>
		<div class = "first">
			<a href="registerTA_byManager.php">Register TA</a>
		</div>
		<hr>
		<div class = "second">
			<a href="#">Distribute Applications to TAs</a>
		</div>
		<hr>
		<div class = "third">
			<a href="#">View an Assigned TA</a>
		</div>
		<hr>
		<div class = "fourth">
			<a href="queries.php">Queries from TA</a>
		</div>
	</div>
    <div class="main-space">   
    <form  class="form-signin" action = "queries.php" method = "post">
	   <?php
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conn,"cs253");
            // Check connection
            if ($conn->connect_error) {
            	die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM m_tech_25 WHERE `S.No.` ='" .$cstudent ."'";// use session variable
            $result = $conn->query($sql);
            //if ($result->num_rows > 0) {
			$fields  = $result->fetch_fields();
			echo "<table border ='1'>";
            if($row = $result->fetch_row()) {
				for($i = 0;  $i < $result->field_count; $i++){ //$i < $result-> field_count
					$field_info = $result -> fetch_field();
					echo '<tr><td>'.$field_info->name.'</td><td>'.$row[$i] .'</td><td><input type="text" class="form-control" name="username'.$i.'"></td><tr>';
					//if($row[$i])echo '<tr><td>'.$field_info->name.'</td><td>'.$row[$i] .'</td><td><input type="text" class="form-control" name="username'.$i.'"></td><tr>';
			//echo '';
				}
			}
			echo "</table>";
			$conn->close();
		?>
		
		
		<button name="reg_user" class="btn btn-lg btn-primary btn-block" type = "submit">SUBMIT</button>
    </form>
	</div>  
	
	<div class = "main-space2">
		<iframe type="application/pdf" src="<?php echo $cstudent . '.pdf'; ?>" width="100%" height="100%" align="right"></iframe>
	</div>
	
	
	

</body>
</html>
