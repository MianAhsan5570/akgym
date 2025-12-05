<?php 	

require_once 'core.php';

 
$valid['success'] = array('success' => false, 'messages' => array());

$orderId = $_POST['orderId'];

if($orderId) { 
	
	 $fetchThisOrder = mysqli_query($dbc,"SELECT * FROM orders WHERE order_id = {$orderId}");

	 while($rowww = mysqli_fetch_array($fetchThisOrder)){

	  $delete_this = $rowww['transaction_id'];
	 } 
	 // if ($delete_this != '0') {

	 	
	 	 $sql_trans = "DELETE FROM transactions WHERE transaction_id = {$delete_this}";
	 	if(mysqli_query($dbc , $sql_trans)){  
	 	 	// echo "<scrript>console.log('abcde')<script>";
	 	 }
	
// }

	

	$fetch_order_item = mysqli_query($dbc,"SELECT * FROM order_item WHERE order_id = {$orderId}");

	
	while($row = mysqli_fetch_array($fetch_order_item)){

				$product_id =$row['product_id'];
				$quantity = $row['quantity'];
		 $fetchpreviousProduct = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM product WHERE product_id = {$product_id}"));		$previousinstock=$fetchpreviousProduct['quantity'];
		 			$newStock = $previousinstock + $quantity;


			 $update_stock = mysqli_query($dbc,"UPDATE product SET quantity = '$newStock' WHERE product_id = {$product_id}");	


	}
	if ($update_stock){
		

 $sql = "DELETE FROM orders WHERE order_id = {$orderId}";

 $orderItem = "DELETE FROM order_item  WHERE  order_id = {$orderId}";

 if($connect->query($sql) === TRUE && $connect->query($orderItem) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
}
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST