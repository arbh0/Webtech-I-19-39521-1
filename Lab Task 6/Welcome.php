<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<?php 
session_start();
if (isset($_SESSION['user_name'])){require 'Bar/Top1.php';}
else{require 'Bar/Top.php';}
 ?>
<h1 class="welcome, div">Welcome To Modern Medical</h1>
<div class="div">
<img class="p" src="Photos/Photo1.jpg" alt="Welcome Photo">
</div>
<?php require 'Bar/Footer.php';?>

</body>
</html>