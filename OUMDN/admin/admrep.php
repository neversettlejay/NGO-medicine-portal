<?php

session_start();

// Turn off all error reporting

require_once('dbconnection.php');
error_reporting(0);
if(!isset($_SESSION['adminusernm'])){
	
  header('location:admin.php');
}
$ngoname=$_SESSION['adminusernm'];
$con=mysqli_connect("localhost","root","","medibase");

if(isset($_POST['search']))
{
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
		$query=("SELECT * FROM medidonate WHERE donatedate Between '$fromdate' and '$todate' order by donatedate");
		$result=mysqli_query($con,$query) or die( mysqli_error($con));
		$count = mysqli_num_rows($result);
		
}
?>

<!DOCTYPE html>
<html>
	<head>
	<style> table.center {
    margin-left:auto; 
    margin-right:auto;
  }</style>
		<title>Report</title>
		<link rel="stylesheet" type="text/css" href="assets/css/adminreport.css">
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
	  <h4 class="text-white float-left topleft " style="margin-left:10px;"> User: <?php echo $_SESSION['adminusernm']; ?></h4>
        <div class="button-box">
           <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-danger float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='adminlogout.php'">Sign Out</button>
             <button type="button" class="btn btn-primary float-right" onclick="location.href='adminhome.php'">Admin Home</button>
			</div>
        </div>

      </div>
		<center>
		<br><br><br>
		<form method="post">
		<table style="margin-left:auto;margin-right:auto;  margin: 100px; width:100%;" >
		<colgroup>
        <col style="width: auto" />
        <col style="width: 33.3333%" /> 
        <col style="width: 33.3333%" />
    </colgroup>
		<tr>
		<td style="padding:10px ">
		<lable for="fromdate" style="color:white"><h1 class="display-4">From</h1>
  </lable>
			<input type="date" name="fromdate"><br/><br/>
		</td>
		<td style="padding:10px">
			<lable for="todate" style="color:white"><h1 class="display-4">To</h1></lable>
			<input type="date" name="todate"><br/><br/>
			</td>
		</tr>
		</table>
			
			
			<button type="submit" class="btn btn-info btn-lg" name="search">Generate report</button>
			</form>
				<?php
				if($count == "0"){
					echo '<br><div class="alert alert-danger" role="alert">
  <h1 class="display-4">No data found in the given range of dates.</h1><h1 class="display-6">please try different range of dates</h1>
</div>';
				}
				else{
				?>					
				<div class="container" style="color:#fff"><br/>
			
					<br/>
					<div class="table-responsive">
						<table id="past_transactions" style="color:	#acffac" class="table table-striped table-bordered">
							<thead style="color:#FFFF00">
								<td>Donors Id</td>
								<td>Medicine Name</td>
								<td>Donate Date</td>
								<td>Expiry Date</td>
								<td>Used for</td>
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
				}
										   ?>
       
						</table>
					</div>
				</div>
		</center>
	</body>
</html>