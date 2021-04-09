<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<header>
	<div class="container-fluid">
    <nav class="navbar navbar-expand-sm navbar-light padding" style="background-color: #0dcaf0; padding: 10px 10px;">
      <div class="col-xl-6 col-lg-4 col-md-3 col-sm-2 col-12">
      	<img class="logo" style="width: 100px" src="Photos/Logo.png" alt="Logo"> 
      </div>

  <div class="col-xl-6 col-lg-8 col-md-9 col-sm-10 col-12">
    <div class="navbar-nav">
    <p class="nav-link"><?php echo "Logged In As Admin" ?></p>
    <p class="nav-link"><?php echo " || ".$_SESSION['user_name']." || "; ?></p>
    <a class="nav-link" href="Welcome.php">Home</a>
	<a class="nav-link" href="User Data.php">Details</a>	
	<a class="nav-link" href="Approve.php">Approval</a>
	<a class="nav-link" href="View Profile.php">Profile</a>
	<a class="nav-link" href="Logout.php">Logout</a>
    </div>
  </div>
</nav>
</div>
</header>

</body>
</html>