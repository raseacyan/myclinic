<?php
include('../inc/connect.php');
include('../inc/functions.php');


$departments = getDepartments($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<?php if($departments): ?>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<th>Name</th>
			</tr>
			<?php foreach($departments as $department): ?>
			<tr>
				<td><?php echo $department['name']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>