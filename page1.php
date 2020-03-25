<?php 
   if(isset($_GET['id'])){
   	$id = $_GET['id'];
   	$role = $_GET['role'];
   	if($role === "TA"){
   		session_start();
   		$_SESSION['auth'] = "TRUE";
		$_SESSION['id'] = $id;  		
   	    echo "<script>window.location.href='TA.php';</script>";
   	}
   	else if($role === "Manager"){
   		session_start();
   		$_SESSION['auth'] = "TRUE";
		echo "<script>window.location.href='Manager.php';</script>";
   	}
   }   
?>