<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-dashboard"></i> Daily Profit Summary</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Dated</th>
						<th>Profit</th>
						<th>Expense</th>
						<th>Net Profit</th>
					</tr>
				</thead>
				<tbody>

					<?php 
					 $expense=$net_profit=0;
					$q = $connect->query("SELECT DISTINCT(voucher_date) FROM vouchers ORDER BY voucher_date DESC"); 
					while($r=$q->fetch_assoc()):
						$getOrder = $connect->query("SELECT * FROM vouchers WHERE voucher_date='$r[voucher_date]'");
						$getBudget = $connect->query("SELECT * FROM budget WHERE budget_date='$r[voucher_date]' AND budget_type='expense'");
						$voucher_date=$r['voucher_date'];
					?>
					<tr>
						<td><?=date('D, d-M-Y',strtotime($r['voucher_date']))?></td>
						<td>
						
							<?php
							$net_profit = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT sum(voucher_amount) AS income FROM vouchers WHERE voucher_date = '$voucher_date'  "));
							?>
							<h2 class="label label-success" style="font-size: 25px"><?php echo  @$net_profit['income']; ?></h2>
						</td>
						<td>
							<?php while($fetchBudget=$getBudget->fetch_assoc()): ?>
								<?php $expense+=$fetchBudget['budget_amount']; ?>
							<?php endwhile; ?>
							<h2 class="label label-danger" style="font-size: 25px"><?php echo  @$expense; ?></h2>
						</td>
						<td>
							<h2 class="label label-warning" style="font-size: 25px"><?php echo  @($net_profit['income']-$expense); ?></h2>
						</td>
					</tr>
				<?php $expense= $net_profit=0;endwhile; ?>
				</tbody>
			</table>
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-dashboard"></i> Month Profit Summary</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Dated</th>
						<th>Profit</th>
						<th>Expense</th>
						<th>Net Profit</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					// echo $current_month = date('Y-m');
					$grand_total= $expense=$net_profit=0;

					$q = $connect->query("SELECT DISTINCT(DATE_FORMAT(voucher_date,'%Y-%m')) AS 'month' FROM vouchers  ORDER BY voucher_date DESC");
					//echo "SELECT DISTINCT(DATE_FORMAT(voucher_date,'%Y-%m')) AS 'month' FROM voucher_date  ORDER BY voucher_date DESC";
					while($r=$q->fetch_assoc()):
						$current_month=$r['month'];
						$mon = date('Y-m',strtotime($r['month']));
						$getOrder = $connect->query("SELECT * FROM vouchers WHERE voucher_date LIKE '%$current_month%' ");
						$getOrderGrand = $connect->query("SELECT * FROM vouchers WHERE voucher_date LIKE '%$current_month%' ");
						$getBudget = $connect->query("SELECT * FROM budget WHERE budget_date LIKE '%$current_month%' AND budget_type='expense'");
						
					?>
					<tr>
						<td><?= date('M-Y',strtotime($mon)) ?></td>
						<td>
							<?php
							$fetchMonth=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT sum(voucher_amount) AS income FROM vouchers WHERE voucher_date LIKE '%$current_month%'"));
							
							?>
							<h2 class="label label-success" style="font-size: 25px"><?=@$fetchMonth['income'];?></h2>
							
						</td>
						
						<td>
							<?php while($fetchBudget=$getBudget->fetch_assoc()): ?>
								<?php $expense+=$fetchBudget['budget_amount']; ?>
							<?php endwhile; ?>
							<h2 class="label label-danger" style="font-size: 25px"><?php echo  @$expense; ?></h2>
						</td>
						<td>
							<h2 class="label label-warning" style="font-size: 25px"><?php echo  @($fetchMonth['income']-$expense); ?></h2>
						</td>
					</tr>
				<?php $grand_total=$expense= $net_profit=0;endwhile; ?>
					
				</tbody>
			</table>
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->
<?php require_once 'includes/footer.php'; ?>