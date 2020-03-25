<?php 
 $servername = "localhost";
 $conn = mysqli_connect($servername,"root","");
 mysqli_select_db($conn,"CS253");
 // if(isset($_POST['roleSelected'])){
 // 	$id = $_GET['id'];
 // 	$role = $_GET['role'];
 // 	header('location:dashboardregister.php');
 // 	if($role === "TA"){
 // 		// session_start();
 // 		// $_SESSION['id'] = $id;
 // 		// header('location : TA.php');
 // 		header('location:registerTA.php');
 // 	}
 // 	if($role === "Manager"){
 // 		header('location:registerM.php');
 // 	}
 // }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Change View</title>
	<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
</head>
<style type="text/css">
    /*#mainmenu {
        position : absolute;
        height : 800px;
        width : 1250px;
        background : blue;
        left : 200px;
        top : 20px;
    }
	#menu ul{
        list-style : none;
    }
    #menu ul li{
        display : block;
        background : black;
        width : 200px;
        border : 2px solid white;
        color : white;
        height : 100px;
        line-height : 100px;
        text-align : center;
        font-family : calibri;
        float : left;
        font-size : 20px;
        margin : 0px;
        padding : 0px;
    }
    #menu ul li:hover{
        background : green;
    }
    #menu ul ul{
        display : none;
    }
    #menu ul li:hover > ul{
        display : block;
    }*/
	.box {
	font-family : Calibri;
	position : fixed;
	width : 18vw;
	height : 100vh;
    background-color : white;
    top : 0px;
    left : 0px;
	border-right : 4px solid black;
}

.heading{
	background : ;
	margin : auto;
	padding : 1vw;
	font-size : 3vw;
	text-align : center;
	color : blue;
}


.first {
	background : white;
	margin : auto;
	padding : 1vw;font-size : 1.5vw;
	text-align : center;
	color : blue;
}

.second {
	background : white;
	margin : auto;
	padding : 1vw;font-size : 1.5vw;
	text-align : center;
	margin : auto;
}

.third{
	background : white;
	padding : 1vw;
	margin  : auto;font-size : 1.5vw;
	text-align : center;
}

.fourth{
	margin : auto;
	background : white;
	padding : 1vw;font-size : 1.5vw;
	text-align : center;
}

#mainmenu {
        position : absolute;
        left : 250px;
        top : 0px;
}

#menu ul{
        list-style : none;
        display : flex;
        flex-direction : row;
}

#menu ul li{
	display : block;
        width : 200px;
        border : 2px solid white;
        color : white;
        height : 100px;
        line-height : 100px;
        text-align : center;
        font-family : calibri;
        float : left;
        font-size : 40px;
        margin : 0px;
        padding : 0px;
        /*background : #333333;
        background : green;
        width : 200px;
        height : 100px;
        color : white;        
        text-align : center;
        border : 2px solid white;
        float : left;*/
}
#menu ul li:hover{
        background : cyan;
        color : white;
        text-decoration : none;
}

#menu ul li a{
	text-decoration : none;
	font-color : white;
}

#menu ul li a:hover{
	color : red;
	text-decoration : none;
}

#menu ul ul{
        display : none;
}

#menu ul ul li{
	 width : 200px;
	 height : 100px;
	 margin : 0px;
	 padding : 0px;
}

#menu ul li:hover > ul{
        display : block;
        margin : 0px;
        padding : 0px;

} 

#button1{
	height : 100px;
	width : 200px;
	font-size : 25px;
}

.box a {
	display : block;
	color : blue;
	padding : 0.2vw;
	text-decoration: none;
}

.box a:hover{
	color : red;
	text-decoration : none;
}

@media screen and(max-width:1200px){
    .box{
    	font : 10px;
    }
}       
</style>
<body>
	<div id = "mainmenu">
	<div id = "menu">
		<?php
			$query = "SELECT * FROM managers";
			$result = mysqli_query($conn,$query);
			echo "<ul>";
			while($row = mysqli_fetch_array($result)){
				 $query2 = "SELECT * FROM tas WHERE managerID = '".$row['id']."'";
				 $changeview = "changeview.php";
				 $a = "btn btn-lg btn-primary btn-block";
				 $b = "button1";
				 $id = $row['id'];
				 $roles1 = "Manager";
				 echo "<li><a href = 'page1.php?id=$id&role=$roles1'><button id = '".$b."'class = '".$a."' name = 'roleSelected'>".$row['username']."</button></a>";
				 $result2 = mysqli_query($conn,$query2);
				 echo "<ul>";
				 while($rows = mysqli_fetch_array($result2)){
				 	$roles2 = "TA";
				 	$id2 = $rows['id'];
				 	echo "<li><a href = 'page1.php?id=$id2&role=$roles2'><button id = '".$b."' class = '".$a."' name = 'roleSelected'>".$rows['username']."</button></a></li>";
				 }
				 echo "</ul>";
				 echo "</li>";
			}
			echo "</ul>";
		?>
	</div>
    </div>
	<div class = "box">
    	<div class = "heading"><a href = "dashboard.php">Dashboard</a></div>
    	<hr>
		<div class = "first">
			<a href="dashboardregister.php">Register TA/Manager</a>
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