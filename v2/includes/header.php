<?php  require_once 'php_action/core.php';  
      require_once 'inc/code.php';
      
?>



<!DOCTYPE html>
<html>
<head>
  <?php
   $sql = "SELECT * FROM company ORDER BY id ASC LIMIT 1";

                    $result = $connect->query($sql);

                    while($row = $result->fetch_array()) {
                       $company_name  = $row['name'];
                   // while?>

	<title><?php echo $row['name']; ?></title>
  <link rel="icon" href="img/upload/<?php  $row['logo']; ?>" type="image/gif" sizes="16x16"> 
    <?php
    $logo = $row['logo'];
 } 
    ?>
	<!-- bootstrap -->

	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-select.min.css">
  
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
 

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
  <script src="assests/bootstrap/js/bootstrap-select.min.js"></script>
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
  <script>
    $(document).ready(function(){
      $( ".dateField,.hasDatepicker").datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: '1945:'+(new Date).getFullYear(),
          dateFormat:'yy-mm-d' 
        });

       
    });
  </script>
  <style>
    @media print{
      a[href]:after{
        content: none !important;
      }
      .print_hide{
        display: none;
      }
      *{
        margin: 0px;
      }
    }
  </style>
</head>
<body style="padding-top: 70px">


	<nav class="navbar navbar-default navbar-fixed-top">

		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
          <ul class="nav navbar-nav navbar-left">   
          <li><a href="./" class="navbar-brand"><img src="img/uploads/<?=$logo?>" width="60" height="60" class="img img-responsive" style="margin-top:-18px"></a>
          </ul>
      <ul class="nav navbar-nav navbar-right">        
        
      	 <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Vouchers <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="createvoucher.php" target="_blank"> <i class="glyphicon glyphicon-plus"></i> Create Voucher</a></li>            
            <li id="topNavManageOrder"><a href="show_voucher.php" target="_blank"> <i class="glyphicon glyphicon-edit"></i> Search Voucher</a></li>            
          </ul>
        </li> 
        
           
         <li id="navCategories"><a href="plan.php" target="_blank"> <i class="glyphicon glyphicon-magnet"></i> Plans</a></li>     
        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart" target="_blank"></i> Members<span class="caret"></span></a>
          <ul class="dropdown-menu">
                      
           <!--  <li id="topNavAddOrder" target="_blank"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> User management</a></li>  -->           
            
            <li id="topNavManageOrder" target="_blank"><a href="customers.php"> <i class="glyphicon glyphicon-plus"></i> Add Members</a></li> 
            <li id="topNavManageOrder" target="_blank"><a href="customers.php"> <i class="glyphicon glyphicon-bookmark"></i> Member List</a></li>
            
            <li class="divider"></li>
             
          </ul>
        </li>
       


         <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Opreational Report <span class="caret"></span></a>
          <ul class="dropdown-menu">            
               <li id="topNavManageOrder" target="_blank"><a href="expence_report.php"> <i class="glyphicon glyphicon-edit"></i> Expence Report</a></li>  
               <li id="topNavManageOrder" target="_blank"><a href="income_report.php"> <i class="glyphicon glyphicon-edit"></i> Income Report</a></li>            
          </ul>
        </li>  
         <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Finalcial Report <span class="caret"></span></a>
          <ul class="dropdown-menu">            
                   
            
            <li id="topNavManageOrder" target="_blank"><a href="profit_loss.php"> <i class="glyphicon glyphicon-edit"></i> Profit and loss</a></li>
            <li id="topNavManageOrder" target="_blank"><a href="profit_summary.php"> <i class="glyphicon glyphicon-dashboard"></i> Profit Summary</a></li>
                      
          </ul>
        </li>  

        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart" target="_blank"></i> Settings <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavcompany" target="_blank"><a href="company.php"> <i class="glyphicon glyphicon-wrench"></i> Company</a></li>            
           <!--  <li id="topNavAddOrder" target="_blank"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> User management</a></li>  -->           
           <!--  <li id="topNavManageOrder" target="_blank"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>
            <li class="divider"></li>
           
            <li id="topNavManageOrder" target="_blank"><a href="categories.php"> <i class="glyphicon glyphicon-magnet"></i> Category</a></li> 
            <li id="topNavManageOrder" target="_blank"><a href="brand.php"> <i class="glyphicon glyphicon-bookmark"></i> Brand</a></li>
            <li id="topNavManageOrder" target="_blank"><a href="product.php"> <i class="glyphicon glyphicon-edit"></i> Item</a></li>
            <li class="divider"></li> -->
            <li id="topNavManageOrder" target="_blank"><a href="customers.php"> <i class="glyphicon glyphicon-user"></i> Customers</a></li> 
           
            <li id="topNavManageOrder" target="_blank"><a href="chartsofaccount.php"> <i class="glyphicon glyphicon-calendar"></i> Chart of Account</a></li> 
            <li id="topNavManageOrder" target="_blank"><a href="expenses.php"> <i class="glyphicon glyphicon-minus-sign"></i> Enter Expenses</a></li>         
          </ul>
        </li> 

       <!--  <li id="navReport" ><a href="report.php" target="_blank"> <i class="glyphicon glyphicon-check"></i> Report </a></li> -->

        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu"> 
                        
            <li id="topNavSetting" target="_blank"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>            
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>        
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">