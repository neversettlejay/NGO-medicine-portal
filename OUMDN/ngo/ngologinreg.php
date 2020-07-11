    <?php
    /*THis code is of memvalidation so we do not need memvalidation file Checks login and usernames uniqueness*/
    session_start();
    require_once('dbconnection.php');
    /*this code is for registration*/
      if(isset($_POST['ngoregistration']))
      {
    //mysqli_select_db($con,'medibase');
    $ngoname=$_POST['ngoname'];
    $ngoemail=$_POST['ngoemail'];
    $ngophone=$_POST['ngophone'];
    $ngourl=$_POST['ngourl'];
    $location=$_POST['location'];
    $ngopassword=$_POST['ngopassword'];
    $enc_ngopassword=$ngopassword;
    //as the code/ function was not worling to check the uniqueness of the username i have removed it
    $msg=mysqli_query($con,"insert into ngoinfo(ngoname,ngoemail,ngophone,ngourl,location,ngopassword) values ('$ngoname','$ngoemail','$ngophone','$ngourl','$location','$enc_ngopassword')") or die( mysqli_error($con));
    if($msg)
    {
        echo "<script>alert('Your NGO has been registered. Please login to continue.');</script>";
    }
    else {
     echo "<script>alert('Sonething went wrong. Please try again.');</script>";
    }
    }
    //this is the code for login
      if(isset($_POST['ngovalidation']))
      { 
      //  mysqli_select_db($con,'medibase');
        $ngoname=$_POST['ngoname'];
 $ngopassword=$_POST['ngopassword'];
    $dec_password=$ngopassword;
                /*this code snippent might not work because of mysqli_num_rows function  used to make username unique*/
        //member info is the table name from the database medibase
        $result=mysqli_query($con,"SELECT * FROM ngoinfo WHERE ngoname='$ngoname' and ngopassword='$dec_password'")or die( mysqli_error($con));
        $num=mysqli_fetch_array($result);
        if($num>0)  {
          $extra="ngohome.php";
        $_SESSION['namengo']=$_POST['ngoname'];//ngoname=namengo
        $host=$_SERVER['HTTP_HOST'];
    $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
          //header('location:memberhome.php');//i.e. successful login
          /* */

        }
        else {
        //header('Location:memloginreg.php');
        echo "<script>alert('Unregistered NGO or wrong NGO credentials');</script>";
    $extra="ngologinreg.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    //header("location:http://$host$uri/$extra");
    //exit();
        }
    }
?>

    <html>
    <!--login.php this file contains code for both login and registration-->
    <head>
      <link rel="stylesheet" type="text/css" href="assets/css/ngostyle.css">
	  	  <link rel="stylesheet" type="text/css" href="assets/css/ngostyle6.css">
		  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <title>ngo login and registration</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
</style>
    </head>
    <body>
	<div class="container row">
	<!--   <a class="float-right" class href="memlogout.php">Logout</a>-->
    <div class="button-box">
           <div class="button-box col-lg-20 float-right topright">
               <button type="button" class="btn btn-info float-right" style="margin-left:20px; margin-right:10px; " onclick="location.href='../index.php'">Home</button>
             
       </div>
            </div>

</div>
      <div class="container">
        <div class="login-box">
        <div class="row">
          <div class="col-md-6 log" >
              <h2 style='text-align:center'>Sign-in as NGO</h2>
              <form action="" method="post"  name="ngovalidation">
                <!--we shift the action for form memvalidation in this file itself on top   <form action="memvalidation.php" method="post" name="memvalidation">-->
                <div class="form-group">
                  <label>Name of the NGO</label>
                  <input type="text" name="ngoname" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="ngopassword" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="ngovalidation">Login</button>
              </form>
          </div>
          <!--the above one is for login-->
          <!--the below one is for Registration-->
          <div class="col-md-6 reg" >
              <h2 style='text-align:center'>Register your NGO</h2>
              <form action="" method="post" enctype="multipart/form-data" name="ngoregistration">
                <div class="form-group">
                  <label>Name of the NGO</label>
                  <input type="text" name="ngoname" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="ngoemail" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                        <input type="tel" name="ngophone" placeholder="without country code" pattern="[0-9]{10}" class="form-control" required>
                      </div>
                  <div class="form-group">
                  <label>NGO website</label>
                  <input type="url" name="ngourl" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" required>
                    </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="ngopassword" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="ngoregistration">Sign up</button><br>
              </form>
          </div>
        </div>
      </div>
    </body>
    </html>
