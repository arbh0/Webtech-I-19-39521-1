<?php
if (isset($_POST['updateProductcontroller'])) 
{
	$data['name'] = $_POST['name'];
	$data['buyingPrice'] = $_POST['buyingPrice'];
	$data['sellingPrice'] = $_POST['sellingPrice'];
	if (isset($_POST['display'])) 
	{
		$data['display'] = "YES";
	}
	else
		$data['display'] = "NO";

  if (updateProduct($_GET['id'], $data)) 
  {
  	echo 'Successfully updated!!';
  	header('Location: Display Product.php');
  }
}
?>