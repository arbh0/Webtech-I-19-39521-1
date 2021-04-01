<!DOCTYPE html>
<html>
<head>
</head>
<body>
	
<header>
<div class="left">
	<img class="logo" src="Photos/Logo.png" alt="Logo"> 
</div>	
<br><br>
<div class="right">
	<?php echo "Logged In As Admin || ".$_SESSION['user_name']." || "; ?>
	<a href="Welcome.php">Home</a>
	<a href="User Data.php">Details</a>	
	<a href="Approve.php">Approval</a>
	<a href="View Profile.php">Profile</a>
	<a href="Logout.php">Logout</a>
</div>
</header> 
<br><br>
<hr>

</body>
</html>