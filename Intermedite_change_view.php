<?php
	session_start();
   if(isset($_GET['user'])){
   	$user = $_GET['user'];
   	$role = $_GET['role'];
   	if($role === "TA"){
   		$_SESSION['usern']=$user;
   	    echo "<script>window.location.href='TA.php';</script>";
   	}
   	else if($role === "Manager"){
   		
		echo "<script>window.location.href='Manager.php';</script>";
   	}
   }   
?>