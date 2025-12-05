

<?php 
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['userId'])) {
	header('location: dashboard.php');	
}

$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];

				// set session
				$_SESSION['userId'] = $user_id;

				header('location: dashboard.php');	
			} else{
				
				$errors[] = "Incorrect username/password combination";
			} // /else
		} else {		
			$errors[] = "Username doesnot exists";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
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
<body>
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
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title" align="center">Please Sign in</h3>
					</div>
					<div class="panel-body" align="center">
						
						<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
							  <div class="form-group">
									<label for="username" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" />
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-info"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button>
									</div>
								</div>
							</fieldset>
						</form>
						<p>
							<a href="attendance.php">Attendance Screen</a>
						</p>
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





	