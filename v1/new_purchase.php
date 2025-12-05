<?php include_once "includes/header.php"; ?>
<script src="custom/js/purchase.js" type="text/javascript"></script>	
<div class="panel panel-success">
	<div class="panel-heading" align="center"><h4>Purchase</h4></div>
	<div class="panel-body">
		<?php if(!empty($_REQUEST['purchase_id'])): ?>
			<div class="alert alert-info">
			<a target="_blank" href="php_action/print_purchase.php?var=<?=$_REQUEST['purchase_id']?>" class="btn btn-primary">Print Last Purchase</a>
			<!-- <a target="_blank" href="print_voucher.php?print_voucher=<?=$_REQUEST['print_voucher']?>" class="btn btn-success">Edit Purchase</a> -->
			</div>
		<?php endif; ?>
		<form class="form-horizontal" method="POST" action="php_action/createpurchase.php" id="createOrderForm">
			
			  <div class="form-group">
			    <label for="purchaseDate" class="col-sm-2 control-label">purchase Date</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control datepicker" id="orderDate" name="purchaseDate" 
			      value="<?php echo date("Y/m/d/l")?>"/>
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Select Account</label>
			    <div class="col-sm-10">
			    			<div class="input-group">
			    				<select class="form-control" id="clientName" name="clientName" autofocus="true" style="z-index: 1">
						      	
						      	<?php 
						      	$sql = "SELECT * FROM customers WHERE customer_active = 1";

										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row['customer_id']."'>".$row[1]."</option>";
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
			     
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientContact" class="col-sm-2 control-label">Party Customer / Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientContact" name="clientContact" placeholder="Contact Number" autocomplete="off" value="_" />
			    </div>
			  </div> <!--/form-group-->			  

			  <table class="table" id="productTable">
			  <!-- <button type="button" class="btn btn-primary pull-right" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button> -->
				
			  	<thead>
			  		<tr>			  			
			  			<th style="width:40%;">Product</th>
			  			<th style="width:20%;">Quantity</th>
		 	  			<th style="width:15%;"> Purchase Rate</th>			  			
			  			<th style="width:15%;">Total</th>			  			
			  			<th style="width:10%;"></th>
			  			<th style="width:10%;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 2; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-left:20px;">
			  					<div class="form-group">    

			  						<input list="lst" class="form-control livesearch"  onfocus="myFunction(this)"  name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)">

								<datalist id="lst" class="new">	
									
								</datalist>
								 <input  name="f_Text" id="f_Text<?php echo $x; ?>" class="form-control" readonly / >
			  					</div>

			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control"  />
			  								  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />	
			  					<div class="input-group">
			  						<span class="input-group-addon">Previous p</span>
			  						<input readonly type="text" name="purchase[]" id="purchase_value<?php echo $x; ?>" autocomplete="off" class="form-control" />
			  					</div>
			  					<div class="input-group">
			  						<span class="input-group-addon">Stock</span>
			  						<input readonly type="text" name="stock[]" id="quantity_show<?php echo $x; ?>" autocomplete="off" class="form-control" />
			  					</div>			  					
			  				</td>


							
			  				<td style="padding-left:20px;">
			  					<div class="form-group">
			  					<input type="text" name="rate[]" id="purchase<?php echo $x; ?>" autocomplete="off"  class="form-control" onkeyup="getTotal(<?php echo $x ?>)" />
			  					
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" readonly />			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td>

			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  				

			  			</tr>
		  			<?php
		  			$arrayNumber++;
			  		} // /for
	 		  		?>
			  	</tbody>			  	
			  </table>
			  <td>
			  					<button type="button" class="btn btn-primary pull-right" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>
			  					<button type="button" id="ic" class="btn btn-info pull-right"><i class="glyphicon glyphicon-plus-sign"></i>Add Product</button>
			  				</td>
						
			  <div class="col-md-6">
			  	<div class="form-group">
				    <label for="subTotal" class="col-sm-3 control-label">Sub Amount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				    <label for="vat" class="col-sm-3 control-label">Discount 0</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="vat" name="vat" disabled="true" />
				      <input type="hidden" class="form-control" id="vatValue" name="vatValue" />
				    </div>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				    <label for="totalAmount" class="col-sm-3 control-label">Total Amount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
				      <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
				    </div>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				    <!-- <label for="discount" class="col-sm-3 control-label">Tex (OFF)</label> -->
				    <div class="col-sm-9">
				      <input type="hidden" class="form-control" id="discount" name="discount"  autocomplete="off"  value="0" />
				    </div>
				  </div> <!--/form-group-->	
				  <div class="form-group">
				    <label for="grandTotal" class="col-sm-3 control-label">Grand Total</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" />
				    </div>
				  </div> <!--/form-group-->			  		  
			  </div> <!--/col-md-6-->

			  <div class="col-md-6">
			  	<div class="form-group">
				    <label for="paid" class="col-sm-3 control-label">Paid Amount</label>
				    <div class="col-sm-9">
				    <!-- <input type="text" class="form-control" id="paid" name="grandTotal"  />
				      <input type="hidden" class="form-control" id="paidValue" name="paidValue" /> -->
				      <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
				    </div>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				    <label for="due" class="col-sm-3 control-label">Due Amount</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="due" name="due" disabled="true" />
				      <input type="hidden" class="form-control" id="dueValue" name="dueValue" />
				    </div>
				  </div> <!--/form-group-->		
				  <div class="form-group">
				    <label for="clientContact" class="col-sm-3 control-label">Payment Type</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentType" id="paymentType">
				      	<option value="2">Cash</option>
				      	<option value="1">Cheque</option>
				      	
				      	<option value="3">Credit Card</option>
				      </select>
				    </div>
				  </div> <!--/form-group-->							  
				  <div class="form-group">
				    <label for="clientContact" class="col-sm-3 control-label">Payment Status</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentStatus" id="paymentStatus">
				      	<option value="1">Full Payment</option>
				      	
				      	<option value="2">Advance Payment</option>
				      	<option value="3">No Payment</option>
				      </select>
				    </div>
				  </div> <!--/form-group-->	
				  <div class="form-group">
				  	<textarea name="transaction_remarks" class="form-control" placeholder="Note...." id="" cols="30" rows="4">Purchased product</textarea>
				  </div><!-- group -->
			  </div> <!--/col-md-6-->


			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
			    </div>
			  </div>
			</form>
	</div>
