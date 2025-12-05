<?php include_once "includes/header.php";
	 $current_month = date('Y-m');

 ?>
<div class="panel panel-success">
	<div class="panel-heading" align="center"><h4>Profit/Loss Report</h4></div>
	<div class="panel-body">
		<ul class="nav nav-tabs">
			<li  class="active"><a data-toggle="tab" href="#income">Income</a></li>	
			<li><a data-toggle="tab" href="#expense">Expense</a></li>
			<li><a data-toggle="tab" href="#analysis">Analysis</a></li>
		</ul><!-- nav -->
		<div class="tab-content">
			<div class="tab-pane active" id="income">
				<table class="table">
					<thead>
						<tr>
							<th>Dated</th>
							<th>Name</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<?php $q = mysqli_query($dbc,"SELECT * FROM budget WHERE budget_type='income' AND budget_date LIKE '%$current_month%' ORDER BY budget_add_date DESC");
							while($r=mysqli_fetch_assoc($q)):
								$arr=explode("#",$r['budget_name']);
								$order_id = $arr[count($arr)-1];
						 ?>
						<tr>
							<td><?=date('D, d-M-Y',strtotime($r['budget_date']))?></td>
							<td><a target="_blank" href="orders.php?o=editOrd&i=<?=$order_id?>"><?=$r['budget_name']?></a></td>
							<td><?=$r['budget_amount']?></td>
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
			</div><!-- income -->
			<div class="tab-pane fade" id="expense">
				<table class="table">
					<thead>
						<tr>
							<th>Dated</th>
							<th>Name</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<?php $q = mysqli_query($dbc,"SELECT * FROM budget WHERE budget_type='expense' AND budget_date LIKE '%$current_month%' ORDER BY budget_add_date DESC");
							while($r=mysqli_fetch_assoc($q)):
						 ?>
						<tr>
							<td><?=date('D, d-M-Y',strtotime($r['budget_date']))?></td>
							<td><?=$r['budget_name']?></td>
							<td><?=$r['budget_amount']?></td>
							
						</tr>
					<?php endwhile; ?>
					</tbody>
				</table>
			</div><!-- expense -->
			<div class="tab-pane fade" id="analysis">
				<div class="row">
			<?php $q=mysqli_query($dbc,"SELECT DISTINCT(DATE_FORMAT(budget_date,'%M-%Y')) AS 'month' FROM budget");
			$sum_income=0;
			$sum_expense=0;
			while($r=mysqli_fetch_assoc($q)):
				//debug_mode($r);
				$date=date("Y-m",strtotime($r['month']));
				$getSumIncome=mysqli_query($dbc,"SELECT * FROM budget WHERE budget_date LIKE '%$date%' AND budget_type='income'");
				while ($fetchSumIncome=mysqli_fetch_assoc($getSumIncome)) {
					# code...
					$sum_income+=$fetchSumIncome['budget_amount'];
				}
				$getSumExpense=mysqli_query($dbc,"SELECT * FROM budget WHERE budget_date LIKE '%$date%' AND budget_type='expense'");
				while ($fetchSumExpense=mysqli_fetch_assoc($getSumExpense)) {
					# code...
					$sum_expense+=$fetchSumExpense['budget_amount'];
				}
			 ?>
			<div class="col-sm-3">
				<a href="index.php?nav=single_view&table_name=income&filter=<?=$date?>" style="text-decoration: none;">
					<div class="thumbnail text-center" style='font-size: 16px !important'>
						<h3 class="text-center"><?=$r['month']?></h3>
						<span class="label label-success">Income: <?=$sum_income?></span><br>
						<span class="label label-danger">Expense: <?=$sum_expense?></span><br>
						<span class="label label-info" >Profit: <?=$sum_income-$sum_expense?></span>
					</div>
				</a><!-- thumbnail -->
			</div><!-- col -->
			<?php $sum_income=0;$sum_expense=0; endwhile; ?>
		</div><!-- row -->

			</div><!-- analysis -->
		</div><!-- content -->
	</div> <!-- panel body -->
</div><!-- panel -->

<?php include_once "includes/footer.php";?>
