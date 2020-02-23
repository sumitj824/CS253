<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/registration.css">
</head>
<body>
    <div class="wrapper">
    <form  class="form-signin" action = "registration.php" method = "post">
       <h2 class="form-signin-heading">Create an Account</h2>
      <label class="role" for="role">Select Role :  </label>
      <select name = "role" id = "role">
        <option value = "TA">TA</option>
        <option value = "Manager">Manager</option>
      </select>
      <br>
      <br>
      <input type="text" class="form-control" name="username" placeholder="username"><br>
      <br>
        <input type="password" class="form-control" name = "password" placeholder="password"><br>
      
         <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password"><br><br>
      <button name="reg_user" class="btn btn-lg btn-primary btn-block" type = "submit">SUBMIT</button>
    </form>
    </div>
</body>
</html>


<?php 

$servername = "localhost";
$conn = mysqli_connect($servername,"root","");
mysqli_select_db($conn,"testlog2");
if(isset($_POST['reg_user'])){
    $role = mysqli_real_escape_string($conn,$_POST['role']);
    $user = mysqli_real_escape_string($conn,$_POST['username']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);
    if($pass != $cpass){
        die();
    }
    $sql = "select * from logininfo where username='".$user."' limit 1";
    $result = mysqli_query($conn,$sql);
    $user1 = mysqli_fetch_assoc($result);
    if($user1){
        if($user1['username'] === $user AND $user1['role'] === $role){
            die();
        }
    }
    $password = md5($pass);
    $query = "INSERT INTO logininfo (role,username,password) VALUES('$role','$user','$password')";
    $result2 = mysqli_query($conn,$query);
    if($result2){
     header('location: registration.php');
    }
}
?>