<?php
session_start();
if(!isset($_SESSION['adminusernm'])){
  header('location:admin.php');
}
 ?>









 
 <html>
 <head>
<title>Admin homepage</title>
<link rel="stylesheet" type="text/css" href="assets/css/adminhome.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </head>
 <body>
   <div class="container row">
<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
  <h4 style="margin-left:10px;" class="text-white float-left topleft "><?php echo $_SESSION['adminusernm']; ?> login</h4 >

    <div class="button-box">
           <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-danger float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='adminlogout.php'">Sign Out</button>
       </div>
      </div>
</div>
<div class="container mt-3 p-3 d-flex justify-content-between ">
  <div class="card shadow" style="width:350px">
  <div class="inner">
	    <img class="card-img-top" src="assets/css/img/product.jpg" alt="donate medicine vector" style="width:100%">
  </div>
    <div class="card-body">
      <center><h4 class="card-title"><b>Manage members</b></h4>
      <p class="card-text">block members or delete members account that donate illicit drug</p>
      <button onclick="location.href='admmem.php'" type="button" class="btn btn-info  btn-lg">manage members</button></center>
    </div>
  </div>

    <div class="card shadow" style="width:350px">
  <div class="inner">
	    <img class="card-img-top" src="assets/css/img/users.jpg" alt="donate medicine vector" style="width:100%">
  </div>

    <div class="card-body">
    
    <br>
      <center><h4 class="card-title"><b>Manage approvals</b></h4>
      <p class="card-text">Manage appointment requests made by NGO’s</p>
      <button onclick="location.href='admapp.php'" type="button" class="btn btn-info  btn-lg" >manage request</button></center>
    </div>
  </div>  
  
    <div class="card shadow" style="width:350px">
  <div class="inner">
	    <img class="card-img-top" src="assets/css/img/order2.jpg" alt="donate medicine vector" style="width:100%">
  </div>
    <div class="card-body">
      <center><h4 class="card-title"><b>Monthly report</b></h4>
      <p class="card-text">The monthly report of the members who had donated medicine</p>
      <button onclick="location.href='admrep.php'" type="button" class="btn btn-info  btn-lg">generate report</button></center>
      <!--generate pdf for the same-->
    </div>
  </div>
</div>


 </body>
 </html>
