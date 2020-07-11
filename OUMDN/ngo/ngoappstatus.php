<?php
session_start();
require_once('dbconnection.php');
$con=mysqli_connect("localhost","root","","medibase");
if(!isset($_SESSION['namengo'])){
  header('location:ngologinreg.php');
}
$ngoname=$_SESSION['namengo'];
$sel="SELECT  ngoappstatus FROM ngoapp WHERE ngoappname='$ngoname'";
$result=mysqli_query($con,$sel);
if ($result || mysqli_num_rows($result)>0) {
while($row = mysqli_fetch_assoc($result)) {
$ngoappstatus=$row["ngoappstatus"];
if($ngoappstatus==0){
  $status="Pending Approval";
}
else{
  $status="Approved";
}
}
}
else {
echo "<br><br><b>⠀Security check skipped, Error in the code</b>";
}
$query="SELECT  * FROM ngoapp WHERE ngoappname='$ngoname' ORDER BY ngoappdate";
$results=mysqli_query($con,$query);
?>
<html>
 <head>
<title>ngo appointment status check</title>
<link rel="stylesheet" type="text/css" href="assets/css/ngostyle5.css"/>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
 </head>
<body>
	     <div class="container row">
<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
  <h4 style="margin-left:10px;" class="text-white float-left topleft "> NGO: <?php echo $_SESSION['namengo']; ?></h4 >

    <div class="button-box">
           <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-danger float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='ngologout.php'">Sign Out</button>
             <button type="button" class="btn btn-primary float-right" onclick="location.href='ngohome.php'">Ngo Home</button>
			</div>
    </div>
</div>
<!--starty your code here reading the bootstrap documentation-->
<div class="container" style="color:#fff">
  <h3 align="center" style="color:#ACACFF">Check the status of your appointment</h3>
  <br/>
  <div class="table-responsive ">
    <table id="ngoappointment" style="color:#F8F8F8 " class="table table-striped table-bordered">
      <thead style="color:#C0C0C0" class="table-active">
        <td><b>NGO name</b></td>
        <td><b>Email</b></td>
        <td><b>Contact</b></td>
        <td><b>Website</b></td>
        <td><b>Description</b></td>
        <td><b>Appointment date</b></td>
          <td><b>Status</b></td>
      </thead>
      <?php
      while ($row=mysqli_fetch_array($results)) {
        echo '
        <tr>
        <td>'.$row["ngoappname"].'</td>
        <td>'.$row["ngoappemail"].'</td>
        <td>'.$row["ngoappphone"].'</td>
        <td>'.$row["ngoappurl"].'</td>
        <td>'.$row["ngoappdesc"].'</td>
        <td>'.$row["ngoappdate"].'</td>
        <td style="color:	cyan">'.$status.'</td>
        </tr>
        ';
      }
       ?>
    </table>
  </div>
  </div>
</body>
</html>
