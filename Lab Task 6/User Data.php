<!DOCTYPE html>
<html>
<head>
<title>User Information</title>
<link rel="stylesheet" href="CSS/style.css">
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
<h2 class="welcome, div">Current User Details</h2>
<div style="margin-left: 200px;">
<ul style="list-style-type:circle;">
  <li><a href="DocInfo.php">Doctor Information</a></li><br>
  <li><a href="PaitentInfo.php">Paitent Information</a></li><br>
  <li><a href="EymployeeInfo.php">Eymployee Information</a></li>	
</ul>  
</div>
<br><br>
<?php require 'Bar/Footer.php';?>

</body>
</html>