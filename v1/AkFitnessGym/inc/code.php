
<?php include_once 'inc/functions.php'; ?>
		 <!--comapany profile add-->
		 <?php
		 	if (isset($_REQUEST['company_submit'])) {
		 			if ($_FILES['logo']['tmp_name']) {
		 			# code...
		 			upload_pic($_FILES['logo'],'img/uploads/');
		 			$data=[
		 				'logo'=>$_SESSION['pic_name'],
		 			'name'=>$_POST['name'],
		 			'address'=>$_POST['address'],
		 			'company_phone'=>$_POST['company_phone'],
		 			'personal_phone'=> $_POST['personal_phone'],
		 			'email' => $_POST['email']
			 		];
		 		}else{
		 			$data=[
		 			'name'=>$_POST['name'],
		 			'address'=>$_POST['address'],
		 			'company_phone'=>$_POST['company_phone'],
		 			'personal_phone'=> $_POST['personal_phone'],
		 			'email' => $_POST['email']
			 		];
		 		}

		 	 if (insert_data($dbc,'company', $data)) {
				# code...
				echo "<script>alert('company Added....!')</script>";
				//$msg = "<script>alert('Company Added')</script>";
					$sts = 'success';
					redirect("company.php",2000);
				}else{
					$msg = mysqli_error($dbc);
					$sts ="danger";
				}
		 		
		 	}
		 	/*get company data*/
		 	if (!empty($_REQUEST['company_edit'])) {
		 		# code...
		 		
		 		$company_edit = $_REQUEST['company_edit'];
		 		$fetchCompany = fetchRecord($dbc,"company",'id',$company_edit);
		 		$company_button='<input type="submit" value="Edit" name="company_update" class="btn btn-primary " style="width: 80%; border-radius: 10px;">';

		 	}else{
		 		$company_button = '<input type="submit" name="company_submit" class="btn btn-success " style="width: 80%; border-radius: 10px;">';
		 	}

		 /*edit company profile*/
		 	if (isset($_POST['company_update'])) {
		 		$company_id=  $_REQUEST['company_edit'];
		 		if ($_FILES['logo']['tmp_name']) {
		 			# code...
		 			upload_pic($_FILES['logo'],'img/uploads/');
		 			$data=[
		 				'logo'=>$_SESSION['pic_name'],
		 			'name'=>$_POST['name'],
		 			'address'=>$_POST['address'],
		 			'company_phone'=>$_POST['company_phone'],
		 			'personal_phone'=> $_POST['personal_phone'],
		 			'email' => $_POST['email']
			 		];
		 		}else{
		 			$data=[
		 			'name'=>$_POST['name'],
		 			'address'=>$_POST['address'],
		 			'company_phone'=>$_POST['company_phone'],
		 			'personal_phone'=> $_POST['personal_phone'],
		 			'email' => $_POST['email']
			 		];
		 		}
		 		
		 			

		 	 if (update_data($dbc,'company', $data , 'id',$company_id)) {
				# code...
				//echo "<script>alert('company Updated....!')</script>";
				echo $msg = "<script>alert('Company Updated')</script>";
					$sts = 'success';
					redirect("company.php",2000);
				}else{
					$msg = mysqli_error($dbc);
					$sts ="danger";
				}	
			}
		   ?>

	
		 <!--comapany profile end-->
<!--plan-->

