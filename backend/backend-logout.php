<!-- This php file destroys the session and logs the uer out of the system -->

<?php
//checking if user is logged in or not
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['traffic_user'])){
	header("Location: ../frontend/index.html");
}

//destroying the session with its variable
session_destroy();

//returning back to index page
header("Location: ../frontend/index.html");
