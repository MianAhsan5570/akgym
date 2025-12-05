<?php include_once "includes/header.php";
?>
<form action="" method="post" accept-charset="utf-8">
	
	

<div class="panel panel-info">
	<div class="panel-heading">General Ledger</div>
	<div class="panel-body">
		<form action="" method="post" class="form-inline print_hide" >
			<div class="form-group col-sm-3 print_hide">
				<label for="">Customer Account</label>
				<select class="form-control" id="clientName" name="customer_id" autofocus="true">
		      	<option value="">~~SELECT~~</option>
		      	<?php 
		      	$sql = "SELECT * FROM customers WHERE customer_active = 1";
						$result = $connect->query($sql);

						while($row = $result->fetch_array()) {
							echo "<option value='".$row[0]."'>".$row[1]."</option>";
						} // while
						
		      	?>
		      </select>	
			</div><!-- group -->

			<div class="form-group col-sm-3 print_hide">
				<label for="">From</label>
				<input type="text" class="form-control" autocomplete="off" name="from_date" id="from" placeholder="From Date">
			</div><!-- group -->
			<div class="form-group col-sm-3 print_hide">
				<label for="">To</label>
				<input type="text" class="form-control" autocomplete="off" name="to_date" id="to" placeholder="To Date">
			</div><!-- group -->
			<div class="form-group col-sm-3 print_hide">
			<label for="">Click To Search</label><br />
				<button class="btn btn-success" name="genealledger" type="submit"><span class="glyphicon glyphicon-search">_</span>Search</button>
			</div><!-- group -->
			
		</form>
	</div>
</form>
<button class="btn btn-info print_hide pull pull-right" onclick="window.print();"><span class="glyphicon glyphicon-print"></span> Print Report</button>
	<?php 
		if (isset($_POST['genealledger'])) :
			$customer = $_POST['customer_id'];
?>
	<table width="100%" border="2px" align="center" class="table table-hover ">
		<thead>
			<tr>
				<th>Transaction #</th>
				<th>Date</th>
				<th>Remarks</th>
				<th>Debit</th>
				<th>Credit</th>
				<th>Balance</th>
				<!-- <th>Test</th> -->
			</tr>
		</thead>
		<tbody>
			<?php
			
			 $customer = $_POST['customer_id'];
			 $f_date=$_REQUEST['from_date'];
			  $t_date = $_REQUEST['to_date'];
			//echo  DateFormat($f_date , '%Y-%m-%d');
			 ?>
			 <center>
			 <?php 
			 $fetchCustomer = fetchRecord($dbc,"customers","customer_id",$customer);
			//$fetchCustomer = fetchRecord($dbc ,"SELECT * FROM customer WHERE customer_id =  '$customer' ");
			 ?>
			 <h4>Client Name: <label class="label label-success"><?= $fetchCustomer['customer_name'] ;?></label></h4>
			 <h4>From Date: <label class="label label-danger"><?= $f_date ;?></label> </h4>
			 <h4>To Date: <label class="label label-danger"><?= $t_date ;?></label> </h4>
			 </center>
<?php
if($f_date > 0 AND $t_date > 0){

			$sql = "SELECT * FROM transactions WHERE customer_id='$customer' AND (transaction_add_date BETWEEN '$f_date' AND '$t_date') ";
		}else{
			$sql = "SELECT * FROM transactions WHERE customer_id='$customer'  ";
			//$sql = "SELECT * FROM transactions WHERE customer_id = '$customer_id' AND  ";
		}
	
	$result = mysqli_query($dbc, $sql);
	$temp=0;
	if ( mysqli_num_rows($result) > 0) :
		while($row = mysqli_fetch_array($result)):
			@$total_debit += $row['debit'];
			@$total_credit+= $row['credit'];
			@$remaing_balance = $row['balance'];

			?>
			<tr>
				<td><?=$row['transaction_id']?></td>
				<td><?=date('D, d-M-Y',strtotime($row['transaction_add_date']))?></td>
				<td><?=$row['transaction_remarks']?></td>
				<td><?=$row['debit']?></td>
				<td><?=$row['credit']?></td>
				<!-- <td><?=($row['balance']<0)?"<span class='label label-danger'>{$row['balance']}</span>":"<span class='label label-success'>{$row['balance']}</span>"?></td> -->
				<td class="bg-danger"><?=($row['credit']-$row['debit'])+$temp?></td>

			</tr>
			<?php
				$remaing_balance = ($row['credit']-$row['debit'])+$temp;
			 $temp=($row['credit']-$row['debit'])+$temp; ?>
		<?php endwhile; ?>
		<tr >
				<td> </td>
				<td> </td>
				<td> </td>
				<td><?= $total_debit ?></td>
				<td><?= $total_credit ?></td>
			</tr>
			<tr >
				<td> Total Remaining </td>
				<td> </td>
				<td> </td>
				<td></td>
				<td></td>
				<td><h3><?=($remaing_balance<0)?"<span class='label label-danger'>{$remaing_balance}</span>":"<span class='label label-success'>{$remaing_balance}</span>"?></h3></td>
			</tr>
		</tbody>
	</table>
		<?php endif;	?>
	<?php endif; ?>
			


</div><!--panel end-->
</div>

<?php include_once "includes/footer.php";?>

<script>
	$( function() {
		var dateFormat = "yy-mm-dd";
			from = $( "#from" )
				.datepicker({
					changeMonth: true,
					numberOfMonths: 1,
					dateFormat : "yy-mm-dd",
				})
				.on( "change", function() {
					to.datepicker( "option", "minDate", getDate( this ) );
				}),
			to = $( "#to" ).datepicker({
				changeMonth: true,
				numberOfMonths: 1,
				dateFormat : "yy-mm-dd",
			})
			.on( "change", function() {
				from.datepicker( "option", "maxDate", getDate( this ) );
			});

		function getDate( element ) {
			var date;
			try {
				date = $.datepicker.parseDate( dateFormat, element.value );
			} catch( error ) {
				date = null;
			}

			return date;
		}
	} );
	</script>