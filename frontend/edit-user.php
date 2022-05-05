<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: index.html");
}
include "../backend/database_connect.php";

$id = $_GET['id'];
$query = "SELECT * FROM traffic_user where id = '$id'";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0) {
    echo "No Data Found for the id";
    exit;
}

$data = mysqli_fetch_array($result);


?>

<!DOCTYPE html>

<head>
    <title>Echallen System</title>
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
<form action="../backend/backend-edit-user.php" method="post">
    <div class="container border">
        <div class="row">
            <div class="col-sm-5">
            </div>
            <div class="col-sm-4">
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
                <input type="hidden" class="form-control" placeholder="" name="id" required value="<?php echo $id ?>">
                <label for="inputEmail4"><strong>First Name</strong><span style="color: red">*</span></label>
                <input type="text" class="form-control" placeholder="" name="first_name"
                       value="<?php echo $data['first_name'] ?>" required>
            </div>

            <div class="form-group col-md-4">
                <label for="inputEmail4"><strong>Middle Name</strong></label>
                <input type="text" class="form-control" placeholder="" name="middle_name"
                       value="<?php echo $data['middle_name'] ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="inputPassword4"><strong>Last Name</strong><span style="color: red">*</span></label>
                <input type="text" class="form-control" placeholder="" name="last_name" required
                       value="<?php echo $data['last_name'] ?>" required>

            </div>
        </div>

        <div class="form-row">
              <!--Here each row is further divided into 3 equal part- --> 
            <div class="form-group col-md-4">
                <label for="inputState"><strong>Gender</strong><span style="color: red">*</span></label>
                <select id="inputState" class="form-control" name="gender" required
                        value="<?php echo $data['gender'] ?>" required>
                    <option selected>Male</option>
                    <option>Female</option>

                </select>
            </div>


            <div class="form-group col-md-4">
                <label for="inputAddress"><strong>Username</strong><span style="color: red">*</span></label>
                <input type="text" class="form-control" placeholder="" name="username" required readonly
                       value="<?php echo $data['username'] ?>" required>

            </div>
        
        </div>

        <div class="form-row">
              <!--Here each row is further divided into 3 equal part- --> 
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
                <label for="inputAddress2"><strong>Address</strong> <span style="color: red">*</span></label>
                <input type="text" class="form-control" placeholder="" name="perma_address"
                       value="<?php echo $data['perma_address'] ?>" required>
            </div>

            <div class="form-group col-md-4">
                <label for="inputAddress2"><strong>Post Address</strong> <span style="color: red">*</span></label>
                <input type="text" class="form-control" placeholder="" name="post_address"
                       value="<?php echo $data['post_address'] ?>" required>
            </div>
            
            
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputAddress2"><strong>Phone No.</strong><span style="color: red">*</span></label>
                <input type="number" class="form-control" placeholder="" name="phone_no" max="9999999999" required
                       value="<?php echo $data['phone_no'] ?>" required>
            </div>

        </div>
  
       <!--Adding container for button-->
        <div class="container text-center">
             <!--Adding Update  button with the help of bootstrap --> 

            <button type="login" class="btn btn-success" name="create"><strong>Update</strong></button>
        </div>
        <div class="container text-left">
            <!--Adding Back  button with the help of bootstrap -->
            <a href="view-users.php" class="btn btn-primary" role="button">Go Back To View Users</a>
        </div>
    </div>
</form>
</body>

</html>