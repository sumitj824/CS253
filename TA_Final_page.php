<?php
    
    session_start();

?>


<?php 
   if(isset($_GET['id'])){
   	$cstudent = $_GET['id'];
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
    <div class = "heading"><?php echo $_SESSION['usern']; ?></div>
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
		</div>-->
	</div>
	
	<div class = "main-space">

        <?php
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conn,"cs253");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM m_tech_25 WHERE `S.No.` ='" .$cstudent ."'";
            //$sql = "SELECT * FROM m_tech_25";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            //$fields  = $result->fetch_fields();
            echo "<table border='1'>";

            while($row = $result->fetch_row()) {
            for($i = 0; $i < $result-> field_count; $i++){
            $field_info = $result -> fetch_field();
            //echo '<li>'.$field_info->name.'<a align = right>-------------</a>'.$row[$i] .'</li>';
            echo "<tr><td>".$field_info->name."</td><td>".$row[$i] ."</td></tr>";
            //if($row[$i])echo '<li>'.$field_info->name.'<a align = right>-------------</a>'.$row[$i] .'</li>';///////ye code abhi kaam nahi karega, pehle link column banana padega
            //echo '';
            }
            }
            echo "</table>";
            } else { echo "0 results"; }
            $conn->close();
        ?>

		<form  class="comment-section" action = "TA.php" method = "post">

			<input type="text" class="com" name="regis_num" placeholder="Registration Number"><br><br>

			<input type="text" class="com" name="comment" placeholder="Comment here"><br><br>

			<input type="checkbox" name="correctness"> Given information is correct <br><br>


			<button name="submit_info" class="btn btn-lg btn-primary btn-block" type="submit_Info">Submit</button>





		</form>
	
    </div>
    
    <div class = "main-space2">
		<iframe type="application/pdf" src="<?php echo $cstudent . '.pdf'; ?>" width="100%" height="100%" align="right"></iframe>
	</div>

</body>
</html>




<?php 

$servername = "localhost";
$conn = mysqli_connect($servername,"root","");
mysqli_select_db($conn,"cs253");   // put the correct value
if(isset($_POST['submit_info'])){
    $data_incorrect = $_POST["correctness"];
    $regis_num = $_POST["regis_num"];
    if(empty($data_incorrect)){
        //echo "Checkbox left unchecked";
        $comment = $_POST['comment'];
        $query = "INSERT INTO comm_table (reg_num,status,comment) VALUES('$regis_num','Incorrect Data','$comment')";
        $result2 = mysqli_query($conn,$query);
        if($result2){
            header('location: TA.html');
        }
    }
    else { 
        $query = "INSERT INTO comm_table (reg_num,status,comment) VALUES('$regis_num','Correct Data','')";
        $result2 = mysqli_query($conn,$query);
        if($result2){
            header('location: TA.html');
        }
    }
}
?>
