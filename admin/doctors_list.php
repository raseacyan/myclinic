<?php
include('../inc/connect.php');
include('../inc/functions.php');


$doctors = getDoctors($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<?php if($doctors): ?>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<th>Name</th>
                <th>Credentials</th>
                <th>Consultation Time</th>
                <th>Department</th>
			</tr>
			<?php foreach($doctors as $doctor): ?>
			<tr>
				<td><?php echo $doctor['name']; ?></td>
                <td><?php echo $doctor['credentials']; ?></td>
                <td><?php echo nl2br($doctor['consultation_time']); ?></td>
                <td><?php echo $doctor['department_name']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>