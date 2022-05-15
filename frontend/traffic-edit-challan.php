<?php
session_start();
if (!isset($_SESSION['traffic_user'])) {
  header("Location: index.html");
}
include "../backend/database_connect.php";

$id = $_GET['id'];
$query = "SELECT * FROM challan where challan_id = '$id'";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0) {
  echo "No Data Found for the id";
  exit;
}
$data = mysqli_fetch_array($result);
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
  <form action="../backend/backend-traffic-edit-challan.php" method="post">
    <div class="container border">
      <div class="row">
       
        <div class="col-sm-5">
        <h1 class="display-5" >Edit Challan Details</h1>
        </div>
        <div class="col-sm-4" id="logo">
           <!--Adding logo of echallan system -->
          <img src="../img/logo.png" width="50%" height="100%">

        </div>
      </div>

      <?php if (isset($_GET['error'])) { ?>
        <p class="error" style="color:red; text-align: center;"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <?php if (isset($_GET['success'])) { ?>
        <p class="error" style="color:green; text-align: center;"><?php echo $_GET['success']; ?></p>
      <?php } ?>
      <!-- Making form group-->
      <div class="form-row">
         <!--Here each row is further divided into 3 equal part- --> 

        <div class="form-group col-md-4">
          <input type="hidden" class="form-control" placeholder="" name="challan_id" required value="<?php echo $id ?>">
          <label for="inputEmail4"><strong>Full Name</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="name" value="<?php echo $data['name'] ?>" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputEmail4"><strong>Place</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="place" value="<?php echo $data['place'] ?>" required>
        </div>

        <div class="form-group col-md-4">
          <label for="inputPassword4"><strong>License No.</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="license_no" value="<?php echo $data['license_no'] ?>" required>
        </div>
      </div>

      <div class="form-row">
         <!--Here each row is further divided into 3 equal part- --> 

        <div class="form-group col-md-4">
          <label for="inputState"><strong>Vehicle Type</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="vehicle_type" value="<?php echo $data['vehicle_type'] ?>" required>
        </div>


        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Phone No.</strong><span style="color: red">*</span></label>
          <input type="number" class="form-control" placeholder="" name="phone_no" max ="9999999999"value="<?php echo $data['phone_no'] ?>" required>
        </div>

        <div class="form-group col-md-4">
          <label for="inputAddress"><strong>Vehicle Number</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="vehicle_no" value="<?php echo $data['vehicle_no'] ?>">
        </div>

      </div>

      <div class="form-row">
         <!--Here each row is further divided into 3 equal part- --> 
         <div class="form-group col-md-4">
          <label for="inputState"><strong>Violation Date</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="violation_date" value="<?php echo $data['violation_date'] ?>" required>
        </div>
        
        <div class="form-group col-md-4">
          <label for="inputState"><strong>Violation Type</strong><span style="color: red">*</span></label>
          <input type="text" class="form-control" placeholder="" name="violation_type" value="<?php echo $data['violation_type'] ?>" required>
        </div>
        
        <div class="form-group col-md-4">
          <label for="inputAddress2"><strong>Violation Description</strong></label>
          <input type = "text" class="form-control" placeholder=""  name="violation_desc" value="<?php echo $data['violation_desc'] ?>" required>
        </div>
      </div>


      <div class="form-row">
         <!--Here each row is further divided into 2 equal part- --> 

        <div class="form-group col-md-4">
          <label for="inputState"><strong>Fine(Amount in Rs)</strong><span style="color: red">*</span></label>
          <select id="inputState" class="form-control" name="fine_amount" value="<?php echo $data['fine_amount'] ?>" required>
            <option selected>500</option>
            <option>1000</option>
            <option>1500</option>
          </select>
        </div>
    
      </div>
       <!--Adding container for button-->
      <div class="container text-center">
        <!--Adding Update  button with the help of bootstrap --> 
        <button type="login" class="btn btn-success" name="create"><strong>Update</strong></button>
      </div>

       <!--Adding container for button-->
      <div class="container text-left">
        <!--Adding Back  button with the help of bootstrap --> 
        <a href="traffic-view-challan.php" class="btn btn-success" role="button">Back to View Page</a>
      </div>
    </div>
  </form>
</body>

</html>