<?php

session_start();

  // include the file that establishes a databse connection
  include 'database_connect.php';


  //when the login button is clicked
  if( isset($_POST['username']) && isset($_POST['password']) ) {


    //make sure that whitespaces and special characters are handled well
    $uname = trim($_POST['username']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);





        //creating a query to select admin login information from the database
      $res=mysqli_query($con,"SELECT password FROM traffic_user WHERE username='$uname'");
      $row=mysqli_fetch_array($res);

      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

      //if specific row found
      if( $count == 1 && $row['password']==$password ) {

        //set session variable of the admin user as the username
        $_SESSION['user'] = $_POST['username'];

        // on successful login head to the create challan page
        header("Location: ../frontend/traffic-menu.php");
        exit();
        
      
      } else {
        //if incorrect credentials entered, relocate to the login page
        header("Location: ../frontend/trafficlogin.php?error=Invalid username or password");
        exit();
      }

    
  }else {
    //if incorrect credentials entered, relocate to the login page
    header("Location: ../frontend/trafficlogin.php?error=Invalid username or password");
    exit();
  }

?>