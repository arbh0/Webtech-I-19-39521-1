<!DOCTYPE html>  
<html>  
<head>  
<title>Edit Profile</title>
<link rel="stylesheet" href="CSS/style.css"> 
</head>  
<body>
  <?php 

session_start();
if (isset($_SESSION['user_name'])){require 'Bar/Top1.php';}
else{header("location:Login.php");}

require 'Controller/Show Data.php';
require 'Controller/DataStore.php';
?> 


<fieldset style="width: 650px; margin: auto; margin-top: 20px; margin-bottom: 20px;">
<legend><b>EDIT PROFILE</b></legend>                 
  <form method="post"> 
  <label for="name"><b>Name</b></label>
  <label style="margin-left: 81px;">: <input type="text" name="name" size="30" value="<?php echo $name ?>"></input></label>
  <span class="error"> <?php echo $nameErr;?></span><hr>

  <label for="user_name"><b>User Name</b></label>
  <label style="margin-left: 47px;">: <input type="text" name="user_name" size="30" value="<?php echo $user_name ?>"></input></label>
  <span class="error"> <?php echo $user_nameErr;?></span><hr>

  <label for="email"><b>Email</b></label>
  <label style="margin-left: 81px;">: <input type="email" name="email" size="30" value="<?php echo $email ?>"></input><b> i </b></label>
  <span class="error"> <?php echo $emailErr;?></span><hr>

  <label for="mobile_number"><b>Mobile Number</b></label>
  <label style="margin-left: 17px;">: <input type="tel" name="mobile" pattern="[0-9]{3}[0-9]{8}" size="30" value="<?php echo $mobile ?>"></label>
  <span class="error"> <?php echo $mobileErr;?></span><hr>

  <label for="address"><b>Address</b></label>
  <label style="margin-left: 66px;">: <input type="text" name="address" size="30" value="<?php echo $address ?>"></label><hr>

  <label for="gender"><b>Shift</b></label>
  <label style="margin-left: 87px;">: <input type="radio" id="day" name="shift" value="Day (8AM - 4PM)"<?php if("Day (8AM - 4PM)" == $shift){echo "checked";}?>>
  <label for="day">Day</label>
  <input type="radio" id="night" name="shift" value="Night (4PM -12PM)"<?php if("Night (4PM -12PM)" == $shift){echo "checked";}?>>
    <label for="night">Night</label>
  <span class="error"> <?php echo $shiftErr;?></span><hr>

  <label for="gender"><b>Gender</b></label>
  <label style="margin-left: 70px;">: <input type="radio" id="male" name="gender" value="male"<?php if("male" == $gender){echo "checked";}?>>
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="female"<?php if("female" == $gender){echo "checked";} ?>>
  <label for="female">Female</label> 
  <input type="radio" id="other" name="gender" value="other"<?php if("other" == $gender){echo "checked";} ?>>
  <label for="other">Other </label>  
  <span class="error"> <?php echo $genderErr;?></span>
  <hr>

  <label for="dob"><b>Date of Birthday</b></label>
  <label style="margin-left: 10px;">: <input type="date" id="dob" name="dob" value="<?php echo $dob ?>">
  <span class="error"> <?php echo $dobErr;?></span>
  <hr>

<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Reset">
</form>  
</fieldset>
<?php require 'Bar/Footer.php';?>
</body>  
</html> 