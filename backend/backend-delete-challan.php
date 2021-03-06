<?php
session_start();

// check if user is logged in
if (!isset($_SESSION['user']) && !isset($_SESSION['traffic_user'])) {
    header("Location: ../frontend/index.html");
}
?>
<?php

include "database_connect.php";

$challan_id = $_POST['id'];

// Attempt update query execution
$sql = "DELETE from challan WHERE challan_id=$challan_id";

//check if query was executed successfully
if ($con->query($sql) === true) {

    if(isset($_GET['from'])&&$_GET['from']=='admin'){
        header("Location: ../frontend/admin-view-challan.php?success=Successfully Deleted Challan");

    }else{
        header("Location: ../frontend/traffic-view-challan.php?success=Successfully Deleted Challan");

    }

} else {
    if(isset($_GET['from'])&&$_GET['from']=='admin'){
        header("Location: ../frontend/admin-view-challan.php?error=Error while deleting challan");

    }else{
        header("Location: ../frontend/traffic-view-challan.php?error=Error while deleting challan");

    }

}

// Close connection
$con->close();



