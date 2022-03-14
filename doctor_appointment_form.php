<?php
session_start();
include('inc/connect.php');
include('inc/functions.php');

$doctor_id = (isset($_GET['id']))?$_GET['id']:0;

$doctor = getDoctorById($doctor_id, $conn);
$customer = getCustomerById($_SESSION['user_id'], $conn);

if(isset($_POST['appointment'])){

    //save to database
    $table = "appointments";
    $data = array(
        "date" => $conn->real_escape_string(trim($_POST['date'])),
        "time" => $conn->real_escape_string(trim($_POST['time'])),
        "patient_name" => $conn->real_escape_string(trim($_POST['patient_name'])),
        "patient_phone" => $conn->real_escape_string(trim($_POST['patient_phone'])),
        "patient_address" => $conn->real_escape_string(trim($_POST['patient_address'])),
        "patient_age" => $conn->real_escape_string(trim($_POST['patient_age'])),
        "new_patient" => $conn->real_escape_string(trim($_POST['new_patient'])),
        "doctor_id" => $conn->real_escape_string(trim($_POST['doctor_id'])),
        "customer_id" => $conn->real_escape_string(trim($_POST['customer_id'])),
        "status" => "tbc"       

    );
    
    $save = createRecord($table, $data, $conn);

    if($save){
        redirectTo("my_appointments.php");
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

    <p>
        <strong>Doctor Name:</strong> <?php echo $doctor['name']; ?> <br>
        <strong>Consultation Time:</strong> <?php echo $doctor['consultation_time']; ?>

    </p>



    <?php if($doctor): ?>

        <h3>Appointment Form</h3>


        <form action="doctor_appointment_form.php" method="post">

            Doctor: <input type="text" name="doctor_name" value="<?php echo $doctor['name']; ?>" disabled="disabled"/><br>

            Date: <input type="date" name="date" /><br>
            Time: <input type="time" name="time" /><br>
            Patient: <input type="text" name="patient_name" value="<?php echo $customer['name']; ?>" /><br>
            Patient Age: <input type="text" name="patient_age" value="<?php echo $customer['age']; ?>" /><br>
            Patient Phone: <input type="text" name="patient_phone" value="<?php echo $customer['phone']; ?>" /><br>
            Patient Address: <input type="text" name="patient_address" value="<?php echo $customer['address']; ?>" /><br>
            Patient Age: <input type="text" name="patient_age" value="<?php echo $customer['age']; ?>" /><br>
            New Patient: 
            <input type="radio" name="new_patient" value="1"> Yes
            <input type="radio" name="new_patient" value="0"> No 

            <input type="hidden" name="doctor_id" value="<?php echo $doctor['id']; ?>" />
            <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>" />
        

            
     
        <br><br><input type="submit" name="appointment" value="Confirm"/>
        </form>

    <?php else: ?>
        <p>No records.</p>
    <?php endif; ?>

    

	

</body>
</html>