<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');


$packages =  getPackageByCustomerId($_SESSION['user_id'],$conn);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<?php if($packages): ?>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr>
                <th>Package Name</th>
                <th>Package Type</th>
				<th>Registered Date</th>
                <th>Expiry Date</th>
                <th>Price</th>
                <th>Payment</th>
                
			</tr>
			<?php foreach($packages as $package): ?>
			<tr>
                <td><?php echo $package['name']; ?></td>
                <td><?php echo $package['type']; ?></td>
				<td><?php echo $package['registered_date']; ?></td>
                <td><?php echo $package['expiry_date']; ?></td>
                <td><?php echo $package['price']; ?></td>
                <td><?php echo $package['payment']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>