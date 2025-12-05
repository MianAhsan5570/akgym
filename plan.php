<?php include_once "includes/header.php" ;

$getPlan = @$_REQUEST['id'];
if(@$getPlan){

$Getdata = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM plans WHERE plan_id = '$getPlan'"));
}

?>
<div class="col-sm-4">

		<div class="panel panel-info">
				<div class="panel panel-heading text-center">Information</div>
				<div class="panel panel-body">
					<?=getMessage(@$msg,@$sts)?>
					 <form action="" method="post">
					 	
				  <div class="form-group">
				    <label for="email">Plan Name:</label>
				    <input type="text" class="form-control" id="plan_name" name="plan_name" autofocus="true" placeholder="Plan Name" value="<?=@$Getdata['plan_name']?>">
				  </div>
				  <div class="form-group">
				    <label for="email">Plan Fee</label>
				    <input type="number" class="form-control" id="plan_fee" name="plan_fee" placeholder="plan_fee" value="<?=@$Getdata['plan_fee']?>">
				  </div>
				  <div class="form-group">
				    <label for="email">Validity (Enter Only Month number)</label>
				    <input type="number" class="form-control" id="validity" name="validity" placeholder="Validity" value="<?=@$Getdata['validity']?>" min="1" required>
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
          if($getPlan){
          	?>
          	 <button type="submit" class="btn btn-success" name="edit_plan">EDIT</button>
          	 <?php
          	}else{
?>
          <button type="submit" class="btn btn-success" name="add_plan">Submit</button>
          <?php
}
          ?>
        </div>
				  
			</form>
				</div>
		</div>

	</div><!-- col-sm-4 end -->
	<div class="col-sm-8">
	<div class="panel panel-info">
		<div class="panel-heading" align="center">
			<h5><span class="glyphicon glyphicon-user"></span> Plan Management system</h5>
		</div>
		<div class="panel-body">
			
<table class="table" id="myTable" class="table-responsive">

	<thead>
		<tr class="">
			<th>Plan ID</th>
			<th>Plan Name</th>
			<th>Plan Fee</th>
			<th>Plan Validity</th>
			<th>Created Date</th>
			<th>Edit</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $q=mysqli_query($dbc,"SELECT * FROM plans ");
		while($r=mysqli_fetch_assoc($q)):
			
		 ?>
		<tr>
			<td><?=$r['plan_id']?></td>
			<td class="text-capitalize"><?=$r['plan_name']?></td>
			<td class="text-lowercase"><?=$r['plan_fee']?></td>
			<td class=""><?=$r['validity']?> Month</td>
			<td><?=$r['add_datetime']?></td>
			<td><a href="plan.php?id=<?=$r['plan_id']?>" class="btn btn-success">Edit</a></td>
			
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