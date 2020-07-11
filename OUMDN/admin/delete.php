<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "medibase");
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $que = "DELETE FROM memberinfo WHERE user =". $user ."";
  mysqli_query($connect, $que);
 }
}
?>