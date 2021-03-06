<!-- Register new Traffic Users page -->

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
  <!-- creating form that is connected to the backend -->
  <form action="../backend/backend-registertraffic.php" method="post">
    <div class="container border">
      <div class="row">
        <div class="col-sm-5">
          <h1 class="display-5" >Register Traffic User</h1>
        </div>
        <!-- Here in this column all form is grouped-->
        <div class="col-sm-4">
          <!--Adding logo of echallan system -->
          <img src="../img/logo.png" width="50%" height="100%" alt="logo">

        </div>
      </div>

 <!--displays error message if errror occured-->
 <?php if (isset($_GET['error'])) { ?>
        <p class="error" style="color:red; text-align: center;"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <!--displays success message if successful register-->
      <?php if (isset($_GET['success'])) { ?>
        <p class="error" style="color:green; text-align: center;"><?php echo $_GET['success']; ?></p>
      <?php } ?>

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
      <div class="">
          <label for="inputState" class="" id=""><strong>Province</strong></label><br>
          <select id="inputState" name="perma_province"  class="btn btn-primary dropdown-toggle " required>

            <option> Province 1</option>
            <option> Province 2</option>
            <option> Province 3</option>
            <option> Province 4</option>
            <option> Province 5</option>
            <option> Province 6</option>
            <option> Province 7</option>
          </select><br> <br>
      
        </div>

        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Permanent Address</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="perma_address">
        </div>
        
      </div>

      <div class="form-row">
        <div class="">
          <label for="inputState" class="" id=""><strong>Province</strong></label><br>
          <select id="inputState" name="temp_province"  class="btn btn-primary dropdown-toggle " required>

            <option> Province 1</option>
            <option> Province 2</option>
            <option> Province 3</option>
            <option> Province 4</option>
            <option> Province 5</option>
            <option> Province 6</option>
            <option> Province 7</option>
          </select><br> <br>
      
        </div>

        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Temporary Address</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="temp_address">
        </div>

      </div>

      <div class="form-row">

      <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Post Address</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="post_address">
        </div>

        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Phone No.</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="phone_no" required>
        </div>
         
      </div>

      <!--Adding container for button-->
      <div class="container text-center">
        <!--Adding Create  button with the help of bootstrap -->
        <button type="login" class="btn btn-success" name="create"><strong>Create Traffic User</strong></button>
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