<?php 
session_start();
include("include/connection.php");

if (isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = array();

    if (empty($username)) {
        $error['admin'] = "Enter Username";
    }elseif (empty($password)) {
        $error['password'] = "Enter Password";
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password' ";

        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('You have been Logged in as Admin')</script>";

            $_SESSION['admin'] = $username;

            header("Location: admin/index.php");
            exit();

        }else {
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
</head>
<body>
    <?php 
        include("include/header.php")
    ?>
    <div style="margin-top: 50px;"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <img src="images/admin_login.jpg" class="col-md-8">
                    <form action="" method="POST" class="my-1">

                        <div>
                            <?php 
                            
                            if (isset($error['admin'])) {
                                $sho = $error['admin'];
                                $show = "<h6 class='alert alert-danger'> $sho </h6>";
                            }elseif (isset($error['password'])) {
                                $sho = $error['password'];
                                $show = "<h6 class='alert alert-danger'> $sho </h6>";
                            }else {
                                $show = '';
                            }

                            echo $show;

                            ?>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success mt-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>