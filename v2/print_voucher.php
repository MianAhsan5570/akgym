<?php include_once "includes/header.php"; ?>
<script>window.print()</script>
<?php if(!empty($_REQUEST['print_voucher'])): ?>
<div class="panel panel-success">
	<div class="panel-heading print_hide">Single Voucher
	</div><!-- heading -->
		<div class="panel-body" align="center">
				
				<?php 

				$status='';
				$print_hide='print_hide';
				$q=mysqli_query($dbc,"SELECT * FROM vouchers WHERE voucher_id='$_REQUEST[print_voucher]'");
				while($r=mysqli_fetch_assoc($q)):
					$fetchCustomer=fetchRecord($dbc,"customers",'customer_id',$r['customer_id']);
					$fetchTransaction=fetchRecord($dbc,"transactions",'transaction_id',$r['transaction_id']);
					$getLastTransaction = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM transactions WHERE customer_id='$fetchCustomer[customer_id]' ORDER BY transaction_id DESC LIMIT 1,1"));
					if (empty($fetchTransaction['debit'])) {
						# code...
						$status="CR";
						$clr = "danger";
					}else{
						$status="DB";
						$clr="success";
					}
					

				?>

				<div class="print_hide">
				

					<button type="button" onclick="window.print()" title="<?=$r['transaction_id']?>"  class="btn btn-primary pull-right print_btn">Print Voucher</button>

					<br><br>
				</div>
			<div id="table_<?=$r['transaction_id']?>" title="<?=$r['transaction_id']?>">
				
				

			<!-- <center style="border:1px solid #000">
				<p><b></b> </p>
				<p><b>Phone:</b> <?=$fetchCustomer['customer_phone']?></p>
				<p><b>Voucher Date:</b> <?=date('D, d-M-Y',strtotime($r['voucher_date']))?></p>
				<p><b>Nurration: </b></p><p><?=$r['nuration']?></p>
			</center> -->
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
			<table border="2px" cellspacing="5" cellpadding="5" class="table table-hover text-uppercase" width="80%" align="center" style="text-align: center!important;">
				<thead>
					<tr >
				<th colspan="5">
				<div align="center">
				<img src="img/uploads/<?= $logo; ?>" class="img-responsive" style="width: 100%; height: 70px;">
				
				<p  style="font-size:20px;margin-top: 10px;"> <?php echo $name  ?></p>
				<p style="font-size:15px; "><strong>Company No:</strong> <?php echo $company_phone  ?></p>
				<p style="font-size:15px; margin-top: -10px;"><strong>Personal No:</strong> <?php echo $personal_phone ?></p>
				<p style="font-size:15px; margin-top: -10px;"><strong>Address:</strong> <?php echo $address ?></p>
				</div>		
			</th>
		</tr>
				</thead>
				<tbody align="center">
					<tr >
						<th>Date</th>
						<th>Account Title</th>
						<th>Phone</th>
					</tr>
					<tr align="center">
						<td><?=date('D, d-M-Y',strtotime($r['voucher_date']))?></td>
						<td><?=$fetchCustomer['customer_name']?></td>
						<td><?=$fetchCustomer['customer_phone']?></td>
					</tr align="center">
					<tr align="center">
						<th>Nurration:</th>
						<td colspan="2"><?=$r['nuration']?></td>
					</tr align="center">
					<tr align="center">
						<th>Voucher No#</th>
						<td colspan="2"><?=$r['voucher_id']?></td>
					</tr >
					<tr align="center">
						<th>Previous Balance</th>
						<td colspan="2"> <?=$fetchTransaction['balance']-($fetchTransaction['credit']-$fetchTransaction['debit'])?></td>
					</tr >
					<tr align="center">
						<th>Paid </th>
						<td colspan="2"><?=($fetchTransaction['credit']+$fetchTransaction['debit'])?> <label class="label label-<?=$clr?>"><?=$status?></label></td>
					</tr>
					<tr align="center">
						
						<th>Remaining Balance</th>
						<td colspan="2"><?=$fetchTransaction['balance']?></td>
					</tr>
				</tbody>
			</table><!-- table -->
		</div>
		<?php endwhile; ?>
		</div><!-- panel body -->
</div><!-- panel -->
<?php endif; ?>
<?php include_once 'includes/footer.php'; ?>
<style type="text/css">
	th{
		text-align: center;
	}
</style>