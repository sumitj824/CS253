<?php

  session_start();

?>



<?php 
    $conn = mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"cs253");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       $username = $_POST['username'];
       $password = $_POST['password'];
       $username = stripcslashes($username);
       $password = stripcslashes($password);
       $username = mysqli_real_escape_string($conn,$username);
       $password = mysqli_real_escape_string($conn,$password);
       // to prevent mysqli injection
       $pass = md5($password);
       $query = "select * from logininfo where username='".$username."' and password='".$pass."'";
       $result = mysqli_query($conn,$query);
       $count = mysqli_num_rows($result);
       if($count == 1){
        $user = mysqli_fetch_assoc($result);
        if($user['role'] === "Manager"){
          header('location:Manager.php');
          $query1 = "select * from managers where username='".$username."'";
          $result1 = mysqli_query($conn,$query1);
          $userManager = mysqli_fetch_assoc($result1);
          $_SESSION['IDMan']=$userManager['id'];
          $_SESSION['userMan']=$username;
        }
        else if($user['role'] === "TA"){
          header('location:TA.php');
          $_SESSION['usern']=$username;
        }
       }
       else{
         echo  '<div class="alert alert-danger">
                <a href="login.php" class="close" data-dismiss="alert" aria-label="close">Close X</a>
                <p><strong>Alerta!</strong></p>
                Username or password wrong! Please try again!.
                </div>';
       }
    }
    $conn -> close();
 ?>

<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/login.css">

</head>
<body>

<div class="wrapper">
    <form class="form-signin" action="" method = "post">       
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/> 
      </label>
      <button class="btn btn-lg btn-primary btn-block" name = "submit" type="submit">Login</button>   
    </form>
  </div>
</body>

</head>