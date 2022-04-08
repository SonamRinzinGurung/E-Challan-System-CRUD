<!-- Register new Traffic Police user -->

<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: ../frontend/index.php");
    }
// if the Sign Up button is clicked
if (isset($_POST['create'])){


  //store the data from input fields into variables


  $first_name = trim($_POST['first_name']);
  $middle_name = trim($_POST['middle_name']);
  $last_name = trim($_POST['last_name']);
  $username = trim($_POST['username']);
  $passw = $_POST['password'];
  $gender = trim($_POST['gender']);
  $address = $_POST['address'];
  $phone_no = trim($_POST['phone_no']);



    //include the file that establishes a databse connection
    include_once 'database_connect.php';

    $query = "SELECT * FROM admin where username = '$username'";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
	//checks if given username is valid or not
	if ($count > 0) {
		//changes url if username is not valid 
		header("Location: ../frontend/adminregister.php?error=Username already taken");
		exit();
	}else{

        //creating a query to insert the data into the database table of admin
        $q = "insert into admin (first_name, middle_name, last_name, username,password, gender, address, phone_no)values('$first_name','$middle_name','$last_name','$username','$passw','$gender','$address','$phone_no')";
       
        // //passing the query through the established connection
        // $con->query($q);
        
        // // on successful registration move to the login page
        // header("Location: adminlogin.php");
        // exit();

        if (mysqli_query($con, $q)) {
            header("Location: ../frontend/adminregister.php?success=User added successfully");
        } else {
            header("Location: ../frontend/adminregister.php?error=Error while adding user");
        }

}
}else {
	echo '<script>alert("Error while adding user!")</script>';
}

?>
