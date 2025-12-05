
<?php include_once "includes/header.php" ;



$getCustomer = @$_REQUEST['id'];
if(@$getCustomer){

$Getdata = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM customers WHERE customer_id = '$getCustomer'"));
}

?>
<script type="text/javascript">
	$('#container').removeClass('container');
	$('#container').addClass('container-fluid');

</script>


<div class="col-sm-5">
 <form action="" method="post">
		<div class="panel panel-info">
				<div class="panel panel-heading text-center">Information</div>
				<div class="panel panel-body">
					<?=getMessage(@$msg,@$sts)?>
					<div class="row">
					<div class="col-sm-6">
					
					 	<div class="form-group">
				    <label for="email">Enter Gym Code:</label>
				    <input type="text" class="form-control" id="gym_code" name="gym_code" autofocus="true" placeholder="Enter Gym Code " value="<?=@$Getdata['gym_code']?>">
				  </div>
				  <div class="form-group">
				    <label for="email">Full Name:</label>
				    <input type="text" class="form-control" id="name" name="name" autofocus="true" placeholder="Full Name" value="<?=@$Getdata['customer_name']?>">
				  </div>
				  <div class="form-group">
				    <label for="email">Email:</label>
				    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=@$Getdata['customer_email']?>">
				  </div>
				  <div class="form-group">
				    <label for="email">Phone:</label>
				    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?=@$Getdata['customer_phone']?>">
				  </div>

				  
				   <div class="form-group">
				    <label for="address">Address:</label>
				   <textarea name="address" id="address" cols="30" rows="2" placeholder="Address" class="form-control"><?=@$Getdata['customer_address']?></textarea>
				  </div>
				</div>
				<div class="col-sm-6">

						<div class="form-group">
				    <label for="address">Start Date:</label>
				    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="start_date" value="<?=date('Y-m-d')?>">
				  </div>


					<div class="form-group">
				    <label for="email">Select Plan:</label>
				    <select class="form-control " id="plan" name="plan" required >
			      	<option value="">~~SELECT~~</option>
			      	<?php 
						      	$sql = "SELECT * FROM plans WHERE plan_sts = 1";

										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
					?>
			      </select>
				  </div>


				   <div class="form-group">
				    <label for="active">Status:</label>
				    <select name="status" required class="form-control "> 
				    	<option value="1">Active</option>
				    	<option value="2">Deactive</option>
				    </select>
				  </div>
				  
				  
				 <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <?php
          if($getCustomer){
          	?>
          	 <button type="submit" class="btn btn-success" name="edit_customer">EDIT</button>
          	 <?php
          	}else{
?>
          <button type="submit" class="btn btn-success" name="add_customer">Submit</button>
          <?php
}
          ?>
        </div>
			</div>
			</div>	  
			</form>
				</div>
		</div>

	</div><!-- col-sm-4 end -->
	<div class="col-sm-7">
	<div class="panel panel-info">
		<div class="panel-heading" align="center">
			<h5><span class="glyphicon glyphicon-user"></span> Customer Management system</h5>
		</div>
		<div class="panel-body">
			<div class="mt-5 mb-5" style="float: right;">
	<button type="button" class="btn btn-info  " data-toggle="modal" data-target="#myModal">
	<span class="glyphicon glyphicon-user"></span> Add Customer</button>
</div>
<br/><br/>
<table class="table" id="myTable" class="table-responsive">

	<thead>
		<tr class="">
			<th>Gym Code </th>
			<th>Member Name</th>
			<th>Phone</th>
			
			<th>Created Date</th>
			<th>Edit</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $q=mysqli_query($dbc,"SELECT * FROM customers WHERE customer_active =1 AND customer_type != 'expense'  ");
		while($r=mysqli_fetch_assoc($q)):
			$customer_id = $r['customer_id'];
		 ?>
		<tr>
			<td><?=$r['gym_code']?></td>
			<td class="text-capitalize"><?=$r['customer_name']?></td>
			<td><?=$r['customer_phone']?></td>
			
			<td><?=$r['customer_add_date']?></td>
			<td><a href="customers.php?id=<?=$r['customer_id']?>" class="btn btn-success">Edit</a>
				<a href="memimg.php?id=<?=$r['customer_id']?>&name=<?=$r['customer_name']?>" target="_blank" class="btn btn-info">Image</a>

			</td>
			
		</tr>
	<?php endwhile; ?>
	</tbody>
</table>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title" style="float: left;">Add Customers</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
	        <div class="modal-body">
	          <form action="" method="post">
				  <div class="form-group">
				    <label for="email">Full Name:</label>
				    <input type="text" class="form-control" id="name" name="name" autofocus="true" placeholder="Full Name">
				  </div>
				  <div class="form-group">
				    <label for="email">Email:</label>
				    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label for="email">Phone:</label>
				    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">
				  </div>
				   <div class="form-group">
				    <label for="address">Address:</label>
				   <textarea name="address" id="address" cols="30" rows="4" placeholder="Address" class="form-control"></textarea>
				  </div>
				   <div class="form-group">
				    <label for="active">Status:</label>
				    <select name="status" required class="form-control "> 
				    	<option value="1">Active</option>
				    	<option value="2">Deactive</option>
				    </select>
				  </div>
				  
				 <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="add_customer">Submit</button>
        </div>
				  
			</form>
	        </div>

      </div>
      
    </div>
  </div>
		</div>
	</div>
  </div>


<?php include_once 'includes/footer.php'; ?>