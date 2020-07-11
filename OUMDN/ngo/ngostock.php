<?php
session_start();
require_once('dbconnection.php');
if(!isset($_SESSION['namengo'])){
  header('location:ngologinreg.php');
}
$ngoname=$_SESSION['namengo'];
$con=mysqli_connect("localhost","root","","medibase");
$query="SELECT  * FROM medidonate ORDER BY donatedate";
$result=mysqli_query($con,$query);
?>
<html>
 <head>
<title>ngo appointment status check</title>
<link rel="stylesheet" type="text/css" href="assets/css/ngostyle4.css"/>
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
  <h3 align="center" style="color:#ACACFF">Stock of the donated medicine</h3>
  <br/>
  <div class="table-responsive ">
    <table id="ngoappointment" style="color:#F8F8F8 " class="table table-striped table-bordered">
      <thead style="color:#C0C0C0" class="table-active">
        <td><b>Member ID</b></td>
        <td><b>Medicine name</b></td>
        <td><b>Donate date</b></td>
        <td><b>Expiry date</b></td>
        <td><b>Use</b></td>
      </thead>
      <?php
      while ($row=mysqli_fetch_array($result)) {
        echo '
        <tr>
        <td>'.$row["donorsid"].'</td>
        <td>'.$row["medicinenm"].'</td>
        <td>'.$row["donatedate"].'</td>
        <td>'.$row["expdate"].'</td>
        <td>'.$row["usedfor"].'</td>
        </tr>
        ';
      }
       ?>
    </table>
  </div>
  </div>
</body>
</html>
