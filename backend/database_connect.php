<!-- This file is used to establish a connection to the MySQL database -->

<?php

$host = "localhost";
$location = "root";
$password = "";
$database_name = "e-challan-db";

//establishing a connection with MySQL databse
$con = new mysqli($host,$location,$password,$database_name);

?>
