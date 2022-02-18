<?php

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
	$sql = "SELECT d.name, d.credentials, d.consultation_time, dpt.name AS department_name  from doctors AS d, departments AS dpt WHERE d.id = dpt.id";
	
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