</div>
















<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/new_purchase1.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">

	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
	      </div>
			
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="msg"></div>

	      	<div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label">Product Image: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" ></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div> <!-- /form-group-->	     	           	       

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group hidden">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="0" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	        
	        
	        <div class="form-group hidden">
	        	<label for="rate" class="col-sm-3 control-label">Purchase Rate </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="purchase" placeholder="Purchase:" value="0" name="purchase" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	   
	         <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Sale Rate </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Sale Rate:" name="rate" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	        


	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Brand Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName" name="brandName">
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1 AND brand_active = 1 ORDER BY brand_name ASC ";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label">Category Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="categoryName" placeholder="Product Name" name="categoryName" >
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1 ORDER BY categories_name ASC";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->					        	         	       

	        <div class="form-group">
	        	<label for="productStatus" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="productStatus" name="productStatus">
				      	
				      	<option value="1">Available</option>
				      	<option value="2">Not Available</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->










<script></script>
<?php include_once "includes/footer.php";?>
<script>
$(document).ready(function () {
	loadProductsUpdated();
});
	function loadProductsUpdated() {
		var abc = "abc";
		// var abc = $('.selectpicker option').length;
		// alert(abc)
		$.ajax({
            url: 'php_action/fetchupdatedProduct.php',
            type: 'POST',
            dataType: "json",
            data: {abc : abc},
            success:function (msg) {
            var tr;
            $.each(msg.data,function(index,value) {
            	tr += '<option value="'+value["product_id"]+'">'+value["product_name"]+'</option>';
            });
            $(".new").append(tr);
            },
            error: function(jqXHR, textStatus, errorThrown) { 
        	/* implementation goes here */
        	console.log(jqXHR); 
        	console.log(textStatus); 
        	console.log(errorThrown); 
    		}
        });//ajax call
	}

    //Save Data into Database
    $("#submitProductForm").on('submit',function(e) {
        e.preventDefault();
        var form = $('#submitProductForm');
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function (msg,status) {
                $('#submitProductForm').each(function(){
                    this.reset();
                });    
                $('#createProductBtn').removeAttr("disabled");
                $('#submitProductForm').css("opacity","");   
                $('#addProductModal').modal('hide');
                $('#msg').text("Product Add Successfully...").addClass("alert alert-success").fadeIn(6000).fadeOut(4000);
				loadProductsUpdated();
            	addRow();
            }
        });//ajax call
    });//main

$(document).on('click','#ic',function () {
	$('#addProductModal').modal('show');
});

$(document).on('keyup',function (e) {
	if (e.altKey && e.which == 65) {
		$('#addProductModal').modal('show');
	}
});


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
</script> 