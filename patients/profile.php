<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Profile</title>
</head>
<body>
    <?php

    include("../include/header.php");
    include("../include/connection.php");
    
    $patients = $_SESSION['patients'];

    $query = "SELECT * FROM patients WHERE username='$patients'";

    $response = mysqli_query($connect, $query);

    $row = mysqli_fetch_array($response);

    $username = $row['username'];
    $profile = $row['profile'];
    

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -20px;">

                    <?php 
                    include("sidenav.php");
                    ?>

                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row my-2">
                            <div class="col-md-6">
                                <h5 class="text-center"><?php echo $username; ?>'s Profile</h5>
                                
                                <?php 

                                    if (isset($_POST['update'])) {
                                        $profile = $_FILES['profile_image']['name'];

                                        if (empty($profile)) {
                                            echo "<h5 class='text-center alert alert-danger'>Please Select an image.<h5>";
                                        }else {
                                            $query = "UPDATE patients SET profile='$profile' WHERE username='$patients'";
                                            $result = mysqli_query($connect, $query);

                                            if ($result) {
                                                move_uploaded_file($_FILES['profile_image']['tmp_name'], "images/$profile");
                                            }
                                        }
                                    }

                                ?>

                                <?php echo"<img src='images/$profile' class='col-md-8 mx-5' style='height: 300px;'>"; ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="mx-1">Update Profile Picture</label>
                                        <input type="file" name="profile_image" class="form-control">
                                    </div>
                                    <input type="submit" name="update" value="Update Image" class="btn btn-success my-1 mx-1">
                                </form>

                                <div class="my-3">
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan= "2" class="text-center">Details</th>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td><?php echo $row['firstname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td><?php echo $row['lastname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Profile Image Name</td>
                                        <td><?php echo $row['profile']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <?php
                                
                                    if (isset($_POST['change_username'])) {
                                        $username = $_POST['username'];

                                        if (empty($username)) {

                                        }else {
                                            $query = "UPDATE patients SET username='$username' WHERE username='$patients'";
                                            $response = mysqli_query($connect, $query);

                                            if ($response) {
                                                $_SESSION['patients'] = $username;
                                            }
                                        }
                                    }

                                ?>

                                <form method="POST" enctype="multipart/form-data">
                                    <label class="mx-1">Change Username</label>
                                    <input type="text" name="username" class="form-control">
                                    <input type="submit" name="change_username" value="Update Username" 
                                        class="btn btn-success  my-1">
                                </form>
                                </br></br>

                                <?php
                                
                                    if (isset($_POST['change_password'])) {
                                        $old_pass = $_POST['old_password'];
                                        $new_pass = $_POST['new_password'];
                                        $conf_pass = $_POST['conf_password'];

                                        $error = array();

                                        $q = "SELECT * FROM patients WHERE username='$patients'";
                                        $old = mysqli_query($connect, $q);
                                        $row = mysqli_fetch_array($old);
                                        $pass = $row['password'];


                                        if (empty($old_pass)) {
                                            $error['password'] = "Enter Old Password";
                                        }else if (empty($new_pass)) {
                                            $error['password'] = "Enter New Password";
                                        }else if (empty($conf_pass)) {
                                            $error['password'] = "Confirm New Password";
                                        }else if ($old_pass != $pass) {
                                            $error['password'] = "Invalid Old password";
                                        }else if ($new_pass != $conf_pass) {
                                            $error['password'] = "New password does not match.";
                                        }

                                        if (count($error) == 0) {
                                            $query = "UPDATE patients SET password='$new_pass' WHERE username='$patients'";

                                            mysqli_query($connect, $query);
                                        }

                                    }
                                    
                                    if (isset($error['password'])) {
                                        $e = $error['password'];
                                        $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                    }else {
                                        $show = "";
                                    }
                                
                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <h5 class="text-center">Change Password</h5>
                                        <div>
                                            <?php
                                            echo $show;
                                            ?>
                                        </div>
                                    <div class="form-group">
                                        <label class="mx-1">Old Password</label>
                                        <input type="password" name="old_password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="mx-1">New Password</label>
                                        <input type="password" name="new_password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="mx-1">Confirm New Password</label>
                                        <input type="password" name="conf_password" class="form-control">
                                    </div>
                                    <input type="submit" name="change_password" value="Update Password" 
                                        class="btn btn-success  my-1">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
