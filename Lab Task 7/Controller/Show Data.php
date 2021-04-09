<?php 
require 'Model/model.php';
$data=showData($_SESSION['id']);

$name = $data["Name"];
$id = $data["ID"];
$user_name = $data["User Name"];
$shift = $data["Shift"];
$email = $data["Email"];
$mobile = $data["Mobile"];
$address = $data["Address"];
$gender = $data["Gender"];
$dob = $data["Date Of Birth"];
?>