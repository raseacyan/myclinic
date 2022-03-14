<?php

/****************
@Helpers
*****************/
function display($pram){
	echo "<pre>";
	print_r($pram);
	echo "</pre>";
}

function createRecord($table, $data, $conn){

	$values = "";
	$columns = "";
	foreach($data as $k=>$v){
		$columns .= "`".$k."`,";
		$values .= "'".$v."',";
	}
	$columns = substr($columns, 0,-1);
	$values = substr($values, 0,-1);


	$sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
	$result = $conn->query($sql);

	if ($result) {
	  $last_id = $conn->insert_id;
	  return $last_id;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}
}


function updateRecord($table, $data, $id, $conn){

	$set = "";
	foreach($data as $k=>$v){
		$set .= "`".$k."`='".$v."',";
	}
	$set = substr($set, 0,-1);


	$sql = "UPDATE {$table} set {$set} WHERE id={$id}";
	$result = $conn->query($sql);

	if ($result) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}
}

function deleteRecord($table, $id, $conn){
	$sql = "DELETE FROM {$table} WHERE id={$id}";	
	$result = $conn->query($sql);

	if ($result) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}	
}


function redirectTo($url){
	header("location:{$url}");
}


/****************
@Login
*****************/

function checkUserExist($email, $password, $conn){
	$sql = "SELECT id,name FROM users WHERE email = '{$email}' AND password='{$password}'";
    $result = $conn->query($sql);

    if($result){
    	if ($result->num_rows > 0) {
	      $data = array();
	      $row = $result->fetch_assoc();
	      $data = $row;
	      return $data;	      
	    } else {
	        echo "login failed";
	        return false;
	    }
    }else{
    	echo $conn->error;
    	return false;
    }
}

function showLoggedInUser(){	
	$username = $_SESSION['user_name'];
	echo "<p>Logged in as: {$username}</p>";
}

function isLoggedIn(){
	if(isset($_SESSION['user_id'])){
		return true;
	}else{
		return false;
	}
}

/*******************
Appointments
********************/

function getAppointmentsByCustomerId($id, $conn){
	$sql = "SELECT d.name as doctor_name, a.id, a.date, a.time, a.patient_name, a.patient_phone, a.patient_address, a.status, a.token_number
    FROM appointments AS a, doctors AS d
    WHERE a.doctor_id = d.id AND a.customer_id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


/*******************
Departments
********************/

function getDepartments($conn){
	$sql = "SELECT * from departments";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


/*******************
Doctors
********************/

function getDoctors($conn){
	$sql = "SELECT d.id, d.name, d.credentials, d.consultation_time, dpt.name AS department_name  from doctors AS d, departments AS dpt WHERE d.id = dpt.id";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

function getDoctorById($id, $conn){
	$sql = "SELECT * from doctors WHERE id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			$row = $result->fetch_assoc();
			$data = $row;			
			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

/*******************
Packages
********************/

function getPackages($conn){
	$sql = "SELECT * from packages";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}

function getPackageById($id, $conn){
	$sql = "SELECT * from packages WHERE id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			$row = $result->fetch_assoc();
			$data = $row;			
			return $data;            		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


function getPackageByCustomerId($id, $conn){
	$sql = "SELECT pr.registered_date, pr.expiry_date, pr.payment, pk.name, pk.type, pk.price
    FROM package_registrations AS pr, packages AS pk
    WHERE pr.package_id=pk.id AND pr.customer_id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}


function getPackageRegesitrationsByPackageId($id, $conn){
	$sql = "SELECT p.registered_date, p.expiry_date, p.payment, c.name as customer_name
    FROM package_registrations AS p, customers AS c
    WHERE p.customer_id=c.id AND p.package_id={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){
			
			While($row = $result->fetch_assoc()){
				 array_push($data, $row);
			}
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}



/*******************
Customers
********************/

function getCustomerById($id, $conn){
	$sql = "SELECT * from customers WHERE `id`={$id}";
	
	$result = $conn->query($sql);
	if($result){
		$data = array();
		if($result->num_rows > 0){			
			$row = $result->fetch_assoc();	
            $data = $row;	
			return $data;		
		}else{			
			return false;
		}
	}else{
		echo $conn->error;		
		return false;
	}
}




