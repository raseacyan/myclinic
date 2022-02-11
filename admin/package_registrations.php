<?php
session_start();
if(isset($_SESSION['user_id'])){
	print_r($_SESSION);
}
?>
<!DOCTYE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
	<?php include('inc/nav.php'); ?>

	<h1>To do</h1>

</body>
</html>