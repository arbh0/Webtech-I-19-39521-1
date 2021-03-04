<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
</head>
<body>
 <?php 

session_start();

if (isset($_SESSION['user_name'])){ require 'Top1.php';}
else
  header("location:Login.php");
 ?>
<style>
.error {color: #FF0000;}
.box {
      border: 2px solid black;
    }
    .info {
      margin-left: 30px;
      margin-top: 35px;
    }
</style>
<?php
  $cpasswordErr = $npasswordErr = $rpasswordErr = "";
  $cpassword = $npassword = $rpassword = "";
  $pass="aa@123456";
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $flag=1;
      if (empty($_POST["cpassword"]))
      {
        $cpasswordErr = "*Insert Password";
        $flag=0;
      }
      else {
        $cpassword = test_input($_POST["cpassword"]);
        if (strlen($cpassword)<8)
        {
          $cpasswordErr = "*Minimum 8 Characters";
          $cpassword ="";
          $flag=0;
        }
        else if (!preg_match("/[@,#,$,%]/",$cpassword))
        {
          $cpasswordErr = "*Minimum One Special Character";
          $cpassword ="";
          $flag=0;
        }
        else if($cpassword!=$pass)
        {
          $cpasswordErr = "*Password Dosen't Match";
          $cpassword="";
        }
      }
      if (empty($_POST["npassword"]))
        {
          $npasswordErr = "*Retype The Current Password";
          $flag=0;
        } else {
          $npassword = test_input($_POST["npassword"]);
          if (strcmp($cpassword, $npassword) == 0) {
            $npasswordErr = "*Current & New Password Same";
            $npassword ="";
            $flag=0;
          }
          else if (strlen($npassword)<8) {
            $npasswordErr = "*Minimum 8 Characters";
            $npassword ="";
            $flag=0;
            }
          else if (!preg_match("/[@,#,$,%]/",$npassword))
          {
          $npasswordErr = "*Minimum One Special Character";
          $npassword ="";
          $flag=0;
          }

        }
      if (empty($_POST["rpassword"]))
        {
          $rpasswordErr = "*Retype The Current Password";
          $flag=0;
        } else {
          $rpassword = test_input($_POST["rpassword"]);
          if (strcmp($npassword, $rpassword) == 1) {
            $rpasswordErr = "*Password Dosen't Match";
            $rpassword ="";
            $flag=0;
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div>
  <div class= "box"; style="margin-left: 150px;margin-right: 150px; margin-top:100px; margin-bottom: 20px; height: 200px; left; width: 620px; margin: auto; ttom: 100px;margin-top: 100px;">
    <table class="info">
    <tr>
      <td>
        Current Password
      </td>
      <td>
        :
        <input type="password" id="cpassword" name="cpassword" size="25">
        <span style="color: #FF0000;"><?php echo $cpasswordErr;?></span>
      </td>
    </tr>
    <tr>
      <td style="color: green;">
        New Password
      </td>
      <td>
        :
        <input type="password" id="npassword" name="npassword" size="25">
        <span style="color: #FF0000;"><?php echo $npasswordErr;?></span>
      </td>
    </tr>
    <tr>
      <td style="color: red;">
        Retype New Password
      </td>
      <td>
        :
        <input type="password" id="rpassword" name="rpassword" size="25">
        <span style="color: #FF0000;"><?php echo $rpasswordErr;?></span>
      </td>
    </tr>
    </table>
    <hr style="border: 0.25px solid black;margin-left: 20px;margin-right: 20px">
    <br>
    <input type="submit" style="margin-left: 30px; margin-bottom: 20px;" name="submit" value="Submit">
  </div>
  <div style="height: 35px;
    width: 170px;
    background-color: #fffefe;
    color: black;

    transform: translate(495px, -235px); ">
    <p style="text-align: center;padding-top: 7px;"><b>CHANGE PASSWORD</b></p>
  
  </div>
  </div>
</form>
<?php require 'Footer.php';?>
</body>
</html>