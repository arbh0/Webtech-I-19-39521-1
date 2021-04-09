<!DOCTYPE html>  
<html>  
<head>  
<title>Registration</title>
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="CSS/bootstrap.css">
</head>  
<body>
  <?php 

session_start();

if (isset($_SESSION['user_name']))
  {
    header("location:Welcome.php");
  }
else
{
  require 'Bar/Top.php';
}
require 'Controller/DataStore.php';
?>

<div class="container div">
<div class="container-fluid">
<fieldset style="border: 2px solid black;padding: 20px 20px;width: 650px; margin: auto; margin-top: 20px; margin-bottom: 20px;">
<h3 style="text-align: center;"><b>REGISTRATION</b></h3><br>             
  <form method="POST"> 
  <label for="name">Name</label>
  <label style="margin-left: 81px;">: <input type="text" name="name" size="30"></input></label>
  <span class="error"> <?php echo $nameErr;?></span><hr>

  <label for="user_name">User Name</label>
  <label style="margin-left: 47px;">: <input type="text" name="user_name" size="30"></input></label>
  <span class="error"> <?php echo $user_nameErr;?></span><hr>

  <label for="email">Email</label>
  <label style="margin-left: 81px;">: <input type="email" name="email" size="30"></input><b> i </b></label>
  <span class="error"> <?php echo $emailErr;?></span><hr>

  <label for="mobile_number">Mobile Number</label>
  <label style="margin-left: 17px;">: <input type="tel" id="mobile_number" name="mobile" pattern="[0-9]{3}[0-9]{8}" size="30"></label>
  <span class="error"> <?php echo $mobileErr;?></span><hr>

  <label for="address">Address</label>
  <label style="margin-left: 66px;">: <input type="text" id="address" name="address" size="30"></label>
  <span class="error"> <?php echo $addressErr;?></span><hr>

  <label for="password">Password</label>
  <label style="margin-left: 58px;">: <input type="password" name="password" size="30"></input></label>
  <span class="error"> <?php echo $passwordErr;?></span><hr>

  <label for="confirm_password">Confirm Password</label>
  <label">: <input type="password" name="confirm_password" size="30"></input></label>
  <span class="error"> <?php echo $confirm_passwordErr;?></span><hr>

<fieldset style="border: 1px solid black;padding: 20px 20px;width: 600px">
  <h5><b>Shift</b></h5>
  <input type="radio" id="day" name="shift" value="Day (8AM - 4PM)">
  <label for="day">Day</label>
  <input type="radio" id="night" name="shift" value="Night (4PM -12PM)">
    <label for="night">Night</label>
  <span class="error"> <?php echo $shiftErr;?></span>
</fieldset><hr>

<fieldset style="border: 1px solid black;padding: 20px 20px;width: 600px">
<h5><b>Gender</b></h5>
  <input type="radio" id="male" name="gender" value="Male">
  <label for="male">Male</label> 
  <input type="radio" id="female" name="gender" value="Female">
  <label for="female">Female</label> 
  <input type="radio" id="other" name="gender" value="Other">
  <label for="other">Other </label>  
  <span class="error"> <?php echo $genderErr;?></span>
 </fieldset><hr>

<fieldset style="border: 1px solid black;padding: 20px 20px;width: 600px">
  <h5><b>Date of Birthday</b></h5>
  <input type="date" name="dob"> <i>(mm/dd/yyyy)</i>
  <span class="error"> <?php echo $dobErr;?></span>
</fieldset><hr>

<input type="checkbox" name="adminreq">
<label>Register As Admin </label>
<span class="error"> <?php echo $adminreqErr;?></span><hr>

<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Reset">
</form>  
</fieldset>
</div>
</div>
<?php require 'Bar/Footer.php';?>
</body>  
</html> 