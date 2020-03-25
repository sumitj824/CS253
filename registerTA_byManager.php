<?php 

session_start();

$servername = "localhost";
$conn = mysqli_connect($servername,"root","");
mysqli_select_db($conn,"cs253");
if(isset($_POST['reg_user'])){
    $role = "TA";
    //$manager = mysqli_real_escape_string($conn,$_POST['manager']);
    $user = mysqli_real_escape_string($conn,$_POST['username']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $cpass = mysqli_real_escape_string($conn,$_POST['cpassword']);
    if($pass != $cpass){
        echo  '<div class="alert alert-danger">
                <a href="registration.php" class="close" data-dismiss="alert" aria-label="close">Close X</a>
                <p><strong>Alert!</strong></p>
                Password and Confirm Password do not match! Please try again!.
            </div>';
    }
    else{
      $sql = "select * from logininfo where username='".$user."' limit 1";
      $result = mysqli_query($conn,$sql);
      $user1 = mysqli_fetch_assoc($result);
      if($user1){
        if($user1['username'] === $user){
            echo  '<div class="alert alert-danger">
                <a href="registration.php" class="close" data-dismiss="alert" aria-label="close">Close X</a>
                <p><strong>Alert!</strong></p>
                Username already exists! Please try again!.
            </div>';
        }
      }
      else{
        $password = md5($pass);
        $query = "INSERT INTO logininfo (role,username,password) VALUES('$role','$user','$password')";
        $manager=$_SESSION['IDMan'];
        //$query2 = "INSERT INTO tas (username,password,managerID) VALUES('$user','$password','$manager')";
        $query2 = "INSERT INTO tas (username,password,managerID) VALUES('$user','$password','$manager')";
        $result2 = mysqli_query($conn,$query);
        $result3 = mysqli_query($conn,$query2);
        if($result2){
          header('location: registerTA_byManager.php');
        }
      }
   }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Register a TA</title>
  <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
</head>
<style type="text/css">
  body {
  background: #eee !important;
}

.wrapper {
  margin-top: 80px;
  margin-bottom: 80px;
  align-content: center;
}

.role{
  font-size : 20px;
}

.name{
  width : 100px;
}

.form-signin {
  left : 21vw;
  top : 0px;
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.1);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 30px;
  font-weight : bold;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<body>
    <div class="wrapper">
    <form  class="form-signin" action = "registerTA_byManager.php" method = "post">
       <h2 class="form-signin-heading">Register a TA</h2>
      <input type="text" class="form-control" name="username" placeholder="Username">
      <br>
      <input type="password" class="form-control" name = "password" placeholder="Password">
      <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
      <!--<label class="role" for="role">Assign TA to : </label>
      <select name="manager"> 
          <?php 
            /*$query4 = "SELECT * FROM managers";
            $result5 = mysqli_query($conn,$query4);
            while($row = mysqli_fetch_assoc($result5)){
              $query5 = "SELECT COUNT(*) FROM tas WHERE managerID = '".$row['id']."'";
              $result6 = mysqli_query($conn,$query5);
              $num = mysqli_fetch_array($result6);
              echo "<option value='".$row['id']."'>".$row['username']." - ".$num[0]."</option>";
            }*/
           ?>
      </select>-->
      <br>
      <br>
      <button name="reg_user" class="btn btn-lg btn-primary btn-block" type = "submit">SUBMIT</button>
    </form>
    </div>
</body>
</html>
