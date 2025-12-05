<?php 
include_once "includes/header.php";
?>
	<div class="container">
<div class="panel panel-danger">
	<div class="panel-heading" align="center" style="background-color: #5e78df"><h4 style="color: white">Create voucher</h4></div>
	<div class="panel-body">
		<?php getMessage(@$msg,@$sts); ?>
		<?php if(!empty($_REQUEST['print_voucher'])): ?>
			
			<a target="_blank" href="print_voucher.php?print_voucher=<?=$_REQUEST['print_voucher']?>" class="btn btn-success btn-sm float-right"> <i class="fas fa-print"></i> Print Last Voucher</a>
			<br/>
			<hr>
			
		<?php endif; ?>
		<form class="form-horizontal" method="POST" action="" id="">
			
			  <div class="form-group ">
			    <label for="orderDate" class="col-sm-2 control-label">Order Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control dateField" id="orderDate" name="voucher_date" 
			      value="<?php echo date("d-m-Y")?>" style="z-index: 1000"/>
			    </div>
			    
			  </div> <!--/form-group-->

			  	 <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Select Account</label>
			    <div class="col-sm-4">
			    			<div class="input-group">
			    				<select class="form-control" id="clientName" name="customer_id" autofocus="true" required style="z-index: 1" >
						      	<option value="">~~SELECT~~</option>
						      	<?php 
						      	$sql = "SELECT * FROM customers WHERE customer_active = 1 AND customer_type != 'expense' ORDER BY customer_name ASC ";

										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>	
						      <span class="input-group-addon">
						      	Balance: 
						      		<span class="badge" id="customer_balance">
						      			0
						      		</span>
						      	</span>
			    			</div><!-- input group -->
			     <!--  <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Client Name" autocomplete="off" value="_"  autofocus="true" />
 -->
			    </div>
			     <label for="orderDate" class="col-sm-2 control-label">Debit</label>
			    <div class="col-sm-4  ">
			   
			    <input type="text" class="form-control" id="debit" name="debit1" placeholder="Debit" autocomplete="off" value="0" />

			    	
			    </div>
			     
			  </div> <!--/form-group-->
			  <div class="form-group ">
			   
			    
			    
			    <div class="col-sm-10  ">
			    <label for="orderDate" class="col-sm-3">Hint</label>
			    <div class="col-sm-9">
			    <input type="text" class="form-control" id="nuration" name="nuration" placeholder="Enter Nuration" autocomplete="off" value="_" />
			</div>

			    	
			    </div>
			    <!-- col-sm-4 end -->

			  
			  
</div>

 <div class="form-group ">
			    <label for="clientName" class="col-sm-2 ">Select Account</label>
			    <div class="col-sm-4">
			    			<div class="input-group">
			    				<select class="form-control" id="clientName2" name="customer_id2" autofocus="true" required style="z-index: 1">
						      	<option value="">~~SELECT~~</option>
						      	<?php 
						      	$sql = "SELECT * FROM customers WHERE customer_active = 1 ORDER BY customer_name ASC";

										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>	

						      <span class="input-group-addon">
						      	Balance: 
						      		<span class="badge" id="customer_balance2">
						      			0
						      		</span>
						      	</span>
			    			<!-- input group -->
			    
			    </div>  <!-- col-sm-6 end -->
			  
</div>
				<label for="orderDate" class="col-sm-2 control-label" style="margin-top: 10px">Credit</label>
			 <div class="col-sm-4  ">
			    	
			   
			      <input type="text" class="form-control" id="credit2" name="credit2" placeholder="Debit" autocomplete="off" value="0" />
			    
			  </div> <!--/form-group-->
			
	</div>		 	
					 <label for="orderDate" class="col-sm-3">Hint</label>
			   <div class="col-sm-10">
			   
			    <input type="text" class="form-control" id="nuration" name="nuration2" placeholder="Enter Nuration" autocomplete="off" value="_" />

			    	
			    </div>	  
			  <button type="submit" id="voucher" name="add_voucher_double" data-loading-text="Loading..." class="btn btn-info pull pull-right"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
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

  		$(document).on('change','#clientName2',function(){
  		var customer_id = $(this).val();
  		$.ajax({
  			url:'ajax/getbalance.php',
  			type:'get',
  			dataType:'text',
  			data:{customer_id:customer_id},
  			success:function(response){
  				$("#customer_balance2").html(response);
  			}
  		});
  	});
  	$(document).on('input','#debit',function(){
  		var debit = $("#debit").val();
  		if (Number(debit)>0) {
  			//$("#credit").attr('readonly',true);
  			//$("#credit").val('0');
  			$("#credit2").attr('readonly',true);
  			$("#credit2").val(debit);
  		}else{

  			//$("#credit").attr('readonly',false);
  			$("#debit").val('');
  		}
  	});
  		$(document).on('input','#credit2',function(){
  		var debit = $("#credit2").val();
  		if (Number(debit)>0) {
  			//$("#debit").attr('readonly',true);
  			//$("#credit2").val('0');
  		}else{
  			//$("#debit").attr('readonly',false);
  			$("#credit2").val('');
  		}
  	});

  </script>
  	
</div>