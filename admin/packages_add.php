<?php

include('../inc/connect.php');
include('../inc/functions.php');

if(isset($_POST['add-package'])){
	//senitize incoming data
	$name = $conn->real_escape_string(trim($_POST['name']));
    $type = $conn->real_escape_string(trim($_POST['type']));	
    $description = $conn->real_escape_string(trim($_POST['description']));
    $price = $conn->real_escape_string(trim($_POST['price']));

	//save to database
	$sql = "INSERT INTO packages (`name`,`type`,`description`,`price`) VALUES ('{$name}', '{$type}', '{$description}', '{$price}')";

	if ($conn->query($sql) === TRUE) {
	  header('Location:packages_list.php');
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

	<form action="packages_add.php" method="post">
		<label for="name">Package Name</label><br>
		<input type="text" name="name"  required /><br>

        <label for="type">Type</label><br>
		<select name="type">
			<?php foreach($departments as $department): ?>

            <option value="<?php echo $department['name'];  ?>"><?php echo $department['name'];  ?></option>
     
        	<?php endforeach; ?>
          
        </select><br>

        <label for="description">Description</label><br>
		<textarea name="description"></textarea><br>

        <label for="price">Price</label><br>
		<input type="number" name="price"  required /><br>
        
        <br><br>
		<input type="submit" name="add-package" value="submit"/>
	</form>

</body>
</html>