<?php
if (isset($_REQUEST['plan_name'])) {
	$data=[
	'plan_name' => $_REQUEST['plan_name'],
	'plan_fee' => $_REQUEST['plan_fee'],
	'validity' => $_REQUEST['validity'],
	'plan_sts' => $_REQUEST['status'],
	];

	if(@$_REQUEST['id']){
		$id = $_REQUEST['id'];
		if(update_data($dbc,'plans', $data , 'plan_id',$id)){
			$msg = "Plan Upodates Successfully";
			$sts ="success";
			redirect("plan.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}

	}else{



	if(insert_data($dbc,"plans",$data)){
			$msg = "Plan Added Successfully";
			$sts ="success";
			//$last_voucher_id = mysqli_insert_id($dbc);
			redirect("plan.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
	}	


}


?>
<!--plan end-->


<!-- customer add -->
<?php
 	//add customers
//add customers
 if (isset($_REQUEST['add_customer'])) {
 		$gym_code = $_REQUEST['gym_code'];
 		$customer_name = $_REQUEST['name'];
		$customer_email=$_REQUEST['email'];
		$customer_phone=$_REQUEST['phone'];
		$customer_address=$_REQUEST['address'];
		$status = $_REQUEST['status'];
		
		if(mysqli_query($dbc,"INSERT INTO customers(customer_name,customer_email,customer_phone,customer_address,customer_active,customer_type,gym_code)VALUES('$customer_name','$customer_email','$customer_phone','$customer_address','$status','customer','$gym_code')")){
			$ThisId = mysqli_insert_id($dbc);

			
			$planD = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM plans WHERE plan_id = '".$_REQUEST['plan']."' "));
			$v = $planD['validity']; 
			$time =  $_REQUEST['start_date'];
		   $endDate = date('Y-m-d', strtotime($time. '+'.$v.' month'));
			

			mysqli_query($dbc,"INSERT INTO vouchers(customer_id,nuration,transaction_id,voucher_date,voucher_enddate,voucher_plan,voucher_amount)VALUES ('$ThisId','Customer Added' , '0','".$_REQUEST['start_date']."','$endDate','".$planD['plan_name']."','".$planD['plan_fee']."')  ");
			//echo "INSERT INTO vouchers(customer_id,nuration,transaction_id,voucher_date,voucher_enddate,voucher_plan)VALUES ('$ThisId','Customer Added' , '0','".$_REQUEST['start_date']."','$endDate','".$planD['plan_name']."')  ";

			$msg = "Customer Add Successfully";
			$sts = "success";
			//redirectURL(2000);
			// redirect("customers.php",1200);
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
			}
		}

		if (isset($_REQUEST['edit_customer'])) {
			$idGet= $_REQUEST['id'];

 		$customer_name = $_REQUEST['name'];
		$customer_email=$_REQUEST['email'];
		$customer_phone=$_REQUEST['phone'];
		$customer_address=$_REQUEST['address'];
		$status = $_REQUEST['status'];
			$query= mysqli_query($dbc,"UPDATE customers SET customer_name = '$customer_name',customer_phone = '$customer_phone',customer_email = '$customer_email',customer_phone = '$customer_phone',customer_active = '$status' WHERE customer_id = '$idGet'");
			if($query){
		
			$msg = "Customer EDIT Successfully";
			$sts = "success";
			//redirectURL(2000);
			redirect("customers.php",1200);
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
			}
		}

		

	/*create voucher*/
	if (isset($_REQUEST['add_voucher'])) {
		
		 $fetchTransaction = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM transactions WHERE customer_id='$_REQUEST[customer_id]' ORDER BY transaction_id DESC LIMIT 1"));
			if ($_REQUEST['debit']>0) {
				# code...
				$debit=$_REQUEST['debit'];
				$balance=$fetchTransaction['balance']-$debit;
				$credit=0;
			}
			if ($_REQUEST['credit']>0) {
				# code...
				$debit=0;
				$credit=$_REQUEST['credit'];
				$balance=$fetchTransaction['balance']+$credit;
				
				
			}

		$data_transaction=[
			'debit'=>@$debit,
			'credit'=>@$credit,
			'transaction_remarks'=>$_REQUEST['nuration'],
			'customer_id'=>$_REQUEST['customer_id'],
			'balance'=>@$balance,

		];
	if(insert_data($dbc,"transactions",$data_transaction)){
		$transaction_id = mysqli_insert_id($dbc);
		$data_voucher=[
		'voucher_date'=>$_REQUEST['voucher_date'],
		'customer_id'=>$_REQUEST['customer_id'],
		'nuration'=>$_REQUEST['nuration'],
		'voucher_enddate' => $_REQUEST['expiry_date'],
		'transaction_id'=>$transaction_id,
		'voucher_amount' => $_REQUEST['plan_fee'],
		
		];
		if(insert_data($dbc,"vouchers",$data_voucher)){
			$msg = "Voucher Added Successfully";
			$sts ="success";
			$last_voucher_id = mysqli_insert_id($dbc);
			//redirect("createvoucher.php?print_voucher=".$last_voucher_id.'',1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}
		
	}//isset


	/*Add Budget Category*/
	if (isset($_REQUEST['add_budget_category'])) {
		# code...
	
		$data_budget_category=[
			'budget_category_name'=>$_REQUEST['budget_category_name'],
			'budget_category_type'=>$_REQUEST['budget_category_type'],
			

		];
		if(insert_data($dbc,"budget_category",$data_budget_category)){

		$data_customer_table=[
			'customer_name' => $_REQUEST['budget_category_name'],
			'customer_type' => $_REQUEST['budget_category_type'],
			'customer_active'=> '1',
		];

			insert_data($dbc,"customers",$data_customer_table);

			$msg = "Budget Category Added Successfully";
			$sts ="success";
			redirect("chartsofaccount.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}

	/*Delete budget_category_del_id */
	if (!empty($_REQUEST['budget_category_del_id'])) {
		# code...
		deleteFromTable($dbc,"budget_category",base64_encode($_REQUEST['budget_category_del_id']),"budget_category_id");
		redirect('chartsofaccount.php',2000);
	}
	/*Fetch budget_category_edit_id */
	if (!empty($_REQUEST['budget_category_edit_id'])) {
		# code...
		$fetchBudgetCategory = fetchRecord($dbc,"budget_category",'budget_category_id',$_REQUEST['budget_category_edit_id']);
		$budget_category_button=' <button type="submit" id="budget_category" name="edit_budget_category" data-loading-text="Loading..." class="btn btn-info pull pull-right"><i class="glyphicon glyphicon-edit"></i> Edit </button>';
	}else{
		$budget_category_button=' <button type="submit" id="budget_category" name="add_budget_category" data-loading-text="Loading..." class="btn btn-info pull pull-right"><i class="glyphicon glyphicon-ok-sign"></i> Save </button>';
	}
	/*Edit budget Category*/
	if (isset($_REQUEST['edit_budget_category'])) {
		# code...
	
		$data_budget_category=[
			'budget_category_name'=>$_REQUEST['budget_category_name'],
			'budget_category_type'=>$_REQUEST['budget_category_type'],
			

		];
		if(update_data($dbc,"budget_category",$data_budget_category,'budget_category_id',$_REQUEST['budget_category_edit_id'])){
			$msg = "Budget Category Updated Successfully";
			$sts ="success";
			redirect("chartsofaccount.php",1200);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}

	/*Enter Expenses*/
	if (isset($_REQUEST['add_expenses'])) {
		# code...
	
		$data_budget=[
			'budget_name'=>$_REQUEST['expense_category'],
			'budget_amount'=>$_REQUEST['expense_amount'],
			'budget_type'=> 'expense',
			'budget_date'=>$_REQUEST['expense_date'],
			

		];
		if(insert_data($dbc,"budget",$data_budget)){
			$msg = "Expenses Added Successfully";
			$sts ="success";
			redirect("expenses.php",2000);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}
		
	}
/*Add Double Vouver*/
	if (isset($_REQUEST['add_voucher_double'])) {
		$fetchthisvoucerId = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM vouchers ORDER BY voucher_id DESC LIMIT 1"));
		$thisVoucher =  $fetchthisvoucerId['voucher_this_id'];
		if ($thisVoucher == '') {
			$voucher_this_id = 1;
		}else{
		$voucher_this_id = $thisVoucher;
	}
		$voucher_type ='double Voucher';
			 $debit1 = $_REQUEST['debit1'];
			$nuration  = $_REQUEST['nuration'];

			$voucher_date = date('Y-m-d',strtotime($_REQUEST['voucher_date']));
		
			$customer_id = $_REQUEST['customer_id'];
			$nuration2 = $_REQUEST['nuration2'];

		$transactions_first = "INSERT INTO transactions (debit , credit , balance , customer_id , transaction_remarks , transaction_type , transaction_from) VALUES ('$debit1','0', '0' , '$customer_id' , '$nuration' , '$voucher_type' , 'Voucher Added') ";
		if (mysqli_query($dbc, $transactions_first)) {
			$first_transaction = mysqli_insert_id($dbc);
			//$voucher_date = $_REQUEST['voucher_date'];
		$customer_id = $_REQUEST['customer_id'];
		$debit1 = $_REQUEST['debit1'];
		$first_sql = "INSERT INTO vouchers (customer_id , nuration , transaction_id , voucher_date,voucher_this_id) VALUES ('$customer_id','$nuration' ,'$first_transaction', '$voucher_date', '$voucher_this_id')";
		if (mysqli_query($dbc,$first_sql)) {
			

			echo $credit2 = $_REQUEST['credit2'];
			

				# code...

				$customer_id2 = $_REQUEST['customer_id2'];
			

		$transactions_second = "INSERT INTO transactions (debit , credit , balance , customer_id , transaction_remarks , transaction_type , transaction_from) VALUES ('0','$credit2', '0' , '$customer_id2' , '$nuration2' , '$voucher_type' , 'Voucher Added'  )";
			if(mysqli_query($dbc,$transactions_second)){
				$second_transaction = mysqli_insert_id($dbc);
				$customer_id2 = $_REQUEST['customer_id2'];
		$credit2 = $_REQUEST['credit2'];
		$first_sql = "INSERT INTO vouchers (customer_id , nuration , transaction_id , voucher_date,voucher_this_id) VALUES ('$customer_id2','$nuration2' ,'$second_transaction', '$voucher_date', '$voucher_this_id')";
			}
			if(mysqli_query($dbc,$first_sql)){
				$msg = "Voucher Added Successfully";
			$sts ="success";
			$last_voucher_id = mysqli_insert_id($dbc);
			//redirect("createvoucher.php?print_voucher=".$last_voucher_id.'',1500);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}


			


		
			} // sql then	

	}

		$fetch_type = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id = '$customer_id2'"));
		if($fetch_type['customer_type'] == 'expense'){


			$data_budget=[
			'budget_name'=>$fetch_type['customer_name'],
			'budget_amount'=>$credit2,
			'budget_type'=> 'expense',
			'budget_date'=>$voucher_date,
			

		];
		if(insert_data($dbc,"budget",$data_budget)){
			$msg = "Expenses Added Successfully";
			$sts ="success";
			//redirect("doublevoucher.php",2000);
		}else{
			$msg =mysqli_error($dbc);
			$sts = "danger";
		}

		}

		redirect("doublevoucher.php?print_voucher=".$last_voucher_id.'',1500);
}

/*DELTE voucher */
	if (!empty($_REQUEST['delete_voucher'])) {

		 $fetchTransactionVoucher = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM vouchers WHERE voucher_id='$_REQUEST[delete_voucher]' "));

		 // $fetchedTransactionDelete= mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM transactions WHERE transaction_id='$fetchTransactionVoucher[transaction_id]' "));

		# code...
		 $query = mysqli_query($dbc, "DELETE FROM vouchers WHERE voucher_id = '$_REQUEST[delete_voucher]' ");
		 if ($query) {

		 mysqli_query($dbc, "DELETE FROM transactions WHERE transaction_id = '$fetchTransactionVoucher[transaction_id]' ");
		 
		

		$msg = "Voucher Deleted Successfully";
			$sts ="success";
		//redirect('show_voucher.php',2000);
	}
	}	
?>