<?php
include('../inc/connect.php');
include('../inc/functions.php');


$packages = getPackages($conn);

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
				<th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
			</tr>
			<?php foreach($packages as $package): ?>
			<tr>
				<td><?php echo $package['name']; ?></td>
                <td><?php echo $package['type']; ?></td>
                <td><?php echo nl2br(substr($package['description'], 0, 50))." ..."; ?></td>
                <td><?php echo $package['price']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>