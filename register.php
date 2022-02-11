<?php

include('inc/connect.php');
include('inc/functions.php');



if(isset($_POST['register'])){
	//senitize incoming data
	$name = $conn->real_escape_string(trim($_POST['name']));	
	$phone = $conn->real_escape_string(trim($_POST['phone']));	
    $address = $conn->real_escape_string(trim($_POST['address']));
    $gender = $conn->real_escape_string(trim($_POST['gender']));
    $age = $conn->real_escape_string(trim($_POST['age']));	
	$password = $conn->real_escape_string(trim($_POST['password']));
	$password = md5($password);
	


	//save to database
	$sql = "INSERT INTO customers (`name`, `phone`, `address`, `gender`, `age`, `password`) 
    VALUES ('{$name}', '{$phone}', '{$address}', '{$gender}', '{$age}', '{$password}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:index.php');
	} else {
	  echo "Error: ".$conn->error;
	}
	
}
$conn->close();

?>
<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<form action="register.php" method="post">
		<label for="name">Name</label><br>
		<input type="text" name="name"  required /><br>

		<label for="phone">Phone</label><br>
		<input type="text" name="phone"  required /><br>

        <label for="address">Address</label><br>
		<textarea name="address"></textarea><br>

        <label for="password">Gender</label><br>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>   <br>

        <label for="age">Age</label><br>
		<input type="number" name="age" min="1" max="110"  required /><br>

		<label for="password">Password</label><br>
		<input type="password" name="password"  required /><br>

		

	


		<br><br>
		<input type="submit" name="register" value="submit"/>
	</form>

</body>
</html>