<?php 
include("include/connection.php");

if (isset($_POST['create'])) {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirm_password = $_POST['conf_password'];

    $error = array();
    
    if (empty($firstname)) {
        $error['create'] = "Enter Firstname";
    }else if (empty($lastname)) {
        $error['create'] = "Enter Lastname";
    }else if (empty($username)) {
        $error['create'] = "Enter Username";
    }else if (empty($email)) {
        $error['create'] = "Enter Email";
    }else if (empty($gender)) {
        $error['create'] = "Select Your Gender";
    }else if (empty($password)) {
        $error['create'] = "Enter Password";
    }else if (empty($confirm_password)) {
        $error['create'] = "Password Does not Match";
    }

    if (count($error) == 0) {

        $query = "INSERT INTO patients(firstname, lastname, username, email, gender, password, profile) 
                VALUES('$firstname', '$lastname', '$username', '$email', '$gender', '$password', 'patient.jpg')";

        $result = mysqli_query($connect, $query);

        if ($result) {

            echo "<script>alert('You Have Successfully Applied.')</script>";

            header("Location: patients_login.php");

        }else {
            echo "<script>alert('Failed Something Went Wrong Try Again.')</script>";
        }

    }
}

if (isset($error['create'])) {
    $sh = $error['create'];

    $show = "<h5 class='text-center alert alert-danger'>$sh</h5>";
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
    <title>Create Account!</title>
</head>
<body>
    <?php 
        include("include/header.php");
    ?>
    <div style="margin-top: 50px;"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h5 class="text-center">Create An Account</h5>
                    <div>
                        <?php echo $show; ?>
                    </div>

                    <form method="POST" class="my-1">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" placeholder="Enter Your FirstName" 
                            value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
                        </div>
                        <div class="form-group my-2">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Enter Your LastName"
                            value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>">
                        </div>
                        <div class="form-group my-2">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter Username"
                            value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
                        </div>
                        <div class="form-group my-2">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email Address"
                            value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>
                        <div class="form-group my-3">
                            <label for="gender">Select Gender</label>
                            <select name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group my-3">
                            <label for="conf_password">Confirm Password</label>
                            <input type="password" class="form-control" name="conf_password" placeholder="Confirm Password">
                        </div>
                        <input type="submit" name="create" value="Create Account" class="btn btn-success my-1">
                        <p>Already Have an account? <a href="patients_login.php">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>