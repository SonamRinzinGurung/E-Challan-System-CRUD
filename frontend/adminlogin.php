<!-- Admin login page -->

<!DOCTYPE html>

<head>
  <!--prevent the user from going back to login page until logged out-->
  <script type="text/javascript">
    window.history.forward();
  </script>

  <title>E-Challan System</title>
  <meta charset="utf-8">
  <!--Important links are imported -->


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    body {

      padding: 40px;

    }

    div {
      padding: 5px;
    }
  </style>
</head>

<body>
  <!--This container is main div for login page -->

  <div class="container ">
    <div class="row">
      <div class="col-sm-4 ">
      </div>

      <div class="col-sm-4 border">

        <!-- creating a form that is connected to the backend -->
        <form action="../backend/backend-admin-login.php" method="post">
          <img src="../img/logo.png" alt="logo" width="50%">

       <!--displays error message if required-->
       <?php if (isset($_GET['error'])) { ?>
           <p class="error" style="color:red; text-align: center;"><?php echo $_GET['error']; ?></p>
         <?php } ?>
         <!--displays success message if required-->
         <?php if (isset($_GET['success'])) { ?>
           <p class="error" style="color:green; text-align: center;"><?php echo $_GET['success']; ?></p>
         <?php } ?>

          <!-- Making form group-->
          <div class=" form-group">
            <label for="email"><strong>Username</strong><span style="color: red">*</span></label>
            <input type="text" class="form-control" id="pwd" placeholder="Enter username" name="username" required>
          </div>

          <div class="form-group">
            <label for="pwd"><strong>Password</strong><span style="color: red">*</span></label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
          </div>
          <!--Adding container for button-->
          <div class="container text-center">
            <!--Adding button with the help of bootstrap -->
            <button type="login" class="btn btn-success "><strong>Sign In</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>