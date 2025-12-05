<?php 
	include '../php_action/core.php';
	$q = mysqli_query($dbc,"SELECT product.product_id, product.product_name, product.categories_id, categories.categories_id, categories.categories_name FROM product INNER JOIN categories ON categories.categories_id = product.categories_id");
	// $response = array();
	while($r = mysqli_fetch_assoc($q)){
		$response[] = $r;
	}
	echo json_encode(array('data' => $response));	
	exit();	
?>