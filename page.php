<?php
    
    session_start();

?>


<?php 
   if(isset($_GET['id'])){
   	$user = $_GET['id'];
      echo $user;
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
		</div>
	</div>-->
	<div class = "main-space2">
		<iframe type="application/pdf" src="<?php echo $user . '.pdf'; ?>" width="100%" height="100%" align="right"></iframe>
	</div>
	<div class = "main-space">
      <!--<table>

         
         /*$conn = mysqli_connect("localhost", "root", "");
         mysqli_select_db($conn,"cs253");
         // Check connection
         if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }
         $sql = "SELECT * FROM regta";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
         // output data of each row
         while($row = $result->fetch_assoc()) {
            
         }
         echo "</table>";
         } else { echo "0 results"; }
         $conn->close();*/


         
      </table>-->
		<form  class="comment-section" action = "TA.php" method = "post">

			<input type="text" class="com" name="regis_num" placeholder="Registration Number"><br><br>

			<input type="text" class="com" name="comment" placeholder="Comment here"><br><br>

			<input type="checkbox" name="correctness"> Given information is correct <br><br>


			<button name="submit_info" class="btn btn-lg btn-primary btn-block" type="submit_Info">Submit</button>





		</form>
	
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
