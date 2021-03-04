<!DOCTYPE html>  
<html>  
<head>  
<title>Registration</title> 
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
  require 'Top.php';
}

?> 
<style>
.error {color: #FF0000;}
</style>

<?php
$name = $email = $user_name = $password = $confirm_password = $gender = $dob = '';
$nameErr = $emailErr = $user_nameErr = $passwordErr = $confirm_passwordErr = $genderErr = $dobErr = '';
$massage = '';  
$error = '';
$flag=1;  
if($_SERVER["REQUEST_METHOD"] == "POST")  
{  
  if (empty($_POST["name"])) 
  {
    $nameErr = "*Insert Name";
    $flag=0;
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z0-9-' _.-]*$/",$name) || str_word_count($name)<2 )
    {
      $nameErr = "*Invalid Input";
      $name="";
      $flag=0;
    }
  }

      
  if (empty($_POST["email"])) 
  {
    $emailErr = "*Input Email";
    $flag=0;
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "*Invalid Email Format";
      $email="";    
      $flag=0;
    }
  }

  if(empty($_POST["user_name"]))  
  {  
    $user_nameErr = "*Insert Username";
    $flag=0;  
  } 
  else 
  {
    $user_name = test_input($_POST["user_name"]);
    if (!preg_match("/^[a-zA-Z0-9-' _.-]*$/",$user_name) || str_word_count($user_name)<2 )
    {
      $user_nameErr = "*Invalid Input";
      $user_name="";
      $flag=0;
    }
  }


  if (empty($_POST["password"])) 
  {
    $passwordErr = "*Insert Password";
    $flag=0;
  } 
  else 
  {
    $password = test_input($_POST["password"]);
    if (strlen($password) <= 8)
    {
      $passwordErr = "*Minimum 8 Characters";
      $password="";
      $flag=0;
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) 
    {
      $passwordErr = "*Minimum One Special Character";
      $password ="";
      $flag=0;
    }
  }

  if (empty($_POST["confirm_password"])) 
  {
    $confirm_passwordErr = "*Retype The Password";
    $flag=0;
  } 
  else 
  {
    $confirm_password = test_input($_POST["confirm_password"]);
    if($confirm_password!=$password)
    {
      $confirm_passwordErr = "*Password Dosen't Match";
      $confirm_password="";
      $flag=0;
    }
  }

  if(empty($_POST["gender"]))  
  {  
    $genderErr = "*Select Gender"; 
    $flag=0; 
  }
  else 
  {
    $gender = test_input($_POST["gender"]);
  } 

  if(empty($_POST["dob"]))  
  {  
    $dobErr = "*Enter Date of Birth";
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
        'user_name'       =>     $_POST['user_name'],
        'password'        =>     $_POST['password'],
        'gender'          =>     $_POST["gender"],  
        'dob'             =>     $_POST["dob"]);  
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('Data.json', $final_data))  
        {  
          $massage = "Submitted Successfully";  
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
?> 

<fieldset style="width: 650px; margin: auto; margin-top: 50px;">
<legend><b>REGISTRATION</b></legend>                 
  <form method="post"> 
  <label for=name">Name</label>
  <label style="margin-left: 81px;">: <input type="text" name="name" size="30"></input></label>
  <span class="error"> <?php echo $nameErr;?></span><hr>

  <label for="email">Email</label>
  <label style="margin-left: 81px;">: <input type="email" name="email" size="30"></input><b> i </b></label>
  <span class="error"> <?php echo $emailErr;?></span><hr>

  <label for="user_name">User Name</label>
  <label style="margin-left: 47px;">: <input type="text" name="user_name" size="30"></input></label>
  <span class="error"> <?php echo $user_nameErr;?></span><hr>

  <label for="password">Password</label>
  <label style="margin-left: 58px;">: <input type="password" name="password" size="30"></input></label>
  <span class="error"> <?php echo $passwordErr;?></span><hr>

  <label for="confirm_password">Confirm Password</label>
  <label">: <input type="password" name="confirm_password" size="30"></input></label>
  <span class="error"> <?php echo $confirm_passwordErr;?></span><hr>

<fieldset style="width: 600px">
<legend><b>Gender</b></legend>
  <input type="radio" id="male" name="gender" value="male">
  <label for="male">Male</label> 
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label> 
  <input type="radio" id="other" name="gender" value="other">
  <label for="other">Other </label>  
  <span class="error"> <?php echo $genderErr;?></span>
 </fieldset><hr>

<fieldset style="width: 600px">
  <legend><b>Date of Birthday</b></legend>
  <input type="number" name="dob" style="width: 40px;"> /
  <input type="number" name="dob" style="width: 40px;"> /
  <input type="number" name="dob" style="width: 60px;"> <i>(dd/mm/yyyy)</i>
  <span class="error"> <?php echo $dobErr;?></span>
</fieldset><hr>

<input type="submit" name="submit" value="Submit">
<input type="reset" name="reset" value="Reset">
<?php
echo $error;
echo "<br>";
echo $massage; 
echo "<br>";
?>
</form>  
</fieldset>
<?php require 'Footer.php';?>
</body>  
</html> 