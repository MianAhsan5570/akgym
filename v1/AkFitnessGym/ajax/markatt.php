
<?php include_once '../php_action/db_connect.php'; 
//print_r($_REQUEST['gym_code']);
$code = $_REQUEST['gym_code'];

$q = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT customers.customer_id,customers.customer_img,customers.customer_name,customers.customer_phone,vouchers.voucher_date,vouchers.voucher_enddate,vouchers.voucher_plan FROM customers INNER join vouchers ON customers.customer_id=vouchers.customer_id WHERE customers.customer_type='customer' AND(customers.customer_phone = '".$code."' OR customers.gym_code = '".$code."') ORDER BY vouchers.voucher_id DESC"));
//echo "SELECT customers.customer_id,customers.customer_name,customers.customer_phone FROM customers INNER join vouchers ON customers.customer_id=vouchers.customer_id WHERE customers.customer_type='customer' AND(customers.customer_phone = '".$code."' OR customers.gym_code = '".$code."')";
//print_r($q['voucher_date']);

$q2 = $q;

echo json_encode($q2);

?>