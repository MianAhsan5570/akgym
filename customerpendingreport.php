<?php
include_once "includes/header.php";
?>

<div class="panel panel-success">
	<div class="panel-heading" align="center"><h4>Pending Balance</h4></div>
	<div class="panel-body">
		<div class="table table-responsive">
		<button class="btn btn-danger print_hide pull pull-right" onclick="window.print();"><span class="glyphicon glyphicon-print"></span> Print All Report </button>
			<table class="table" id="myTable" >
				<thead>
				<tr>
					<th>SR.</th>
					<th>Gym Code</th>
					<th>Member Name</th>
					<th>Member Phone </th>
					<th>Admission Date</th>
					<th>Fee Expiry Date</th>
					<th>Last Paid</th>
					<th>Expired Days</th>
					


				</tr>
				</thead>
		<tbody>
		<?php 
				$today = date('Y-m-d');
		$x=1;		      
						      	$sql = "SELECT * FROM customers ORDER BY customer_name ASC";

										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											
						$v = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM vouchers WHERE customer_id = '".$row['customer_id']."' ORDER BY voucher_id ASC LIMIT 1"));
						$l =mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM vouchers WHERE customer_id = '".$row['customer_id']."' ORDER BY voucher_id DESC LIMIT 1"));
						$admissionDate = $v['voucher_date'];
											

										
					?>
					
					<tr>	
						<td><?=$x?></td>
						<td><?=$row['gym_code']?></td>
						<td><?php echo $row['customer_name']; ?></td>
						<td><?=$row['customer_phone']?></td>
						<td><?=@$admissionDate?></td>
						<td><?php echo $l['voucher_enddate']; ?></td>
						<td><?php echo $l['voucher_date']; ?></td>
						<td>
							<?php
							//echo $today;
								if($today > $l['voucher_enddate']){
									$datetime1 = strtotime($today);
									$datetime2 = strtotime($l['voucher_enddate']);

									$secs = $datetime2 - $datetime1;// == <seconds between the two times>
									$days = $secs / 86400;
									echo "<span class='label label-danger' style='font-size:20px'>".abs($days)."</span>";
								}
							?>
						</td>
						
					</tr>

					<?php					
$x++;
										} // while customer
										
						      	?>
						      	</tbody>
			</table>			      	
		</div><!--table-->				      	
	</div>
</div>












<?php
include_once "includes/footer.php";
?>
<script type="text/javascript">
	$('#myTable').dataTable({
		
    aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
    iDisplayLength: -1
});
</script>