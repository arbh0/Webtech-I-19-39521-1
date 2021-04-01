<?php 

require 'Model/model.php';

$data=searchData($_POST['user_name']);
if($data!= null)
{
	$user_name = $data["User Name"];
  	$password = $data["Password"];
  	$id = $data["ID"];
}
?>