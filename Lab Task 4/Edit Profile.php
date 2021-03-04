<!DOCTYPE html>  
<html>  
<head>  
<title>Edit profile</title> 
</head>  
<body>
<?php 

session_start();

if (isset($_SESSION['user_name']))
  {
    require 'Top1.php';
  }
else
{
  header("location:Login.php");
}

?> 
<style>
.error {color: #FF0000;}
</style>

<?php
$name = $email = $gender = $dob = '';
$nameErr = $emailErr = $genderErr = $dobErr = '';
$massage = '';  
$error = '';
$flag=1;  
if($_SERVER["REQUEST_METHOD"] == "POST")  
{  
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
    $flag=0;
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z0-9-' _.-]*$/",$name) || str_word_count($name)<2 )
    {
      $nameErr = "Only letters, white space, period, dash allowed and minimum two words";
      $name="";
      $flag=0;
    }
  }

      
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
    $flag=0;
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
      $email="";    
      $flag=0;
    }
  }
  if(empty($_POST["gender"]))  
  {  
    $genderErr = "Select Gender"; 
    $flag=0; 
  }
  else 
  {
    $gender = test_input($_POST["gender"]);
  } 

  if(empty($_POST["dob"]))  
  {  
    $dobErr = "Enter Date of Birth";
    $flag=0;  
  }
  else 
  {
    $dob = test_input($_POST["dob"]);
  }

  if ($flag==1) 
  {
    if(isset($_POST["submit"]))  
    {
      if(file_exists('data.json'))  
      {  
        $current_data = file_get_contents('Data.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
        'name'            =>     $_POST['name'],
        'email'           =>     $_POST['email'],
        'gender'          =>     $_POST["gender"],  
        'dob'             =>     $_POST["dob"]);  
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('Data.json', $final_data))  
        {  
          $message = "Updated Successfully";  
        } 
      } 
      else  
      {  
        $error = 'JSON File not exits';  
      }
    }  
  }    
} 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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

<fieldset style="height:230px;width: 600px;margin: auto; margin-top: 50px;">
<legend><b>EDIT PROFILE</b></legend>                 
  <form method="post">
    <br>
  <label for="name">Name</label>
  <label style="margin-left: 81px;">: <input type="text" name="name" size="30" value="<?php echo $name ?>"></input></label>
  <span class="error"> <?php echo $nameErr;?></span><hr>

  <label for="email">Email</label>
  <label style="margin-left: 81px;">: <input type="email" name="email" size="30" value="<?php echo $email ?>"></input><b> i </b></label>
  <span class="error"> <?php echo $emailErr;?></span><hr>


<label for="gender">Gender</label>
<label style="margin-left: 73px;">: 
  <input type="radio" id="male" name="gender" value="<?php echo $gender ?>">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="<?php echo $gender ?>">
  <label for="female">Female</label> 
  <input type="radio" id="other" name="gender" value="<?php echo $gender ?>">
  <label for="other">Other </label>
</label>
  <span class="error"> <?php echo $genderErr;?></span>
  <hr>

<label for="dob">Date of Birthday</label>
<label style="margin-left: 20px;">: 
  <input type="number" name="dob" style="width: 40px;"> /
  <input type="number" name="dob" style="width: 40px;"> /
  <input type="number" name="dob" style="width: 60px;" value="<?php echo $dob ?>"> <i>(dd/mm/yyyy)</i></label>
  <span class="error"> <?php echo $dobErr;?></span><hr>

<input type="submit" name="submit" value="Submit">
</form>  
</fieldset>
<?php
echo $error;
echo "<br>";
echo $massage;
echo "<br>";
?>

<?php require 'Footer.php';?>
</body>  
</html>  