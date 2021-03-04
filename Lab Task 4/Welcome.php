<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
<?php 

session_start();

if (isset($_SESSION['user_name']))
{
	require 'Top1.php';
}
else
{
	require 'Top.php';
}

?>
<h1 style="text-align: center;
  margin: 15% 0;">Welcome To Our Company</h1>  	
<?php require 'Footer.php';?>

</body>
</html>
