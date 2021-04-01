<!DOCTYPE html>
<html>
<head>
<title>Log In</title>
<link rel="stylesheet" href="CSS/style.css">
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
require 'Controller/LoginCheck.php';
?>

<div class="div">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
 <fieldset style="margin-top:100px; margin-bottom: 100px;width: 600px;">
  <legend><b>LOGIN</b></legend>
  <br><br>
  <label for="user_name">User Name</label>
  <label style="margin-left: 47px;">: <input type="text" name="user_name" size="30" value="<?php if(isset($_COOKIE['user_name'])){echo $_COOKIE['user_name'];} ?>"></input></label>
  <span class="error"> <?php echo $user_nameErr;?></span>
  <br><br>

  <label for="password">Password</label>
  <label style="margin-left: 58px;">: <input type="password" name="password" size="30" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>"></input></label>
  <span class="error"> <?php echo $passwordErr;?></span>
  <br><br>

  <hr>

  <input type="checkbox" id="rememberme" name="rememberme">
  <label for="rememberme">Remember Me</label><br><br>

  <input type="submit" value="Submit"><a href="Forgot Password.php">Forgot Password?</a>

 </fieldset>
</form> 
</div>

<?php require 'Bar/Footer.php';?>

</body>
</html>