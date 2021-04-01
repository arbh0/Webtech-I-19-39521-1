<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<?php 
session_start();
if (isset($_SESSION['user_name'])){header("location:Welcome.php");}
else{require 'Bar/Top.php';}
require 'Controller/Recover Password.php';
?>

<div class="div">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
 <fieldset>
  <legend>Forgot Password</legend>

  <label for="email">Enter Email :</label>
  <input type="text" id="email" name="email">
  <span class="error"> <?php echo $emailErr;?></span><hr>

  <input type="submit" value="Submit">
 </fieldset>
</form> 

</div>
<?php 
echo $massage;
require 'Bar/Footer.php';?>
</body>
</html>