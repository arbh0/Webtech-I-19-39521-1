<?php

$user_nameErr = $passwordErr = "";
$user_name = $password = "";
if (isset($_POST['user_name'])) 
{
  require 'Controller/Login Data.php';
  if ($_POST['user_name']==$user_name && (password_verify($_POST['password'], $password) || $_POST['password']==$password)) 
  {
    $_SESSION['user_name'] = $user_name;
    $_SESSION['id'] = $id;
    $_SESSION['image'] = $image;
    if(isset($_POST['rememberme']))
    {
    $time = time();
    setcookie('user_name', $user_name, $time+86400);
    setcookie('password', $_POST['password'], $time+86400);
    }
    header("location:Welcome.php");
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $flag=1;
      if (empty($_POST["user_name"]))
      {
        $user_nameErr = "*Insert Username";
        $flag=0;
      } else {
        $user_name = test_input($_POST["user_name"]);
        if (!preg_match("/^[a-zA-Z-._]*$/",$user_name))
        {
          $user_nameErr = "*Invalid Input"; //Only alpha numeric characters, period, dash or underscore allowed
          $flag=0;
        }
        else if (strlen($user_name)<2)
        {
          $user_nameErr = "*Minimum Two Characters";
          $user_name ="";
          $flag=0;
        }
            else if($_POST['user_name']!=$user_name )
            {
                $user_nameErr="*User Name Invalid";
            }
      }
      if (empty($_POST["password"]))
      {
        $passwordErr = "*Insert Password";
        $flag=0;
      }
      else {
        $password = test_input($_POST["password"]);
        if (strlen($password)<8)
        {
          $passwordErr = "*Minimum 8 Characters";
          $password ="";
          $flag=0;
        }
        else if (!preg_match("/[@,#,$,%]/",$password))
        {
          $passwordErr = "*Minimum One Special Character";
          $password ="";
          $flag=0;
        }
            else if($_POST['password']!=$password)
            {
                $passwordErr="*Password Invalid";
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