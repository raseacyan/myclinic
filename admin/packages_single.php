<?php
include('../inc/connect.php');
include('../inc/functions.php');


$package = getPackageById($_GET['id'],$conn);

$registrations = getPackageRegesitrationsByPackageId($_GET['id'],$conn);



?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<h1><?php echo $package['name']. " " . $package['type']; ?></h1>

	<?php if($registrations): ?>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<th>Registered Date</th>
                <th>Expiry Date</th>
                <th>Customer Name</th>
              
			</tr>
			<?php foreach($registrations as $registration): ?>
			<tr>
				<td><?php echo $registration['registered_date']; ?></td>
                <td><?php echo $registration['expiry_date']; ?></td>
                <td><?php echo $registration['customer_name']; ?></td>
                
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>