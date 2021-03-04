<!DOCTYPE html>
<html>
<head>
	<title>
		Log In
	</title>
	<style>
		.box {
			border: 2px solid black;
		}
		.info {
			margin-left: 30px;
			margin-top: 40px;
		}
	</style>
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

$username="Rezaul Karim";
$userpassword="aa@123456";

if (isset($_POST['user_name']))
{
    if ($_POST['user_name']==$username && $_POST['password']==$userpassword)
    {
        $_SESSION['user_name'] = $username;
        header("location:Welcome.php");
    }
    else{
    }
} 
    
    $user_nameErr = $passwordErr = "" ;
    $password = $user_name =  "";
    
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
            else if($_POST['user_name']!=$username )
            {
                $usser_nameErr="*User Name Invalid";
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
            else if($_POST['password']!=$userpassword)
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div>
	<div class= "box"; style="margin-left: 150px;margin-right: 150px; margin-top:100px; margin-bottom: 20px; height: 220px; left; width: 600px; margin: auto; bottom: 100px;margin-top: 100px;">
		<table class="info">
		<tr>
			<td>
				User Name
			</td>
			<td>
				 :
				<input type="text" id="name" placeholder="Enter User Name" name="user_name" size="30">
				<span style="color: #FF0000;"><?php echo $user_nameErr;?></span>
			</td>
		</tr>
		<tr>
			<td>
				Password
			</td>
			<td>
				 :
				<input type="password" id="password" placeholder="Enter Password" name="password" size="30">
				<span style="color: #FF0000;"><?php echo $passwordErr;?></span>
			</td>
		</tr>
	</table>
	<br>
	<hr style="border: 0.25px solid black;margin-left: 20px;margin-right: 20px">
	<input style="margin-left: 30px;" type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
	<label for="remember-me">Remember me</label><br><br>
	<input type="submit" style="margin-left: 30px; margin-bottom: 20px;" name="submit" value="Submit">
	<a href="Forgot Password.php">Forgot Password?</a>
	</div>
	<div style="height: 35px;
    width: 60px;
    background-color: #fffefe;
    color: black;

    transform: translate(420px, -255px); ">
		<p style="text-align: center;padding-top: 7px;"><b>LOGIN</b></p>
	
	</div>
	</div>
</form>
<?php require 'Footer.php';?>
</body>
</html>