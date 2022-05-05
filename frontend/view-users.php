<?php
//checks if user is logged in or not
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
}

include "../backend/database_connect.php";
$query = "SELECT * FROM traffic_user";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/addUser.css">

    <title>E-challan System</title>
</head>

<body>
<div class="container border">


    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Userame</th>
            <th scope="col">Gender</th>
            <th scope="col">Province</th>
            <th scope="col">Address</th>
            <th scope="col">Post Address</th>
            <th scope="col">PhoneNumber</th>



        </tr>
        </thead>
        <tbody>
        <?php
        //displays all data avaiable in database
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["middle_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["perma_province"]; ?></td>
                    <td><?php echo $row["perma_address"]; ?></td>
                    <td><?php echo $row["post_address"]; ?></td>
                    <td><?php echo $row["phone_no"]; ?></td>



                    <! --Edit button is connected with backend -->
                    <td><a href="#" type="button"
                           class="btn btn-outline-info">Edit</a></td>
                           <! --Using modal from bootstrap for popout -->
                    <td><a href="#" type="button" class="btn btn-outline-danger"
                                  data-toggle="modal" data-target="#deleteModal<?php echo $row['id'] ?>">Delete</a></td>
                   <!-- Model is created and passed tp delete button with help of ID-->
                    <div class="modal fade" id="deleteModal<?php echo $row['id'] ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <p>Are you sure you want to permanently delete this record?</p>
                                </div>
                                <!-- This is the footer of model-->
                                <div class="modal-footer">
                                    <form action="../backend/backend-delete-user.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                        <button name="delete_confirm" type="submit" class="btn btn-light">Ok</button>
                                    </form>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<h3>User is not added yet!!</h3>";
        }
        ?>
        </tbody>
    </table>
</div>
    <!--Adding container for button-->
    <div class="container text-left">
        <!--Adding go back to dashboard  button with the help of bootstrap -->
        <a href="admin-menu.php" class="btn btn-info" role="button">Go back to Admin Menu</a>
    </div>
</div>
</div>

</body>


</html>
