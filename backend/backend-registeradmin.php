<!-- Register new Admin user -->

<?php

session_start();

//check if user is logged in
if (!isset($_SESSION['user'])) {

    //if user is not logged in, relocate the user to the index page
    header("Location: ../frontend/index.html");
}

// if the Sign Up button is clicked
if (isset($_POST['create'])) {


    //store the data from input fields into variables


    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $passw = $_POST['password'];
    $gender = trim($_POST['gender']);
    $perma_province = $_POST['perma_province'];
    $perma_address = $_POST['perma_address'];
    $temp_province = $_POST['temp_province'];
    $temp_address = $_POST['temp_address'];
    $post_address = $_POST['post_address'];
    $phone_no = trim($_POST['phone_no']);

    if (preg_match("/^[a-zA-z]+$/", $first_name) && preg_match("/^[a-zA-z]+$/", $last_name)) {
	

				//verifies the phone number (number =10 and is numeric or not)
				if (preg_match("/^[9]+[7-8]+\d{8}$/", $phone_no)) {

				    //include the file that establishes a databse connection
                    include_once 'database_connect.php';

                    //check if username is already taken
                    $query = "SELECT * FROM admin where username = '$username'";
                    $result = mysqli_query($con, $query);
                    $count = mysqli_num_rows($result);
                    //checks if given username is valid or not
                    if ($count > 0) {
                
                        //refresh the page if username already exists
                        header("Location: ../frontend/adminregister.php?error=Username already taken");
                        exit();
                    } else {
                
                        //creating a query to insert the data into the database table of admin
                        $q = "insert into admin (first_name, middle_name, last_name, username,password, gender, perma_province,perma_address,temp_province,temp_address,post_address,phone_no)values('$first_name','$middle_name','$last_name','$username','$passw','$gender','$perma_province','$perma_address','$temp_province','$temp_address','$post_address','$phone_no')";
                
                        //if the data is inserted successfully into the database
                        if (mysqli_query($con, $q)) {
                
                            //refresh the page with updated url
                            header("Location: ../frontend/adminregister.php?success=User added successfully");
                            exit();
                        } else {
                            //if some error occured with database
                            header("Location: ../frontend/adminregister.php?error=Error while adding user");
                            exit();
                        }
                    }


				} else {
					header("Location: ../frontend/adminregister.php?error=Invalid Phone Number");
					exit();
				}
		
		
	} else {
		header("Location: ../frontend/adminregister.php?error=Invalid Full Name");
		exit();
	}


} else {
    //if some error occured
    header("Location: ../frontend/adminregister.php?error=Error while adding user");
    exit();
}

?>