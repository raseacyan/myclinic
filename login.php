<?php

session_start();

include('inc/connect.php');
include('inc/functions.php');

if(isset($_POST['register'])){
	//senitize incoming data

	$phone = $conn->real_escape_string(trim($_POST['phone']));	
	$password = $conn->real_escape_string(trim($_POST['password']));
	$password = md5($password);

	$sql = "SELECT * FROM customers WHERE phone = '{$phone}' AND password='{$password}'";
    $result = $conn->query($sql);

    if($result){
    	if ($result->num_rows > 0) {
	      
	      $row = $result->fetch_assoc();

	      $_SESSION['user_id'] = $row['id'];
	      $_SESSION['user_name'] = $row['name'];   

	      header('Location:index.php');
	      
	    } else {
	        echo "login failed";
	    }

    }else{
    	echo $conn->error;
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

	<form action="login.php" method="post">
	

		<label for="phone">Phone</label><br>
		<input type="text" name="phone"  required /><br>

		<label for="password">Password</label><br>
		<input type="password" name="password"  required /><br>

		


		<br><br>
		<input type="submit" name="register" value="submit"/>
	</form>

</body>
</html>