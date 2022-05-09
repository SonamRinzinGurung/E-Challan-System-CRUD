<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../frontend/index.html");
}
?>
<?php
include "database_connect.php";


$id = $_POST['id'];

// Attempt update query execution
$sql = "DELETE from traffic_user WHERE id=$id";

if ($con->query($sql) === true) {
    header("Location: ../frontend/view-users.php?success=Successfully Deleted User");

} else {

    header("Location: ../frontend/view-users.php?error=Error while deleting user");
}

// Close connection
$con->close();


