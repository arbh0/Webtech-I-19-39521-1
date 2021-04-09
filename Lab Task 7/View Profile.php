<!DOCTYPE html>  
<html>  
<head>  
<title>View profile</title>
<link rel="stylesheet" href="CSS/style.css">
</head>  
<body>
<?php 

session_start();

if (isset($_SESSION['user_name'])){require 'Bar/Top1.php';}
else{header("location:Login.php");} 

require 'Controller/Show Data.php';

?> 

<div class="div">
<fieldset style="width: 430px; margin: auto; margin-top: 20px; margin-bottom: 20px;">
<legend><b>PROFILE</b></legend>

<div class="justLeft">
  <p><b>Name :</b>              <?php echo $name ?></p><hr>
  <p><b>User Name :</b>          <?php echo $user_name ?></p><hr>
  <p><b>ID :</b>                <?php echo $id ?></p><hr>
  <p><b>Email :</b>              <?php echo $email ?></p><hr>
  <p><b>Mobile Number :</b>     <?php echo $mobile ?></p><hr>
  <p><b>Address        :</b>   <?php echo $address ?></p><hr>
  <p><b>Shift          :</b>   <?php echo $shift ?></p><hr>
  <p><b>Gender         :</b>   <?php echo $gender ?></p><hr>
  <p><b>Date of Birthday :</b>  <?php echo $dob ?></p>
</div> 

<div class="justRight">
  <br><br><br><br><br><br>
  <img style="width: 200px; margin-top: 20px; margin-bottom: 20px;" src="Photos/<?php 
  if ($_SESSION['image']!=null){echo $_SESSION['image'];}
  else{echo "pp.png";}
  ?>" alt="Profile Picture"> 
  <div class="textCenter"> <a href="Change Profile Picture.php" >Change Profile Picture</a>
  </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>
<a class="justLeft" href="Edit Profile.php">Edit Profile</a>
<a class="justRight" href="Change Password.php">Change Password</a>
</fieldset> 
</div>


<?php require 'Bar/Footer.php';?>
</body>  
</html> 