<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
 <?php 

session_start();

if (isset($_SESSION['user_name'])){ require 'Bar/Top1.php';}
else{header("location:Login.php");}

require 'Controller/Confirm Password Change.php';
 ?>


<div class="div">
<form method="post">
 <fieldset style="width: 550px; margin: auto; margin-top: 20px; margin-bottom: 20px;">
  <legend><b>CHANGE PASSWORD</b></legend>

  <label for="current_password">Current Password</label>
  <label style="margin-left: 30px;">: <input type="password" id="current_password" name="current_password">
  <span class="error"> <?php echo $current_passwordErr;?></span>
  <br><br>

  <label for="new_password" style="color: green;">New Password</label>
  <label style="margin-left: 50px;">: <input type="password" id="new_password" name="new_password">
  <span class="error"> <?php echo $new_passwordErr;?></span>
  <br><br>

  <label for="retype_new_password" style="color: red;">Retype New Password :</label>
  <input type="password" id="retype_new_password" name="retype_new_password">
  <span class="error"> <?php echo $retype_new_passwordErr;?></span>
  <br><br>

  <hr>

  <input type="submit" value="Submit">

 </fieldset>
</form>
<?php
echo $massage;
?>
</div> 
<?php require 'Bar/Footer.php';?>
</body>
</html>