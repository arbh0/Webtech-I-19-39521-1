<!DOCTYPE html>
<html>
<head>
	<title>
		Profile Picture
	</title>
	<style>
		.box {
			border: 2px solid black;
		}
	</style>
</head>
<body>
	 <?php 

session_start();

if (isset($_SESSION['user_name'])){ require 'Top1.php';}
else
  header("location:Login.php");
 ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<div>
	<div class= "box"; style="margin-left: 150px;margin-right: 150px; margin-top:100px; margin-bottom: 20px; height: 350px; left; width: 600px; margin: auto; bottom: 100px;margin-top: 100px;">
		<img src="pp.png" alt="Picture"; style="margin-left: 25px; margin-top: 25px;height: 160px; width: 140px;"><br>
		<input style="margin-left: 25px;margin-top: 10px;" type="file" name="ProfilePicture" id="ProfilePicture">
		<hr style="border: 0.25px solid black;margin-left: 20px;margin-right: 20px"><br>
		<input type="submit" style="margin-left: 25px; margin-bottom: 20px;" name="submit" value="Submit">
	</div>
	<div style="height: 35px;
    width: 155px;
    background-color: #fffefe;
    color: black;

    transform: translate(495px, -385px); ">
		<p style="text-align: center;padding-top: 7px;"><b>PROFILE PICTURE</b></p>
	
	</div>
	</div>
</form>
<?php require 'Footer.php';?>
</body>
</html>