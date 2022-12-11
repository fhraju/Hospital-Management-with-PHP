<?php 

include("include/connection.php");

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = array();

    if (empty($username)) {
        $error['login'] = "Enter Username";
    }else if (empty($password)) {
        $error['login'] = "Enter Password";
    }

    if (count($error) == 0) {
        $querry = "SELECT * FROM doctor WHERE username='$username' AND password='$password'";

        $response = mysqli_query($connect, $querry);

        if (mysqli_num_rows($response)) {

            echo "<script>alert('You are now Logged In')</script>";
            $_SESSION['doctor'] = $username;

        }else {
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}

if (isset($error['login'])) {
    $sh = $error['login'];

    $show = "<h5 class='text-center alert alert-danger'>$sh<h5>";
}else {
    $show = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Login Page</title>
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
                    <h4 class="text-center">Doctors Login</h4>
                        <div>
                            <?php echo $show; ?>
                        </div>
                    <form method="POST" class="my-1">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" value="Login" class="btn btn-success mt-2">
                        <p>Don't Have an account? <a href="doctors/apply.php">Apply Now!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>