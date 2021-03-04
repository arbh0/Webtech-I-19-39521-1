<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
</head>
<body>

<style>
.error {color: #FF0000;}
</style>

<?php 

session_start();
if (isset($_SESSION['user_name'])){header("location:Welcome.php");}
else
{
  require 'Top.php';
}

$retrive_email="rezaul@mail.com";
$emailErr = "";
$email = $massage ="";

if (isset($_POST['email'])) {
  if ($_POST['email']==$retrive_email) 
  {
    $massage ="<h1>We are sending you an Email</h1>";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["email"])) 
  {
    $emailErr = "*Input Email";
  }
  else 
  {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "*Invalid Email Format";
      $email="";
    }
    else if($_POST['email']!=$retrive_email)
    {
      $emailErr ="*Invalid Email"; 
    }
  }
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
 <fieldset style="width: 400px;margin: auto;margin-top: 150px;">
  <legend><b>Forgot Password</b></legend>
  <br>

  <label for="email">Enter Email :</label>
  <input type="text" id="email" name="email">
  <span class="error"> <?php echo $emailErr;?></span><hr>

  <input type="submit" value="Submit">
 </fieldset>
</form> 
<?php 
echo $massage;?>

<?php require 'Footer.php';?>
</body>
</html>