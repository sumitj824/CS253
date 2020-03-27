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
	<div class = "main-space">
		<?php 
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conn,"cs253");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
			}
			//$sql = "SELECT  FROM m_tech_25 WHERE ";
			$sql = "SELECT * FROM m_tech_25";
			//$sql = "SELECT SNo,____  FROM m_tech_25 WHERE comment_status = 0 and manager_assigned = ";//add serial no. and application number,,, also  
            $result = $conn->query($sql);														////add session variable for particular Manager
            if ($result->num_rows > 0) {
			//$fields  = $result->fetch_fields();
            while($row = $result->fetch_row()) {
			echo '<li><a href="editable.php?id=' . $row[0] . '">'. $row[2]; "</a></li>";
			//echo '';
			}
			}
            //echo "</table>";
            else { echo "0 results"; }
            $conn->close();
        
		?>
	</div>
	<!--<div class = "main-space">
		<iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTmn--p-ZKw4LNWI1MCr-ivFkIfaFpMpEjxoAonTKT3S0ITue38FqNY7AfSFKxeQeJphjRmnWYZROPG/pubhtml?gid=856111278&amp;single=true&amp;widget=true&amp;headers=false" width = "100%" height = "100%" align = "right"></iframe>
			
		<form  class="comment-section" action = "TA.php" method = "post">
			<input type="text" class="com" name="regis_num" placeholder="Registration Number"><br><br>
			<input type="text" class="com" name="comment" placeholder="Comment here"><br><br>
			<input type="checkbox" name="correctness"> Given information is correct <br><br>
			<button name="submit_info" class="btn btn-lg btn-primary btn-block" type="submit_Info">Submit</button>
		</form>
	
	</div>-->

</body>
</html>





