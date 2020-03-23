<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
</head>
<style type="text/css">
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

.main-space{
	position : absolute;
	left : 15.0vw;
	width: 1300px;
	top : 0px;
	height : 720px;
	color : blue;
}

.main-space2{
	position : relative;
	font-size : 40px;
	display : block;
	top : 30%;
	text-align : center;
	color : cyan;
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
	<div class = "main-space">
	    <div class = "main-space2">Welcome to Electrical Department, IIT Kanpur</div>
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