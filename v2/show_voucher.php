<?php include_once "includes/header.php"; 
?>

<div class="panel panel-success <?php if(!isset($_REQUEST['search_voucher'])){echo 'print_hide';} ?>">
	<div class="panel-heading text-center"> Voucher List
		
	</div><!-- heading -->
		<div class="panel-body" align="center">
			<table class="table table-responsive " id="myTable" style="text-align: center;"> 
				<thead>
					<tr>
						<th>Sr#</th>
						<th>Voucher No.</th>
						<th>Voucher Date</th>
						<th>Member Name</th>
						<th>Member Phone / Gym Code</th>
						<th>Voucher Amount</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$x=1;
					$v = mysqli_query($dbc,"SELECT * FROM vouchers ORDER BY voucher_id DESC");
					while($r=mysqli_fetch_assoc($v)):
						$cust = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id = '$r[customer_id]'"));
					?>
					<tr>
						<td><?=$x?></td>
						<td><?=$r['voucher_id']?></td>
						<td><?=$r['voucher_date']?></td>
						<td><?=ucfirst($cust['customer_name'])?></td>
						<td><?=$cust['customer_phone']?>/<?=$cust['gym_code']?></td>
						<td><?=$r['voucher_amount']?></td>
						<td></td>
					</tr>
				<?php 
				$x++;
			endwhile;?>
				</tbody>
				
			</table>
		</div><!-- panel body -->
</div><!-- panel -->

<?php include_once 'includes/footer.php'; ?>
<script>
	$(document).on('click','.print_btn',function(){
		var id=$(this).attr('title');
		if($("#table_"+id).attr('title')==id){
		$("#table_"+id).removeClass('print_hide');
		window.print();
	}
		
		$("#table_"+id).addClass('print_hide');

		
	});
</script>
<style type="text/css">
	th{
		text-align: center;
	}
</style>