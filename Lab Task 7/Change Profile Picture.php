<!DOCTYPE html>
<html>  
<head>  
<title>Change Profile Picture</title>
<link rel="stylesheet" href="CSS/style.css">
</head> 
<body>
 <?php 
session_start();
if (isset($_SESSION['user_name'])){ require 'Bar/Top1.php';}
else {header("location:Login.php");}
require 'Controller/Picture Upload.php';
?>

<div class="div">
<fieldset>
<legend><b>PROFILE PICTURE</b></legend>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
  <img style="margin-left: 25px; margin-right: 25px; margin-top: 25px;height: 160px; width: 140px;" 
  src="Photos/<?php 
  if (isset($_SESSION['image'])){echo $_SESSION['image'];} 
  else{echo 'pp.png';}
  ?>" alt="Profile Picture"><br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <hr>
  <input type="submit" value="Submit" name="submit">
</form>
</fieldset>
</div> 
<?php require 'Bar/Footer.php';?>
</body>
</html>