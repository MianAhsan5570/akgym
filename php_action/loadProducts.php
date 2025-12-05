<?php 
	require_once 'core.php';

 ?>
 <?php if(isset($_REQUEST['limit'])):
 $limit = $_REQUEST['limit'];
 $offset  = $_REQUEST['offset'];
  ?>
 	<?php $q=mysqli_query($dbc,"SELECT * FROM product  LIMIT $limit OFFSET $offset");
						while($r=mysqli_fetch_assoc($q)):
						 ?>
						<tr>
							<td><?=$r['product_image']?></td>
							<td><?=$r['product_name']?></td>
							<td><?=$r['rate']?></td>
							<td><?=$r['quantity']?></td>
						</tr>
					<?php endwhile; ?>
				<?php endif; ?>