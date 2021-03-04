<!DOCTYPE html>  
<html>  
<head>  
<title>View Profile</title>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto;
}
</style> 
</head>  
<body>
<?php 

session_start();

if (isset($_SESSION['user_name'])){require 'Top1.php';}
else
{
  header("location:Welcome.php");
} 

$data = file_get_contents("Data.json");
$data = json_decode($data, true);
foreach($data as $row)  
{  
  $name = $row["name"];
  $email = $row["email"];
  $gender = $row["gender"];
  $dob = $row["dob"];
}
?> 
<div style="margin-left: 35%; margin-top: 10%;">
<fieldset class="grid-container," style="width: 450px">
<legend>PROFILE</legend>

<div style="float: left">
  <p>Name                  :   <?php echo  $name ?></p><hr>
  <p>Email                 :   <?php echo $email ?></p><hr>
  <p>Gender                :   <?php echo $gender ?></p><hr>
  <p>Date of Birthday      :   <?php echo $dob ?></p>
</div> 

<div style="float: right;width: 50%">
  <img style="height: 170px; width: 140px;margin-top: 20px;" src="pp.png" alt="Profile Picture"><br>
  <a style="margin-left: 50px;" href="Change Profile Picture.php" >Change</a>
</div>


<br><br><br><br><br><br><br><br><br><br><br><hr>
<a href="Edit Profile.php">Edit Profile</a>
</fieldset> 
</div>

<?php require 'Footer.php';?>
</body>  
</html> 