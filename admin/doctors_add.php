<?php

include('../inc/connect.php');
include('../inc/functions.php');

if(isset($_POST['add-doctor'])){
	//senitize incoming data
	$name = $conn->real_escape_string(trim($_POST['name']));	
    $credentials = $conn->real_escape_string(trim($_POST['credentials']));
    $consultation_time = $conn->real_escape_string(trim($_POST['consultation_time']));
    $department_id = $conn->real_escape_string(trim($_POST['department_id']));

	//save to database
    $consultation_time = $conn->real_escape_string(trim($_POST['consultation_time']));
	$sql = "INSERT INTO doctors (`name`,`credentials`,`consultation_time`,`department_id`) VALUES ('{$name}', '{$credentials}','{$consultation_time}','{$department_id}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:doctors_list.php');
	} else {
	  echo "Error: ".$conn->error;
	}
	
}
$departments = getDepartments($conn);


$conn->close();
?>
<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<form action="doctors_add.php" method="post">
		<label for="name">Name</label><br>
		<input type="text" name="name"  required /><br>

        <label for="credentials">Credentials</label><br>
		<input type="text" name="credentials"  required /><br>

        <label for="consultation_time">Consultation Time</label><br>
		<textarea name="consultation_time"></textarea>

        <label for="department_id">Department</label><br>
		<select name="department_id">
			<?php foreach($departments as $department): ?>
				<option value="<?php echo $department['id']; ?>"><?php echo $department['name']; ?></option>
			<?php endforeach; ?>
		</select>
        
        <br><br>
		<input type="submit" name="add-doctor" value="submit"/>
	</form>

</body>
</html>