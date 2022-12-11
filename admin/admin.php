<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    include("../include/header.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -20px;">

                    <?php 
                    include("sidenav.php");
                    include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row my-2">
                            <div class="col-md-6">
                                <h5 class="text-center">All Admin</h5>

                                <?php 
                                $admin = $_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE username != '$admin'";
                                $response = mysqli_query($connect, $query);

                                $output = "
                                    <table class='table table-bordered'>
                                    <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th style='width: 10%;'>Action</th>
                                    </tr>
                                ";

                                if (mysqli_num_rows($response) < 1) {
                                    $output .= "<tr>
                                        <td colspan='3' class='text-center'> No New Admin </td>
                                    </tr>";
                                }

                                while ($row = mysqli_fetch_array($response)) {
                                    $id = $row['id'];
                                    $username = $row['username'];

                                    $output .= "
                                        <tr>
                                        <td>$id</td>
                                        <td>$username</td>
                                        <td>
                                            <a href='?id=$id'>
                                            <button id='$id' class='btn btn-danger'>Remove</button></a>
                                        </td>
                                    ";
                                }
                                $output .= "
                                    </tr>
                                    </table>
                                ";
                                echo $output;
                                

                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    $query = "DELETE FROM admin WHERE id='$id'";
                                    mysqli_query($connect, $query);
                                }
                                ?>

                            </div>
                            <div class="col-md-6">
                                <?php
                                
                                if (isset($_POST['add'])) {
    
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $image = $_FILES['img']['name'];
                                
                                    $error = array();
                                
                                    if (empty($username)) {
                                        $error['admin'] = "Enter Admin Username";
                                    }elseif (empty($password)) {
                                        $error['password'] = "Enter Password For Admin";
                                    }elseif (empty($image)) {
                                        $error['image'] = "Enter Admin Picture";
                                    }

                                    if (count($error) == 0) {
                                        $q = "INSERT INTO admin(username,password,profile) 
                                        VALUES('$username','$password', '$image')";

                                         $result = mysqli_query($connect, $q);

                                         if ($result) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "images/$image");
                                         }else {

                                         }
                                    }
                                }

                                if (isset($error['admin'])) {
                                    $sho = $error['admin'];
                                    $show = "<h6 class='alert alert-danger'> $sho </h6>";
                                }elseif (isset($error['password'])) {
                                    $sho = $error['password'];
                                    $show = "<h6 class='alert alert-danger'> $sho </h6>";
                                }elseif (isset($error['image'])) {
                                    $sho = $error['image'];
                                    $show = "<h6 class='alert alert-danger'> $sho </h6>";
                                
                                }else {
                                    $show = '';
                                }
    
                                echo $show;
                                
                                ?>
                                <h5 class="text-center">Add Admin</h5>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Enter Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Add Admin Picture</label>
                                        <input type="file" class="form-control" name="img">
                                    </div>
                                    <input type="submit" name="add" value="Add New Admin" class="btn btn-success mt-2">
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