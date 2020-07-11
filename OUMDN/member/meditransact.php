<?php
session_start();
require_once('dbconnection.php');
if(!isset($_SESSION['username'])){
  header('location:memloginreg.php');
}
$donorsid=$_SESSION['username'];
$con=mysqli_connect("localhost","root","","medibase");
$query="SELECT  * FROM medidonate WHERE donorsid='$donorsid' ORDER BY donatedate";
$result=mysqli_query($con,$query);
?>
<html>
 <head>
<title>seePreviousTransactions</title>
<link rel="stylesheet" type="text/css" href="assets/css/memberstyle5.css"/>
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
	  <h4 class="text-white float-left topleft " style="margin-left:10px;"> User: <?php echo $_SESSION['username']; ?></h4>
        <div class="button-box">
           <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-danger float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='memlogout.php'">Sign Out</button>
             <button type="button" class="btn btn-primary float-right" onclick="location.href='memberhome.php'">Member Home</button>
			</div>
        </div>

      </div>
<!--starty your code here reading the bootstrap documentation-->
<div class="container" style="color:#fff">
  <h3 align="center" style="color:#ACACFF"> Past Transactions </h3>
  <br/>
  <div class="table-responsive">
    <table id="past_transactions" style="color:	#acffac" class="table table-striped table-bordered">
      <thead style="color:#FFFF00">
        <td>Medicine name</td>
        <td>Date of donation</td>
        <td>Date of Expiry</td>
        <td>Medicine Description</td>
      </thead>
      <?php
      while ($row=mysqli_fetch_array($result)) {
        echo '
        <tr>
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
