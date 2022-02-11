<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');

$package_id = null;


if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['pid'])){
    $package_id = $_GET['pid']; 
    $package = getPackageById($package_id, $conn);
}else{
    header('location:packages.php');
}

$customer = getCustomerById($_SESSION['user_id'], $conn);
$today = date("Y-m-d");
$registered_date = $today;
$expiry_date = date('Y-m-d', strtotime($registered_date. "+ 365 days"));

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['package-register'])){
    
	//senitize incoming data
	$registered_date = $conn->real_escape_string(trim($_POST['registered_date']));
    $expiry_date = $conn->real_escape_string(trim($_POST['expiry_date']));
    $payment = "unpaid";	
    $package_id = $conn->real_escape_string(trim($_POST['package_id']));
    $customer_id = $conn->real_escape_string(trim($_POST['customer_id']));

	//save to database
	$sql = "INSERT INTO package_registrations (`registered_date`,`expiry_date`,`payment`,`package_id`, `customer_id`) 
    VALUES ('{$registered_date}', '{$expiry_date}', '{$payment}', '{$package_id}', {$customer_id})";
   
	if ($conn->query($sql) === TRUE) {
	  header('Location:my_packages.php');
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

    <h3>Package Info</h3>
    <p>
    Package: <?php echo $package['type']." ".$package['name']; ?> <br>
    Price: <?php echo $package['price']; ?> 
    </p>

    <h3>Registration Info</h3>
    <p>
    
    Register Date: <?php echo $registered_date; ?> <br>
    Expiry Date: <?php echo $expiry_date; ?> <br>
     
    </p>
    <h3>Customer Info</h3>
    <p>
    Customer Name: <?php echo $customer['name']; ?> <br>
    Customer Phone: <?php echo $customer['phone']; ?> 
    </p>

	<form action="package_register.php" method="post">
		
        <input type="hidden" name="registered_date" value="<?php echo $registered_date;?>"/>
        <input type="hidden" name="expiry_date" value="<?php echo $expiry_date;?>"/>
        <input type="hidden" name="package_id" value="<?php echo $package['id'];?>"/>
        <input type="hidden" name="customer_id" value="<?php echo $customer['id'];?>"/>

            
     
		<input type="submit" name="package-register" value="Confirm"/>
	</form>

</body>
</html>