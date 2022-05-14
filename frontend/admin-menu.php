<!-- This page is the admin menu of the web application -->
<?php


session_start();

//check if user is logged in
if (!isset($_SESSION['user'])) {

  //redirect the user to the index page if they are not logged in
  header("Location: index.html");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <title>E-Challan</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />

  <!--google material icon-->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="../css/dashboard.css">

</head>


<body>
  <div class="header">
  <img src="../img/logo.png" alt="logo" width="100px">
    <h1 class="text-uppercase text-light">e-challan</h1>
    <div class="logout">

      <button class="btn btn-outline-danger btn-lg"> <a style="text-decoration:none" href="../backend/backend-logout.php">Log Out</a> </button>

    </div>
  </div>
  <br />
  <div>

    <h3 class="text-center text-uppercase">
      Admin Menu
    </h3>

  </div>
  <br />

  <div class="container">

    <div style="display: flex; align-items: center; column-gap: 100px; justify-content: center;">

      <a href="adminregister.php" class="btn btn-outline-success btn-lg" style="margin: 12px;" title="Create New Admin User"> Create Admin User</a>
      <a href="trafficregister.php" class="btn btn-outline-success btn-lg" title="Create New Traffic User"> Create Traffic User</a> <br><br>
    </div>
    <div style="display: flex; align-items: center; column-gap: 100px; justify-content: center;">

      <a href="admin-view-challan.php" class="btn btn-outline-success btn-lg" style="margin: 12px;" title="View, Edit, Delete, Print Challan"> View Challan</a>
      <a href="view-users.php" class="btn btn-outline-success btn-lg" title="View, Update, Delete Traffic User"> View Users</a><br>
    </div>
    <div style="display: flex; align-items: center; column-gap: 100px; justify-content: center;">
      <a href="trafficlogin.php" class="btn btn-outline-success btn-lg" style="margin-top: 50px;"> Sign In Traffic User</a>
    </div>

  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
</body>

</html>