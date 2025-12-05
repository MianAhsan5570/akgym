 <button onclick="myFunction()" class="print_hide">Print </button>

<script>
function myFunction() {
    window.print();
}
</script>
 <center>
<?php
	require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName_id = $orderData[1];
	$fetchCustomer =mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id='$clientName_id'"));
	 $client_name = $fetchCustomer["customer_name"];
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
 <?php
   $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";

                    $result = $connect->query($sql);

                    while($row = $result->fetch_array()) {
                     
                   // while?>
	
    <?php
    $logo = $row['logo'];
     $name= $row['name'];
   $company_phone= $row['company_phone'];
	$personal_phone=$row['personal_phone'];
	$address=$row['address'];

 } 
    ?>
 <table border="1" cellspacing="1" cellpadding="2" width="100%" >
	<thead>
		<tr >
			<th>
				<img src="img/uploads/<?= $logo; ?>" class="img-responsive" style="width: 100px; height: 80px;">
			</th>
			<th colspan="5">
				<div align="center">
				
				
				<p  style="font-size:20px;margin-top: 10px;"> <?php echo $name  ?></p>
				<p style="font-size:15px; "><strong>Company No:</strong> <?php echo $company_phone  ?></p>
				<p style="font-size:15px; margin-top: -10px;"><strong>Personal No:</strong> <?php echo $personal_phone ?></p>
				<p style="font-size:15px; margin-top: -10px;"><strong>Address:</strong> <?php echo $address ?></p>
				

				</div>


					
			</th>
			

			
		</tr>	
		<tr >
			<th colspan="5">

			<div align="center">
				Bill No.: <strong><?php echo $orderId ; ?> </strong><br />
				Order Date : <strong><?php echo $orderDate ; ?> </strong><br />
				Account Title : <strong> <?php echo $client_name ; ?></strong><br />
				Customer :<strong> <?php echo $clientContact ; ?></strong>
				

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
<table border="1px" width="100%;" cellpadding="1"  ;">

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
				<td style="font-size:15px;"><?php echo $row[4]; ?> (<?=$fetchCategory['categories_name']?>)</td>
				<th><?php echo $row[1]; ?></th>
				<th><?php echo $row[2]; ?></th>
				<th><?php echo $row[3] ; ?></th>
			
		<?php	
		$x++;
		} // /while
?>
		</tr>
</tbody>


</table>
		
		<table style="float: right; font-size:15px;" border="1px ">
		<tr >
		<?php
		$temp =0;
		$q=mysqli_query($dbc,"SELECT * FROM transactions WHERE customer_id='$clientName_id'");

										

										

										while($row = mysqli_fetch_assoc($q)){
			@$total_debit += $row['debit'];
			@$total_credit+= $row['credit'];
			@$remaing_balance = $row['balance'];
				$temp=($row['credit']-$row['debit'])+$temp; 
				}

										
									
			?>
			<?php
if ($clientName_id == '1' ) {
}else{	# code...

?>

			<!-- <td>Due Amount</td>
			<td><?php echo @($temp- $customer_credit); ?></td>		 -->	
		</tr>

		<tr>
			<td>Now Paid Amount </td>
			<td><?php echo @$paid  ?></td>			
		</tr>

		
		

		<tr>
			<td>Remaining Balance</td>
			<td><h4 style="font-size:20px;"><?php echo  @$temp; ?></h4></td>			
		</tr>
		<?php
}
		?> 
			

		
		

		
	</div>	
</table>
<center>
	Software developed by : Sam'z Creation (+92-345-7573667)
</center>
		

		


<?php
}
?>

</center>
<style type="text/css">
	p{
		margin-top:-10px;
		font-size:10px;
	}
</style>