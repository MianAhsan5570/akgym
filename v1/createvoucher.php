 <?php 
include_once "includes/header.php";
?>

<div class="panel panel-danger">
	<div class="panel-heading" align="center"><h4>Create voucher</h4></div>
	<div class="panel-body">
		<?php getMessage(@$msg,@$sts); ?>
		<?php if(!empty($_REQUEST['print_voucher'])): ?>
			<hr>
			<a target="_blank" href="print_voucher.php?print_voucher=<?=$_REQUEST['print_voucher']?>" class="btn btn-primary btn-block">Print Last Voucher</a>
			<hr>
		<?php endif; ?>
		<form class="form-horizontal" method="POST" action="" id="">
			
			  <div class="form-group">
			    <label for="orderDate" class="col-sm-2 control-label">Date</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control dateField" id="orderDate" name="voucher_date" 
			      value="<?php echo date("Y-m-d")?>" style="z-index: 1000"/>
			    </div>
			    <label for="orderDate" class="col-sm-2 control-label">Select Plan</label>
			    <div class="col-sm-4">
			     
			      <select class="form-control " id="plan" name="plan" autofocus="true" >
			      	<option value="">~~SELECT~~</option>
			      	<?php 
						      	$sql = "SELECT * FROM plans WHERE plan_sts = 1";

										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {?>
											<option value="<?=$row[0]?>"><?=$row[1]?> (<?=$row[1]?>) </option>
										<?php } // while
							 			
					?>
			      </select>
			    </div>
			  </div> <!--/form-group-->




			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Select Account</label>
			    <div class="col-sm-10">
			    			<div class="input-group">
			    				<select class="form-control selectpicker" id="clientName" name="customer_id"  required style="z-index: 1" data-live-search="true" data-live-search-style="startsWith" >
						      	<option value="">~~SELECT~~</option>
						      	<?php 
						      	$sql = "SELECT * FROM customers WHERE customer_active = 1 AND customer_type = 'customer' ORDER BY customer_name ASC";

										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {?>
											<option value="<?=$row[0]?>"><?=$row[2]?> (<?=$row[1]?>) </option>
										<?php } // while
										
						      	?>
						      </select>	
						      <span class="input-group-addon" style="font-size: 16px">
						      	phone No.  | Gym No. : 
						      		<span class="badge" id="customer_balance" style="font-size: 16px">
						      			0
						      		</span>
						      	</span>
			    			</div><!-- input group -->
			     <!--  <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Client Name" autocomplete="off" value="_"  autofocus="true" />
 -->
			    </div>
			     
			  </div> <!--/form-group-->
			  <div class="form-group hidden">
			    <label for="orderDate" class="col-sm-2 control-label">Debit</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="debit" name="debit" placeholder="Debit" autocomplete="off" value="0" />

			    </div>
			    <label for="orderDate" class="col-sm-2 control-label">Credit</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="credit" name="credit" placeholder="Debit" autocomplete="off" value="0" />

			    </div>

			  </div> <!--/form-group-->	

			   <div class="form-group ">
			    <label for="orderDate" class="col-sm-2 control-label">Plan Fee</label>
			    <div class="col-sm-4">
			      <input type="text" readonly class="form-control" id="plan_fee" name="plan_fee" placeholder="Plan Details" autocomplete="off" />

			    </div>
			    <label for="orderDate" class="col-sm-2 control-label">Fee Expiry Date</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="expiry_date" name="expiry_date" 	placeholder="Fee Expiry Date" />

			    </div>

			  </div> <!--/form-group-->	


			  <div class="form-group">
			    <label for="clientContact" class="col-sm-2 control-label">Nuration</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="nuration" name="nuration" placeholder="Enter Nuration" autocomplete="off" value="_" />
			    </div>
			  </div> <!--/form-group-->			  
			  <button type="submit" id="voucher" name="add_voucher" data-loading-text="Loading..." class="btn btn-info pull pull-right"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
			</form>
	</div>
</div>

<?php
include_once "includes/footer.php";
?>

 <script>
  	$(document).on('change','#clientName',function(){
  		var customer_id = $(this).val();
  		$.ajax({
  			url:'ajax/getbalance.php',
  			type:'get',
  			dataType:'text',
  			data:{customer_id:customer_id},
  			success:function(response){
  				$("#customer_balance").html(response);
  			}
  		});
  	});

  	$(document).on('change','#plan',function(){
  		var plan_id = $(this).val();
  		$.ajax({
  			url:'ajax/getbalance.php',
  			type:'get',
  			dataType:'json',
  			data:{plan_id:plan_id},
  			success:function(response){
  				//alert(response);
  				$("#expiry_date").val(response.date);
  				$("#plan_fee").val(response.fee);
  			}
  		});
  	});


  	$(document).on('input','#debit',function(){
  		var debit = $("#debit").val();
  		if (Number(debit)>0) {
  			$("#credit").attr('readonly',true);
  			$("#credit").val('0');
  		}else{
  			$("#credit").attr('readonly',false);
  			$("#credit").val('0');
  		}
  	});
  		$(document).on('input','#credit',function(){
  		var debit = $("#credit").val();
  		if (Number(debit)>0) {
  			$("#debit").attr('readonly',true);
  			$("#debit").val('0');
  		}else{
  			$("#debit").attr('readonly',false);
  			$("#debit").val('0');
  		}
  	});

  </script>
  	
