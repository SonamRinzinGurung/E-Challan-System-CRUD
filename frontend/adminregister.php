<!-- Register new Admin page -->

<?php
session_start();

//check if user is logged in
if (!isset($_SESSION['user'])) {

  //redirect the user to the index page if they are not logged in
  header("Location: index.html");
}
?>
<!DOCTYPE html>

<head>
  <title>E-Challan System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--Important links are imported -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--Connecting with CSS- -->
  <link rel="stylesheet" href="../css/addUser.css">
</head>

<body>

  <!-- creating a form that is connected to the backend -->
  <form action="../backend/backend-registeradmin.php" method="post">
    <div class="container border border-success">
      <div class="row">
        <div class="col-sm-5">
        </div>
        <!-- Here in this column all form is grouped-->
        <div class="col-sm-4">
          <!--Adding logo of echallan system -->
          <img src="../img/logo.png" width="50%" height="100%" alt="logo">

        </div>
      </div>


      <!-- Making form group-->

      <div class="form-row">
        <!--Here each row is further divided into 3 equal part- -->
        <div class="form-group requried col-md-4">
          <label for="inputEmail4"><strong>First Name</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="first_name" required>
        </div>

        <div class="form-group col-md-4">
          <label for="inputEmail4"><strong>Middle Name</strong></label>
          <input type="text" class="form-control" placeholder="" name="middle_name">
        </div>

        <div class="form-group col-md-4">
          <label for="inputPassword4"><strong>Last Name</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="last_name" required>
        </div>
      </div>

      <div class="form-row">
        <!--Here each row is further divided into 3 equal part- -->
        <div class="form-group col-md-4">
          <label for="inputState"><strong>Gender</strong><span style="color: red">*</span></label>
          <select id="inputState" class="form-control" name="gender" required>
            <option selected>Male</option>
            <option>Female</option>
          </select>
        </div>


        <div class="form-group col-md-4">
          <label for="inputAddress"><strong>Username</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="username" required>
        </div>

        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Password</strong><span style="color: red">*</span></label>
          <input type="password" class="form-control" placeholder="" name="password" required>
        </div>

      </div>


      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Address</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="address">
        </div>

        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Phone No.</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="phone_no" required>
        </div>



      </div>


      <!--Adding container for button-->
      <div class="container text-center">
        <!--Adding Create  button with the help of bootstrap -->
        <button type="login" class="btn btn-success" name="create"><strong>Create Admin</strong></button>
      </div>
      <!--Adding container for button-->
      <div class="container text-left">
        <!--Adding go back to dashboard button with the help of bootstrap -->
        <a href="admin-menu.php" class="btn btn-info" role="button">Go back to Admin Dashboard</a>
      </div>
    </div>
  </form>
</body>

</html>