<!DOCTYPE html>
<html>
<head>
<title>Approval</title>
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="CSS/bootstrap.css">
</head>
<body>
<?php 
session_start();
if (isset($_SESSION['user_name']))
{
	require 'Bar/Top1.php';
}
else
{
	header("location:Login.php");
}
 ?>
<div class="container-fliud" style="margin-top:50px; margin-bottom: 80px;">
<h2 class="welcome, div">User Request</h2><br>
<div class="container">
<ul style="list-style-type:circle;">
  <li><a href="DoctorReq.php">Doctor Request List</a></li><br>
  <li><a href="PaitentReq.php">Paitent Request List</a></li><br>
  <li><a href="ReceptionistReq.php">Receptionist Request List</a></li>	
</ul>  
</div>
</div>
<br><br><br><br><br><br><br><br>
<?php require 'Bar/Footer.php';?>

</body>
</html>