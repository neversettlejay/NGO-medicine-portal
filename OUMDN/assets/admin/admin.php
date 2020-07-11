<?php
session_start();
require_once('dbconnection.php');
if(isset($_POST['loginadm']))
{
  $adminusernm=$_POST['adminusernm'];
  $adminpassword=$_POST['adminpassword'];

  $result=mysqli_query($con,"SELECT * FROM admininfo WHERE adminusernm='$adminusernm' and adminpassword='$adminpassword'");
  $num=mysqli_fetch_array($result);
  if($num>0)  {
    $extra="adminhome.php";
  $_SESSION['adminusernm']=$_POST['adminusernm'];
  $host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
  else {
  echo "<script>alert('Invalid username or password. Please try again');</script>";
$extra="admin.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Loign of admin</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<form action="" class="box" name="loginadm" method="post">
<h3>Admin Login</h3>
<input type="text" name="adminusernm" placeholder="Username">
<input type="password" name="adminpassword" placeholder="Password">
<input type="submit" name="loginadm" value="Login">
</form>


</body>
</html>
