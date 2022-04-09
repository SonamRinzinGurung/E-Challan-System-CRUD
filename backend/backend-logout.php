<?php
//checking if user is logged in or not
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: ../frontend/index.html");
}
//destroying the session with its variable
session_destroy();
//returning back to login page
header("Location: ../frontend/index.html");
echo '<script>alert("You have been Logged out!!")</script>';
?>
