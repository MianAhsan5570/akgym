<?php 	

require_once 'core.php';

 
$valid['success'] = array('success' => false, 'messages' => array());

$purchase_id=  $_GET['var'];


if($purchase_id) { 
	
	 $fetchThisOrder = mysqli_query($dbc,"SELECT * FROM purchase WHERE purchase_id = {$purchase_id}");

	 while($rowww = mysqli_fetch_array($fetchThisOrder)){

	  $delete_this = $rowww['transaction_id'];
	 } 
	 // if ($delete_this != '0') {

	 	
	 	 $sql_trans = "DELETE FROM transactions WHERE transaction_id = {$delete_this}";
	 	if(mysqli_query($dbc , $sql_trans)){  
	 	 	// echo "<scrript>console.log('abcde')<script>";
	 	 }
	
// }

	

	$fetch_order_item = mysqli_query($dbc,"SELECT * FROM purchase_item WHERE purchase_id = {$purchase_id}");

	
	while($row = mysqli_fetch_array($fetch_order_item)){

				$product_id =$row['product_id'];
				$quantity = $row['quantity'];
		 $fetchpreviousProduct = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM product WHERE product_id = {$product_id}"));		$previousinstock=$fetchpreviousProduct['quantity'];
		 			$newStock = $previousinstock - $quantity;


			 $update_stock = mysqli_query($dbc,"UPDATE product SET quantity = '$newStock' WHERE product_id = {$product_id}");	


	}
	if ($update_stock){
		

 $sql = "DELETE FROM purchase WHERE purchase_id = {$purchase_id}";

 $orderItem = "DELETE FROM purchase_item  WHERE  purchase_id = {$purchase_id}";

 if($connect->query($sql) === TRUE && $connect->query($orderItem) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
}
 
 $connect->close();

 echo '<script>alert("Purchase Deleted......!")</script>';
 echo header('location:../show_purchase.php');

 echo json_encode($valid);
 
} // /if $_POST