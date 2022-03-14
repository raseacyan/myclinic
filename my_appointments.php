<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');


$appointments =  getAppointmentsByCustomerId($_SESSION['user_id'],$conn);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<?php if($appointments): ?>
		<table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<th>Appointment Number</th>
                <th>Doctor Name</th>
                <th>Patient Name</th>
				<th>Patient Phone</th>
                <th>Patient Address</th>
                <th>Status</th>
                <th>Token Number</th>
                
			</tr>
			<?php foreach($appointments as $appointment): ?>
			<tr>
				<td><?php echo $appointment['id']; ?></td>
                <td><?php echo $appointment['doctor_name']; ?></td>
                <td><?php echo $appointment['patient_name']; ?></td>
				<td><?php echo $appointment['patient_phone']; ?></td>
                <td><?php echo $appointment['patient_address']; ?></td>
                <td><?php echo $appointment['status']; ?></td>
                <td><?php echo $appointment['token_number']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</table>
	<?php else: ?>	
		<p>No Records</p>
	<?php endif; ?>

		
</body>
</html>