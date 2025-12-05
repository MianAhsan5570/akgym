 <?php include_once '../php_action/db_connect.php'; ?>
<?php 
	if (!empty($_REQUEST['customer_id'])) {


		# code...
		$customer_id = $_REQUEST['customer_id'];
		
		$q=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id = '$customer_id'"));

		echo $q['customer_phone']."-|-". $q['gym_code'];
		 
	}//main if

	if(@$_REQUEST['plan_id']){
		//$dateNow = date();
		$q=mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM plans WHERE plan_id = '".$_REQUEST['plan_id']."'"));
		$v = $q['validity'];
		// $start = date("Y-m-d");
		$time =  date("Y-m-d");
		   $date1 = date('Y-m-d', strtotime($time. '+'.$v.' month'));

		$Val = [
			'fee'=> $q['plan_fee'],
			'date' => $date1,
		];
		echo json_encode($Val);
	}
 ?>