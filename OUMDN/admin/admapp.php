<?php
// our status in database is memvalidadmin. but in front end we have to display Status only.
session_start();
//error_reporting(0);
include('includes/config.php');
//require_once('dbconnection.php');
if(!isset($_SESSION['adminusernm'])){
  header('location:admin.php');
}
else{
// here 000000000zero000000000 status means peiding confirmation
// code for blocked members
if(isset($_GET['inngoappname']))
{
$ngoappname=$_GET['inngoappname'];
$status=1;//replace 1 with 0 had for our table 1 is not blocked its open ofrm where this code is taken it opposite.
$sql = "update ngoapp set ngoappstatus=:status  WHERE ngoappname=:ngoappname";
$query = $dbh->prepare($sql);
$query -> bindParam(':ngoappname',$ngoappname, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:admapp.php');
}



//code for currently active members
if(isset($_GET['ngoappname']))
{
$ngoappname=$_GET['ngoappname'];
$status=0;
$sql = "update ngoapp set ngoappstatus=:status  WHERE ngoappname=:ngoappname";
$query = $dbh->prepare($sql);
$query -> bindParam(':ngoappname',$ngoappname, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:admapp.php');
}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />

   <style>
   .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
table tr td, table tr th{
    background-color: rgba(210,130,240, 0.3) !important;
}
</style>
<title>appointment status check for ngo</title>
<link rel="stylesheet" type="text/css" href="assets/css/adminstyle4.css"/>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
    <meta name="viewport" content="wuserth=device-wuserth, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- BOOTSTRAP CORE STYLE  hey jay include this in your projects main file -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
  <div class="container row">
<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
  <h4 style="margin-left:10px;" class="text-white float-left topleft "> Logged in as: <?php echo $_SESSION['adminusernm']; ?></h4 >

    <div class="button-box">
           <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-danger float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='adminlogout.php'">Sign Out</button>

             <button class="btn btn-primary float-right btn-md"  onclick="location.href='adminhome.php'"><i class="fa fa-home"> Admin home</i></button>

			</div>
    </div>
</div>

    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h1 class="display-4"style="color:#15f4ee; text-align:center;"><b>Appointment requests by NGO</b></h1>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Appointment requests
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" ngoappname="dataTables-example">
                                    <thead>
                                        <tr>


										    <th><b>Name of the NGO</b></th>
											<th><b>Email</b></th>
											<th><b>Contact</b></th>
                                            <th><b>Website</b></th>
                                            <th><b> Description</b></th>
                                            <th><b>Date</b></th>
                                            <th><b>Status</b></th>
                                            <th><b>approve</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * from ngoapp";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($result->ngoappname);?></td>
                                            <td class="center"><?php echo htmlentities($result->ngoappemail);?></td>
                                            <td class="center"><?php echo htmlentities($result->ngoappphone);?></td>
                                            <td class="center"><?php echo htmlentities($result->ngoappurl);?></td>
                                            <td class="center"><?php echo htmlentities($result->ngoappdesc);?></td>
                                            <td class="center"><?php echo htmlentities($result->ngoappdate);?></td>

                                            <td class="center"><?php if($result->ngoappstatus==0)
                                            {
                                                echo htmlentities("Appointment approval pending");
                                            } else {


                                            echo htmlentities("Approve appointment request");
}
                                            ?></td>
                                            <td class="center">
<?php if($result->ngoappstatus==0)
 {?>
<a href="admapp.php?inngoappname=<?php echo htmlentities($result->ngoappname);?>" onclick="return confirm('Are you sure you want to approve the appointment request made by the NGO ?');"" >  <button class="btn btn-success"> Approve</button>
<?php } else {?>

                                            <a href="admapp.php?ngoappname=<?php echo htmlentities($result->ngoappname);?>" onclick="return confirm('Are you sure you want to withdraw the approval for the appointment request made by the NGO ?');""><button class="btn btn-warning"> Withdraw approval</button>
                                            <?php } ?>

                                            </td>
                                        </tr>
                                      <?php $cnt=$cnt+1;}} ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>



    </div>
    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
