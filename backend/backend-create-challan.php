<?php
//checks if user logged in or not
session_start();
include "database_connect.php";
if (!isset($_SESSION['traffic_user'])) {
	header("Location: ../frontend/index.html");
}
//checks if user pressed Create button
if (isset($_POST['submit'])) {
	//takes all entered values and stores in variables
	$name = trim($_POST['name']);
	$place = $_POST['place'];
	$license_no = trim($_POST['license_no']);
	$vehicle_no = trim($_POST['vehicle_no']);
	$vehicle_type = trim($_POST['vehicle_type']);
	$phone_no = trim($_POST['phone_no']);
	$fine_amount = ($_POST['fine']);
	$violation_type = trim($_POST['violation_type']);
	$violation_desc = trim($_POST['violation_desc']);
	$violation_date = trim($_POST['violation_date']);

	$created_by = $_SESSION['traffic_user'];
	//checks validation of names
	if (preg_match("/^[a-zA-z\s]+$/", $name)) {
		//checks validation of vehicle number
		if (strlen($license_no) == 12 && is_numeric($license_no)) {
			//checks the validation of vehicle number
			if (preg_match('/^[A-Za-z]{2,3}+-[0-9]{1,2}+-[A-Za-z]{2,3}+-[0-9]{4}$/', $vehicle_no)) {
				//verifies the phone number (number =10 and is numeric or not)
				if (preg_match("/^[9]+[7-8]+\d{8}$/", $phone_no)) {
					$query_add = "INSERT INTO challan(name, place, license_no, vehicle_no, vehicle_type, created_by, phone_no, fine_amount,violation_type,violation_desc,violation_date) VALUES ('$name','$place','$license_no','$vehicle_no','$vehicle_type','$created_by','$phone_no','$fine_amount','$violation_type','$violation_desc','$violation_date')";

					//inserts challan data
					if (mysqli_query($con, $query_add)) {
						//changes url accordingly to display success message
						header("Location: ../frontend/create-challan.php?success=Challan added successfully");
						exit();
					} else {
						// displays error message
						header("Location: ../frontend/create-challan.php?error=Error while adding Challan");
						exit();
					}
				} else {
					header("Location: ../frontend/create-challan.php?error=Invalid Phone Number");
					exit();
				}
			} else {
				header("Location: ../frontend/create-challan.php?error=Invalid Vehicle Number");
				exit();
			}
		} else {
			header("Location: ../frontend/create-challan.php?error=Invalid License Number");
			exit();
		}
	} else {
		header("Location: ../frontend/create-challan.php?error=Invalid Full Name");
		exit();
	}
} else {
	echo '<script>alert("Error while adding Challan!")</script>';
}
