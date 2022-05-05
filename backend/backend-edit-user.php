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
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$perma_province = $_POST['perma_province'];
$perma_address = $_POST['perma_address'];
$post_address = $_POST['post_address'];
$phone_no = $_POST['phone_no'];

//validates name
if (preg_match("/^[a-zA-z]+$/", $first_name) && preg_match("/^[a-zA-z]+$/", $last_name)) {
    //checks validation of phone number
    if (preg_match("/^[9]+[7-8]+\d{8}$/", $phone_no)) {
        // Attempt update query execution
        $sql = "UPDATE traffic_user SET first_name= '$first_name',middle_name ='$middle_name',last_name='$last_name',gender='$gender',perma_province = '$perma_province', perma_address= '$perma_address',post_address='$post_address',phone_no = '$phone_no' WHERE id=$id";
        //If connection is right there is a message to display "successfully updated."
        if ($con->query($sql) === true) {
            header("Location: ../frontend/edit-user.php?id=$id&success=Successfully Updated");
        } else {

            header("Location: ../frontend/edit-user.php?id=$id&error=Error while editing user");
        }
    } else {
        header("Location: ../frontend/edit-user.php?id=$id&error=Invalid phone number");
        exit();
    }
} else {
    header("Location: ../frontend/edit-user.php?id=$id&error=Invalid Name");
    exit();
}

// Close connection
$conn->close();
