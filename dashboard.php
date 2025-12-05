<?php require_once 'includes/header.php'; ?>

<?php 
$todayDateNow = date("Y-m-d");
$tmember = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT count(customer_id) AS totalMember FROM customers "));
$tplan = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT count(plan_id) AS totalPlan FROM plans "));
$tcollect = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT sum(voucher_amount) AS totalCollected FROM vouchers WHERE voucher_date = '$todayDateNow' "));

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">
	
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Total Member
					<span class="badge pull pull-right" style="font-size: 18px"><?php echo @$tmember['totalMember']; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-3-->

		<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					Total Plans
					<span class="badge pull pull-right" style="font-size: 18px"><?= @$tplan['totalPlan'] ?></span>
				</a>
					
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		</div> <!--/col-md-3-->

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="lowstockprint.php" style="text-decoration:none;color:black;">
					Today Collection
					<span class="badge pull pull-right" style="font-size: 18px"><?= @$tcollect['totalCollected'] ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-3-->

	

	<div class="col-md-4 hidden">
		<div class="card">
		  <div class="cardHeader" style="background-color:white;" align="center">
		    <img src="img/uploads/<?=$logo?>"  class="img img-responsive" style="width: 300px; height: 150px; ">
		    <!-- <img src="img/logo.png" class="img-responsive img-thumbnail" style="height: 100px;">
		    <h3 style="color: orange; ">LIFE PHARMACY</h3>
		    <h4 >CHAK No.#67 JB SADHAR FAISALABAD</h4> -->

		   
		  </div>
			 
		  <div class="cardContainer">
		  
		    <p> <h2 style="color: orange; "><?=$company_name?></h2> </p>
		  </div>
		</div> 
		<br /><br />
		<div class="card">
		  <div class="cardHeader">
		    <h1><?php echo date('d/l'); ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		  </div>
		</div> 
		<br/>

		

	</div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-menu-hamburger"></i> Menu
				<span class="label label-info" style="float: right;font-size: 18px">Date : <?=date('D,d-M-Y')?></span>
			</div>
			<div class="panel-body">
					<?php include_once 'check.php'; ?>
			</div>	
		</div>
		
	</div>

	
</div> <!--/row-->

<div class="container">
		<div class="row" >
	<div class="col-sm-5" >
		
		<div class="col-sm-12">
		<?php
		 $thisMonth = date('Y-m-1');
		 $todayDate = date('Y-m-d');
		 $thisMonth2 = date('F,d-m-Y');

		 $NewIncom = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT sum(voucher_amount) AS income FROM vouchers WHERE voucher_date >= '$thisMonth' "));
		
		 $NewIncom = $NewIncom['income'];
		
		 $Exp = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT sum(budget_amount) AS expense FROM budget WHERE budget_date >= '$thisMonth' AND budget_type = 'expense' "));
		 //echo "SELECT sum(budget_amount) AS expense FROM budget WHERE budget_date >= '$thisMonth' AND budget_type = 'expense' ";
		 $Exp = $Exp['expense']; 


$dataPoints = array( 
	array("label"=>"Income", "y"=> @$NewIncom),
	array("label"=>"Expenses", "y"=>@$Exp)
	
);


//echo $temp;
?>
			
			<div id="chartContainer" style="height: 100%; width: 100%;"></div>



			</div>
			
			
			


		</div>
	


	<div class="col-sm-3">
		<div class="panel panel-info">
				<div class="panel panel-heading text-center">Analysis </div>
				<div class="panel panel-body">
					<div class="col-sm-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Income
					<span class="badge pull pull-right"><?php echo @$NewIncom ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		<div class="panel panel-default">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Expense
					<span class="badge pull pull-right"><?php echo @$Exp ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->

		
		<div class="panel panel-info">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Total Profit
					<span class="badge pull pull-right"><?php echo @$NewIncom - @$Exp   ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
		
		
		
		<br/><br/><br/><br/>
		
	</div> <!--/col-md-4-->
				</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="panel panel-danger">
		<div class="panel panel-heading">Today Fee Date</div>
		<div class="panel panel-body">

			<table class="table table-responsive table-bordered">
				<tr>
					
					<th>Member</th>
					<th>Phone</th>
					<th>Expiry Date</th>
				</tr>
				<?php

				$q = mysqli_query($dbc,"SELECT * FROM vouchers WHERE voucher_enddate = '$todayDate'");
				
				while($row = mysqli_fetch_assoc($q)):
					$fetchCustomer=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id = '".$row['customer_id']."'"));
				?>
					<td><?=ucfirst($fetchCustomer['customer_name'])?></td>
					<td><?=$fetchCustomer['customer_phone']?></td>
					<td><?=$row['voucher_enddate']?></td>
					
					
				</tr>
<?php
endwhile;
?>
				
			</table>
				
		</div>
	</div>
		</div>

	
</div> <!--/row-->
</div>

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

<?php require_once 'includes/footer.php'; ?>