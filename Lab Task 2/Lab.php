<!DOCTYPE html>
<html>
<head>
  <title>lab Task 2</title>
<style> 
  .requires {color: #FF0000;}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
</head>
<body>
<?php
$nameArr = $emailArr = $genderArr = $dobArr = $degreeArr = $blood_groupArr = "";
$name = $email = $gender = $birthday = $blood_group = $count = "";
$degree = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) 
  {
    $nameArr = "Name is required";
  } 
  else 
  {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' .]*$/",$name) || str_word_count($name)<2 )
    {
      $nameArr = "*Can Not Be Empty, Contains At Least Two Words, Period & Dash Allowed";
      $name="";
    }
  }

  
  if (empty($_POST["email"])) 
  {
    $emailArr = "Email is required!";
  } 
  else 
  {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailArr = "Invalid Email Address";
      $email="";
    }
  }
    

  if (empty($_POST["birthday"])) 
  {
    $dobErr = "Date Of Birth Is Required";
  } 
  else 
  {
    $birthday = test_input($_POST["birthday"]);
  }


  if (empty($_POST["gender"])) 
  {
    $genderErr = "Gender Is Required";
  } 
  else 
  {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($_POST["degree"]) ) 
  {
    $degreeErr = "Degree Is Required";
  } 
  else 
  {
    foreach($_POST['degree'] as $selected_degree)
  {
    $count++;
  }
    if ($count<2)
    {
      $degreeErr = "Atleast Two Degrees Must Be Selected";
    }
    
  }
    

    if (empty($_POST["blood_group"])) 
  {
    $blood_groupErr = "Blood Group Is Required";
  } 
  else 
  {
    $blood_group = test_input($_POST["blood_group"]);
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


  <h2>lab Task 2</h2>
  <p><span class="requires">* required</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <table style="width:50%;">
  <tr>
    <td>
      <h2 style="margin-left: 25px;">NAME</h2>
      <input type="text" style="margin-left: 25px;" name="name" value="<?php echo $name;?>">
      <span class="requires">* <?php echo $nameArr;?></span><br>
      <hr style="border: 1px solid black;margin-left: 25px;margin-right: 350px">
      <input type="submit" style="margin-left: 25px;margin-bottom: 20px;" name="submit" value="Submit">
    </td>
  </tr>
  </table>
  <table style="width:50%;margin-top: 20px;margin-bottom: 10px;">
  <tr>
    <td>
      <h2 style="margin-left: 25px;">EMAIL</h2>
      <input type="text" style="margin-left: 25px;" name="email" value="<?php echo $email;?>">
      <span class="requires"><b> i </b><?php echo $emailArr;?></span><br>
      <hr style="border: 1px solid black;margin-left: 25px;margin-right: 350px">
      <input type="submit" style="margin-left: 25px;margin-bottom: 20px;" name="submit" value="Submit">
    </td>
  </tr>
  </table>
  <table style="width:50%;margin-top: 20px;margin-bottom: 10px;">
  <tr>
    <td>
      <h2 style="margin-left: 25px;">DATE OF BIRTH</h2>
      <input type="date" style="margin-left: 25px;" name="birthday" value="<?php echo $email;?>">
      <span class="requires">*<?php echo $dobArr;?></span><br>
      <hr style="border: 1px solid black;margin-left: 25px;margin-right: 350px">
      <input type="submit" style="margin-left: 25px;margin-bottom: 20px;" name="submit" value="Submit">
    </td>
  </tr>
  </table>
  <table style="width:50%;margin-top: 20px;margin-bottom: 10px;">
  <tr>
    <td>
      <h2 style="margin-left: 25px;">GENDER</h2>
      <input type="radio" style="margin-left: 25px;" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
      <input type="radio" style="margin-left: 25px;" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
      <input type="radio" style="margin-left: 25px;" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
      <span class="requires">* <?php echo $genderArr;?></span><br>
      <hr style="border: 1px solid black;margin-left: 25px;margin-right: 350px">
      <input type="submit" style="margin-left: 25px;margin-bottom: 20px;" name="submit" value="Submit">
    </td>
  </tr>
  </table>
  <table style="width:50%;margin-top: 20px;margin-bottom: 10px;">
  <tr>
    <td>
      <h2 style="margin-left: 25px;">DEGREE</h2>
      <input type="checkbox" style="margin-left: 25px;" name="degree[]" <?php if (isset($degree) && $degree=="ssc") echo "checked";?> value="ssc">SSC
      <input type="checkbox" style="margin-left: 25px;" name="degree[]" <?php if (isset($degree) && $degree=="hsc") echo "checked";?> value="hsc">HSC
      <input type="checkbox" style="margin-left: 25px;" name="degree[]" <?php if (isset($degree) && $degree=="bsc") echo "checked";?> value="bsc">BSc
      <input type="checkbox" style="margin-left: 25px;" name="degree[]" <?php if (isset($degree) && $degree=="msc") echo "checked";?> value="msc">MSc
      <span class="requires">* <?php echo $degreeArr;?></span><br>
      <hr style="border: 1px solid black;margin-left: 25px;margin-right: 350px">
      <input type="submit" style="margin-left: 25px;margin-bottom: 20px;" name="submit" value="Submit">
    </td>
  </tr>
  </table>
  <table style="width:50%;margin-top: 20px;margin-bottom: 40px">
  <tr>
    <td>
      <h2 style="margin-left: 25px;">BLOOD GROUP</h2>
      <select style="margin-left: 25px;" name="blood_group">
        <option></option>
        <option style="margin-left: 25px;" name="blood_group" <?php if (isset($dblood_group) && $blood_group=="a+") echo "checked";?> value="a+">A+</option>
        <option style="margin-left: 25px;" name="blood_group" <?php if (isset($dblood_group) && $blood_group=="a-") echo "checked";?> value="a-">A-</option>
        <option style="margin-left: 25px;" name="blood_group" <?php if (isset($dblood_group) && $blood_group=="b+") echo "checked";?> value="b+">B+</option>
        <option style="margin-left: 25px;" name="blood_group" <?php if (isset($dblood_group) && $blood_group=="b-") echo "checked";?> value="b-">B-</option>
        <option style="margin-left: 25px;" name="blood_group" <?php if (isset($dblood_group) && $blood_group=="o+") echo "checked";?> value="o+">O+</option>
        <option style="margin-left: 25px;" name="blood_group" <?php if (isset($dblood_group) && $blood_group=="o-") echo "checked";?> value="o-">O-</option>
        <option style="margin-left: 25px;" name="blood_group" <?php if (isset($dblood_group) && $blood_group=="ab+") echo "checked";?> value="ab+">AB+</option>
        <option style="margin-left: 25px;" name="blood_group" <?php if (isset($dblood_group) && $blood_group=="ab-") echo "checked";?> value="ab-">AB-</option>
      </select>
      <span class="requires">* <?php echo $blood_groupArr;?></span><br>
      <hr style="border: 1px solid black;margin-left: 25px;margin-right: 350px">
      <input type="submit" style="margin-left: 25px;margin-bottom: 20px;" name="submit" value="Submit">
    </td>
  </tr>
  </table>
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $birthday;
echo "<br>";
echo $gender;
echo "<br>";
foreach($_POST["degree"] as $selected_degree)
  {
    if($count>1)
    {
      echo $selected_degree. " ";
    }
  }
echo "<br>";
echo $blood_group;
?>
</body>
</html>