<?php
//This is called or when a session auto starts
session_start();


//Isset function checks whether a variable is set here is a location provided.
if (!isset($_SESSION['user'])) {
    header("Location: ../frontend/index.html");
}
?>
<?php
//Include database connection on php.
include "database_connect.php";

//Getting data from the id using POST array from submmited form.
$name = $_POST['name'];
$place = $_POST['place'];
$license_no = $_POST['license_no'];
$vehicle_no = $_POST['vehicle_no'];
$vehicle_type = $_POST['vehicle_type'];

$challan_id = $_POST['challan_id'];
$phone_no = $_POST['phone_no'];
$fine_amount = $_POST['fine_amount'];
$violation_type = trim($_POST['violation_type']);
$violation_desc = trim($_POST['violation_desc']);
$violation_date = trim($_POST['violation_date']);

//validates names
if (preg_match("/^[a-zA-z\s]+$/", $name)) {
    //checks validation of vehicle number
    if (strlen($license_no) == 12 && is_numeric($license_no)) {
        //verifies the phone number (number =10 and is numeric or not
        if (preg_match('/^[A-Za-z]{2,3}+-[0-9]{1,2}+-[A-Za-z]{2,3}+-[0-9]{4}$/', $vehicle_no)) {
            if (preg_match("/^[9]+[7-8]+\d{8}$/", $phone_no)) {
                // Attempt update query execution
                $sql = "UPDATE challan SET name= '$name',place ='$place',license_no='$license_no', vehicle_no = '$vehicle_no', vehicle_type='$vehicle_type', phone_no = '$phone_no',fine_amount = '$fine_amount',violation_type = '$violation_type',violation_desc = '$violation_desc',violation_date='$violation_date' WHERE challan_id=$challan_id";

                //If connection is right there is a message to display "successfully updated."
                if ($con->query($sql) === true) {

                    header("Location: ../frontend/traffic-edit-challan.php?id=$challan_id&success=Successfully Updated Challan");
                } else {
                    header("Location: ../frontend/traffic-edit-challan.php?id=$challan_id&error=Error while editing challan");
                }
            } else {
                header("Location: ../frontend/traffic-edit-challan.php?id=$challan_id&error=Invalid Phone Number");
                exit();
            }
        } else {
            header("Location: ../frontend/traffic-edit-challan.php?id=$challan_id&error=Invalid Vehicle Number");
            exit();
        }
    } else {
        header("Location: ../frontend/traffic-edit-challan.php?id=$challan_id&error=Invalid License Number");
        exit();
    }
} else {
    header("Location: ../frontend/traffic-edit-challan.php?id=$challan_id&error=Invalid Full Name");
    exit();
}


// Close connection
$con->close();
