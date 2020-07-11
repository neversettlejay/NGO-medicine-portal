<?php
session_start();
require_once('dbconnection.php');
if(!isset($_SESSION['namengo'])){
  header('location:memloginreg.php');
  }
  if(isset($_POST['ngoappointment']))
    {
  //mysqli_select_db($con,'medibase');
  $ngoappname=$_SESSION['namengo'];
  $ngoappemail=$_POST['ngoappemail'];
  $ngoappphone=$_POST['ngoappphone'];
  $ngoappurl=$_POST['ngoappurl'];
  $ngoappdesc=$_POST['ngoappdesc'];
  $ngoappdate=$_POST['ngoappdate'];
  //STATUS will be in admin and its default value is pending
  $d1=strtotime($ngoappdate);
  $d3=ceil(($d1-time())/60/60/24);//not today
  if($d3>0 && $ngoappname==$_SESSION['namengo']){
  $msg=mysqli_query($con,"insert into ngoapp(ngoappname,ngoappemail,ngoappphone,ngoappurl,ngoappdesc,ngoappdate) values ('$ngoappname','$ngoappemail','$ngoappphone','$ngoappurl','$ngoappdesc','$ngoappdate')");
  if($msg)
  {
      echo "<script>alert('Appointment request sent.');</script>";
  }
  else {
   echo "<script>alert('Something went Wrong. please try again. ');</script>";
  }
  }
  else {
   echo "<script>alert('Please check the entered credentials. Name of the NGO might not have matched with that of the database or Dates might not be valid.');</script>";
  }
  //as the code/ function was not worling to check the uniqueness of the username i have removed it
}

 ?>
<html lang="en">
<head>
<script type="text/javascript" src="https://github.com/rubyeffect/easy_fill/tree/master/lib/easy_fill-0.0.1.min.js"></script>
  <title>Appointment for admin by NGO</title>
  <link rel="stylesheet" type="text/css" href="assets/css/ngo_appointment.css"/>
  <link rel="stylesheet" type="text/css" href="assets/css/ngo_appointment2.css"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container row">
<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
             <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-danger float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='ngologout.php'">Sign Out</button>

			</div>
			<div class="button-box col-lg-20 float-right topleft">
				             <button type="button" class="btn btn-primary float-right" onclick="location.href='ngohome.php'">Home</button>
			</div>
        </div>
  <div id="container">
    <!--This is a division tag for body container-->
    <div id="body_header">
      <!--This is a division tag for body header-->
      <h1 style="color:white">Request an appointment</h1>

    </div>
    <form action="" method="post" enctype="multipart/form-data" name="ngoappointment">
      <fieldset>
        <legend style="text-align:center"><b>NGO Details</b></legend>
        <label for="name">Name of the NGO</label>
        <input type="text" id="ngoappname" name="ngoappname" placeholder="NGO Name" class="form-control" required pattern="[a-zA-Z0-9]+">
		<label for="mail">Email</label>
        <input type="email" id="ngoappemail" name="ngoappemail" class="form-control" placeholder="Email" required>
        <label for="tel">Contact Number</label>
        <input type="tel" id="ngoappphone" class="form-control" placeholder="Without country code" name="ngoappphone">
        <label for="url">Website URL</label>
        <input type="url" id="ngoappurl" class="form-control" name="ngoappurl" placeholder="enter your url" >


      </fieldset>

      <fieldset>
        <legend style="text-align:center"><b>Appointment Details</b></legend>
        <label for="appointment_description">Description</label>
        <textarea class="form-control" id="ngoappdesc" name="ngoappdesc" placeholder="Details of the appointment"></textarea>
        <label for="date">Date</label>
        <input class="form-control" type="date" name="ngoappdate" id="ngoappdate" value="" required></input>
        <br>

      </fieldset>
      <button type="submit" name="ngoappointment" style="background-color: #E30047">Request For Appointment</button>
    </form>
  </div>
</body>

</html>
