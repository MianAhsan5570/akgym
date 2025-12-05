

<?php 
require_once 'php_action/db_connect.php';

session_start();

$errors = array();

?>	

	

<!DOCTYPE html>
<html>
<head>
<?php
   $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";

                    $result = $connect->query($sql);

                    while($row = $result->fetch_array()) {
                     
                   // while?>
	<title><?php echo $row['name']; ?></title>
    <?php
    $logo = $row['logo'];
 } 
    ?>
	

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">	

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('img/IsR6Au.jpg');background-repeat: no-repeat;background-size: cover;">
	<div class="container">
	<div class="row">
		<div class="container" align="center">
		<div class="col-sm-3"></div>
		<div class="col-sm-6" >
		<img src="img/uploads/<?= $logo; ?>" class="img-responsive">
		</div>

		

		</div>
	</div>
		<div class="row ">
			<div class="col-md-9 col-md-offset-1">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title" align="center">Enter your Gym Code or Phone Number</h3>
					</div>
					<div class="panel-body" align="center">
						<div class="col-md-9">
						
						<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>

						<form class="form-horizontal" action="ajax/markatt.php" method="post" id="loginForm">
							<fieldset>
							  <div class="form-group">
									<label for="username" class="col-sm-6 control-label">Enter Your Gym Code or Phone Number</label>
									<div class="col-sm-6">
									  <input type="number" class="form-control username" id="username" name="username" placeholder="Gym Code Or Phone Number" autocomplete="off" autofocus="true" onchange="markatt(value)" />
									  <input type="text" readonly="" name="" style="width: 1px;height: 1px">
									</div>
								</div>
															
								
							</fieldset>
						</form>

						<fieldset>
							  <div class="form-group ">
									<label for="member_name" class="col-sm-2 control-label">Member Name</label>
									<div class="col-sm-4">
									  <input type="text" class="form-control member_name" id="member_name" name="member_name"  readonly />
									  
									</div>
									<label for="username" class="col-sm-2 control-label">Member Phone</label>
									<div class="col-sm-4">
									  <input type="text" class="form-control " id="phone" name="phone"  readonly />
									  
									</div>
								</div>

								
															
								
							</fieldset>
							<hr/>

							<fieldset>
								<div class="form-group ">
									<label for="username" class="col-sm-2 control-label">Member Plan</label>
									<div class="col-sm-4">
									  <input type="text" class="form-control " id="plan" name="plan"  readonly />
									  
									</div>
									<label for="username" class="col-sm-2 control-label">Fee Expiry Date</label>
									<div class="col-sm-4">
									  <input type="text" class="form-control " id="expiry" name="expiry"  readonly />
									  
									</div>
								</div>

							</fieldset>

							<hr/>
							<fieldset>
								<span class="label label-info welcome" id="welcome" style="font-size: 18px"></span>
							</fieldset>



						</div>
						<div class="col-md-3">
							<div id="imgGet11"><img id="imgGet" src="img/uploads/317846191b28ce8978.png" style="width: 150px"></div>
						</div>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
</body>
</html>
<?php
include_once ('includes/footer.php');
?>


<script type="text/javascript">
	function markatt(value) {


		var a = $(".username").val();
		var d1 = new Date();
		var d2 = new Date();

		//alert(d2);
		$.ajax({
						url : 'ajax/markatt.php',
						type: 'POST',
						data: {gym_code : value},					
						dataType: 'json',
						success:function(response) {
							//console.log(response);
							// reset button

if(response === null){
	$(".username").select();
	 var audio = new Audio('tune.wav');
         audio.play();

         $("#member_name").val('');
		 $("#phone").val('');
		 $("#plan").val('');
		 $("#expiry").val('');
		 $("#welcome").html('Number is Not Exist ' );

}else{


						$(".username").select();

							//alert(response.voucher_enddate);
							
							 var g1 = new Date();
    // (YYYY-MM-DD)
    var g2 = new Date(response.voucher_enddate);
    // alert(g1);
    // alert(g2);
     if (g1.getTime() > g2.getTime()){
         var audio = new Audio('tune.wav');
         audio.play();
         $("#member_name").val(response.customer_name);
		 $("#phone").val(response.customer_phone);
		 $("#plan").val(response.voucher_plan);
		 $("#expiry").val(response.voucher_enddate);
		 $("#welcome").html('You have to pay the fee : '+response.customer_name);
		 $("#imgGet").attr('src','img/uploads/'+response.customer_img);
     }
		
    else{



    	 

 //alert(response.customer_img);

    	 $("#member_name").val(response.customer_name);
		 $("#phone").val(response.customer_phone);
		 $("#plan").val(response.voucher_plan);
		 $("#expiry").val(response.voucher_enddate);
		 $("#welcome").html('Welcome : '+response.customer_name);
		 //$("#imgGet").html('<img src="response.customer_img"></img>');

		 //$("#imgGet").attr('src','img/uploads/'+response.customer_img);
		 $("#imgGet").attr("src","img/uploads/"+response.customer_img);

    	}

}
							
						} // /response
					}); // /ajax
	}
</script>


	