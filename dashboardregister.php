<!DOCTYPE html>
<html>
<head>
	<title>Register a Member</title>
	<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
</head>
<style type="text/css">
	.box {
	font-family : Calibri;
	position : fixed;
	width : 18vw;
	height : 800px;
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

.mainspace{
	position : absolute;
	left : 18vw;
	width: 1250px;
	top : 0px;
	height : 800px;
	text-align : center;
	color : blue;
}


.mainspace #link1{
	position : relative;
	width : 400px;
	height : 100px;
	top : 20%;
	text-decoration : none;
	left : 350px;
}

.mainspace #button1{
	padding : 20px;
	height : 100px;
	width :400px;
	text-align : center;
	left : 350px;
	font-size: 40px;
	color : white;
}

.mainspace #link2{
	position : relative;
	width : 400px;
	text-decoration : none;
	height : 100px;
	top : 30%;
	left : 350px;
}

a {
	display : block;
	color : blue;
	padding : 0.2vw;
	text-decoration: none;
}

a:hover{
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
	<div class = "mainspace">
		  <a href="registerTA.php" id = "link1"><button id= "button1" class="btn btn-lg btn-primary btn-block">Register a TA</button></a>
		  <a href="registerM.php" id = "link2"><button id = "button1" class="btn btn-lg btn-primary btn-block">Register a Manager</button></a>
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