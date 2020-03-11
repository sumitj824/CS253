<!DOCTYPE html>

<html>

<head>
	<title>
		TA Interface
	</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

	<div class="header">
	    <div class="logo">
	        <i class="fa fa-tachometer"></i>
	        <!--<span>Br</span>-->
	    </div>
	    <a href="#" class="nav-trigger"><span></span></a>
	</div>
	<div class="side-nav">
	    <div class="logo">
	        <i class="fa fa-tachometer"></i>
	        <span>Dashboard</span>
	    </div>
	    <nav>
	        <ul>
	            <li>
	                <a href="https://www.youtube.com/">
	                    <span><i class="fa fa-user"></i></span>
	                    <span>Add TA/Manager</span>
	                </a>
	            </li>
	            <li>
	                <a href="#">
	                    <span><i class="fa fa-envelope"></i></span>
	                    <span>Distribute </span>
	                </a>
	            </li>
	            <li class="active">
	                <a href="#">
	                    <span><i class="fa fa-bar-chart"></i></span>
	                    <span>Analytics</span>
	                </a>
	            </li>
	            <li>
	                <a href="#">
	                    <span><i class="fa fa-credit-card-alt"></i></span>
	                    <span>Payments</span>
	                </a>
	            </li>
	        </ul>
	    </nav>
	</div>


	<div stype="padding:20px">

        

		<iframe type="application/pdf" src="sql.pdf" width="42%" height="575px" align="right"></iframe>

		<iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTmn--p-ZKw4LNWI1MCr-ivFkIfaFpMpEjxoAonTKT3S0ITue38FqNY7AfSFKxeQeJphjRmnWYZROPG/pubhtml?gid=856111278&amp;single=true&amp;widget=true&amp;headers=false" width="42%" height="575px" align="right"></iframe>


        
		<form  class="comment-section" action = "TA.php" method = "post">

            <input type="text" class="com" name="regis_num" placeholder="Registration Number"><br><br>
            
            <input type="text" class="com" name="comment" placeholder="Comment here"><br><br>

            <input type="checkbox" name="correctness" > Given information is correct <br><br>
            

            <button name="submit_info" class="btn btn-lg btn-primary btn-block" type="submit_Info">Submit</button>





        </form>
		
		
		
	</div>

	
</body>

</html>






<?php 

$servername = "localhost";
$conn = mysqli_connect($servername,"root","");
mysqli_select_db($conn,"testlog2");   // put the correct value
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