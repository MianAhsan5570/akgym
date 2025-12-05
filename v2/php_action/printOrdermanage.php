<center>
<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];
//$orderId = '13';

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2]; 
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5]; 
$discount = $orderData[6];
$grandTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];


$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
	INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);
if ( mysqli_num_rows($orderItemResult) > 0) {

 ?>
 
 <table border="1" cellspacing="0" cellpadding="2" width="100%" style="font-size:10px;">
	<thead>
		<tr >
			<th colspan="5">
				<div align="center">
				<img src="img/logo.png" style="width: 100%; height: 70px;">
				<h2></h2>
				
				<p style="font-size: 10px; margin-top: -10px;"><strong>Cell No:</strong> 0300-7225467</p>
				

				</div>


					
			</th>
			
		</tr>	
		<tr >
			<th colspan="5">

			<div align="center">
				Bill No.: <strong><?php echo $orderId ; ?> </strong><br />
				Order Date : <strong><?php echo $orderDate ; ?> </strong><br />
				Client Name : <strong> <?php echo $clientName ; ?></strong><br />
				Contact :<strong> <?php echo $clientContact ; ?></strong>
				

			</div>

			</th>
			</tr>

		<tr >
			<th colspan="5">

			<center>
				
			</center>		
			</th>
				
		</tr>		
	</thead>
</table>
<table border="0" width="100%;" cellpadding="1" style="border:1px solid black;font-size:10px;border-top-style:1px solid black;border-bottom-style:1px solid black ;">

	<tbody>
		<tr>
			<th>S.no</th>
			<th>Product</th>
			<th>Rate</th>
			<th>QTY</th>
			
			<th>Total</th>
		</tr>
		<?php
		$x = 1;	
		while($row = $orderItemResult->fetch_array()) {
				$product_id = $row['product_id'];
				$fetchProduct = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM product WHERE product_id='$product_id'"));
				$fetchCategory = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM categories WHERE categories_id='$fetchProduct[categories_id]'"));
			
		?>				
			 <tr>
				<th><?php echo $x ?></th>
				<td style="font-size:12px;"><?php echo $row[4]; ?> (<?=$fetchCategory['categories_name']?>)</td>
				<th><?php echo $row[1]; ?></th>
				<th><?php echo $row[2]; ?></th>
				
				<th><?php echo $row[3];?></th>
			
		<?php	
		$x++;
		} // /while
?>
		</tr>
</tbody>


</table>
		
		<table style="float: right; font-size:10px;" border="1px ">
		<tr > 
			<td>Sub Amount</td>
			<td><?php echo $subTotal; ?></td>			
		</tr>

		<tr>
			<td>Shipping Charges</td>
			<td><?php echo $vat; ?></td>			
		</tr>

		

		

		<tr>
			<td>Net Totel</td>
			<td><h4 style="font-size:20px;"><?php echo round($grandTotal) ; ?></h4></td>			
		</tr>
	</div>	
</table>
		

		


<?php
}
?>
<p>Software Developed By M.Sami (03457573667)</p>
</center>
<style type="text/css">
	p{
		margin-top:100px;
		font-size:10px;
	}
</style>