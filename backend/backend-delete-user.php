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
    header("Location: ../frontend/admin-view-users.php?success=Successfully Deleted");

} else {

    header("Location: ../frontend/admin-view-users.php?error=Error while deleting user");
}

// Close connection
$con->close();


