<?php
session_start();
if (!isset($_SESSION['user'])) {
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
  <form action="../backend/backend-create-challan.php" method="post">
    <div class="container border">
   
      <div class="row">

        <div class="col-sm-5">
          
        </div>

        <div class="col-sm-4" id="logo">
           <!--Adding logo of echallan system -->
          <img src="../img/logo.png" width="50%" height="100%" alt="Logo">

        </div>
      </div>

      <!--displays error message if required-->
      <?php if (isset($_GET['error'])) { ?>
        <p class="error" style="color:red; text-align: center;"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <!--displays success message if required-->
      <?php if (isset($_GET['success'])) { ?>
        <p class="error" style="color:green; text-align: center;"><?php echo $_GET['success']; ?></p>
      <?php } ?>
     
      <div class="form-row">
         <!--Here each row is further divided into 3 equal part- --> 
        <div class="form-group col-md-4">
          <label for="inputEmail4"><strong>Full Name</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="name" required>
        </div>

        <div class="form-group col-md-4">
          <label for="inputEmail4"><strong>Place of Violation</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="place" required>
        </div>

        <div class="form-group col-md-4">
          <label for="inputPassword4"><strong>License No.</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="license_no" required>
        </div>
      </div>

     

      <div class="form-row">
         <!--Here each row is further divided into 3 equal part- --> 
        <div class="form-group col-md-4">
          <label for="inputState"><strong>Vehicle Type</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="vehicle_type" required>
        </div>

        <div class="form-group col-md-4">
          <label for="inputAddress"><strong>Vehicle Number</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="sa-10-pa-1234" name="vehicle_no" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Phone No.</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="phone_no" required>
        </div>
      </div>

      <div class="form-row">
         <!--Here each row is further divided into 3 equal part- --> 
         <div class="form-group col-md-4">
          <label for="inputState"><strong>Violation Date</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="violation_date" required>
        </div>
        
        <div class="form-group col-md-4">
          <label for="inputState"><strong>Violation Type</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="violation_type" required>
        </div>
        
        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Violation Description</strong></label>
          <input type="text" class="form-control" placeholder="" name="violation_desc" required>
          
        </div>
      </div>

      <div class="form-row">
      <div class="form-group col-md-4">
          
          <label for="inputState"><strong>Fine(Amount in Rs)</strong><span style="color: red">*</span></label>
          <select id="inputState" class="form-control" name="fine" required>
            <option selected>500</option>
            <option>1000</option>
            <option>1500</option>
          </select>
        </div>
      </div>


      <!--Adding Create  button with the help of bootstrap --> 
      <div class="container text-center">
        <button type="login" class="btn btn-success" name="submit"><strong>Create Challan</strong></button>
      </div>
       <!--Adding container for button--> 
      <div class="container text-left">
        <!--Adding go back to dashboard button with the help of bootstrap --> 
        <a href="traffic-menu.php" class="btn btn-success" role="button">Go back to Traffic Menu</a>
      </div>
    </div>
  </form>
</body>

</html>