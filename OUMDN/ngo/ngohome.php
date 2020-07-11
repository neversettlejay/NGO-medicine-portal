<?php
// WHOLE FILE LEFT TO EDIT WAIT FOR An hour
session_start();
if(!isset($_SESSION['namengo'])){
  header('location:ngologinreg.php');
}
 ?>
 <html>
 <head>
<title>homepage of NGO</title>
<link rel="stylesheet" type="text/css" href="assets/css/ngostyle2.css">
<title>member login and registration</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </head>
 <body>
   <div class="container row">
<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
  <h4 style="margin-left:10px;" class="text-white float-left topleft "> NGO: <?php echo $_SESSION['namengo']; ?></h4 >

    <div class="button-box">
           <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-primary float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='ngologout.php'">Sign Out</button>
             <button type="button" class="btn btn-danger float-right" onclick="location.href='ngoresetpassword.php'">Reset Password</button>
			</div>
    </div>
</div>
	<div class="container mt-3 p-3 d-flex justify-content-between ">
  <div class="card" style="width:360px">
    <img class="card-img-top" src="assets/css/img/request1.jpg" alt="donate medicine vector" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Appointment</h4>
      <p class="card-text">Request the administratior for appointment or view the status of your appointment</p>
      <button onclick="location.href='ngo_appointment.php'" type="button" class="btn btn-primary btn-lg"> Make a request</button>
	        <button type="button" style="float: right;" class="btn btn-info btn-lg" onclick="location.href='ngoappstatus.php'">See status</button>
    </div>
  </div>

  <div class="card" style="width:360px">
    <img class="card-img-top" src="assets/css/img/status.jpg" alt=" transaction vector" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Stock of medicine</h4>
      <p class="card-text">View the donated medicines in stock</p>
	  <br>
		      <button type="button" class="btn btn-info btn-lg" style="position: absolute; right: 100;" onclick="location.href='ngostock.php'">View the stock</button>
    </div>
  </div>
</div>
	</body>
 </html>
