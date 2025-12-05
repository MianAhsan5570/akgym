<?php  include_once "db_connect.php";?>
<?php

	
$mysql_qry = "SELECT * from orders";
if(!$mysql_qry){
	echo mysql_error();
	}

$qry_run = mysql_query($mysql_qry);
if(!$qry_run){
	echo mysql_error();
	}
echo "<tr>";
while($ary = mysql_fetch_array($qry_run)){

echo	'<td style="text-align:center;">'.$ary['client_name']."</td>";
echo	'<td style="text-align:center;">'.$ary['client_contect']."</td>";
}

?>