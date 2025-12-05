<?php require_once 'includes/header.php'; ?>



<div class="row">
	<div class="col-sm-5">
		<div class="panel panel-danger" align="center">
			<div class="panel-heading">
				<h3>Company Profile</h3>
			</div>
			<div class="panel-body" >
				<div class="form-group" >
					<form method="post" action="" enctype="multipart/form-data">
						<h4>Enter Company Name </h4>
						<input type="text" name="name" placeholder="Enter Company Name" class="form-control" value="<?=@$fetchCompany['name']?>" /><br/>
						<h4>Enter Company Logo </h4>
						<?php if(!empty($fetchCompany['logo'])): ?>
							<img src="img/uploads/<?=$fetchCompany['logo']?>" width="100%" height="100" alt="">
						<?php endif; ?>
						<input type="file" name="logo"  class="form-control" value="<?=@$fetchCompany['logo']?>" /><br/>
						<h4>Enter Company Address </h4>
						<input type="text" name="address" placeholder="Enter Company Address" class="form-control" value="<?=@$fetchCompany['address']?>" /><br/>
						<h4>Enter Company Phone  </h4>
						<input type="text" name="company_phone" placeholder="Enter Company Phone" class="form-control" value="<?=@$fetchCompany['company_phone']?>" /><br/>
						<h4>Enter Email Or Website  </h4>
						<input type="text" name="email" placeholder="Enter Email or Website" class="form-control" value="<?=@$fetchCompany['email']?>" /><br/>
						<h4>Enter Personal Phone  </h4>
						<input type="text" name="personal_phone" placeholder="Enter personal Phone" class="form-control" value="<?=@$fetchCompany['personal_phone']?>" /><br/>
						<?=@$company_button; ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-7">
		<div class="panel panel-info"align="center">
			<div class="panel-heading"><h3>Company Profile</h3></div>
			<div class="panel-body">
					<?php
						$mysql_qry = "SELECT * from company";

							$qry_run = mysqli_query($dbc,$mysql_qry);
							if(!$qry_run){
								echo mysqli_error();
								}

							while($ary = mysqli_fetch_array($qry_run)){
								$name 		= $ary['name'];
								$logo  		= $ary['logo'];
								$address    = $ary['address'];
								$Company_phone = $ary['company_phone'];
								$personal_phone = $ary['personal_phone'];
								$email= $ary['email'];
?>						
						<!--comany well edit-->
							<div class="panel panel-warning">
								<div class="panel-body " >
									<div style="float: left; font-size: 20px;">Edit Your Company Profile </div>

									<div class="" style="float: right;">
										<a class="btn btn-sm btn-primary" href="company.php?company_edit=<?=$ary['id']?>" >
										<span class="glyphicon-edit"></span>Edit</a>
									</div>		
								</div>
							</div>
								<!--comany well edit end-->
					<!--company logo-->
						<div class="col-sm-6">

						<h3>Company Logo</h3>
						<img src="img/uploads/<?php echo $logo ?>" class="img-thumbnail img-responsive" /><br>

						<h2  >This Information Are Automatically put on you bills report or also company logo </h2>
						</div>
					<!--company logo end-->
						<div class="col-sm-6">

						<h3>Company Name :</h3><strong><?php echo strtoupper($name) ?></strong>
						<hr/>
						<h3>Company Address :</h3><strong><?php echo strtoupper($address) ?></strong>
						
						<h3>Company Phone :</h3><strong><?php echo strtoupper($Company_phone) ?></strong>
						
						<h3>Personal Phone :</h3><strong><?php echo strtoupper($personal_phone) ?></strong>
						
						<h3>Email Or web :</h3><a href="$email"><strong><?php echo strtoupper($email) ?></strong></a>
						
						
						</div>
<?php

							}

					?>
			</div>
		</div>
	</div>
</div><!--row-->


<?php require_once 'includes/footer.php'; ?>
