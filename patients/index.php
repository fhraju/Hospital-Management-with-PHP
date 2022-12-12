<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Dashboard</title>
</head>
<body>
    
    <?php 
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -20px;">

                    <?php 
                    include("sidenav.php")
                    ?>

                </div>
                <div class="col-md-10">
                    <h5 class="my-2 ms-5">Patient Dashboard</h5>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">My Profile</h5>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <a href="profile.php"><i class="fa fa-user-circle fa-4x me-2 my-4" 
                                            style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-3 text-white">Book</h5>
                                            <h5 class="text-white">Appointement</h5>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <a href=""><i class="fa fa-calendar fa-3x my-3" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2 my-0" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-4 text-white">My Bills</h5>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <a href=""> <i class="fa fa-file-invoice-dollar fa-3x my-3"
                                             style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                        if (isset($_POST['report'])) {
                            $title = $_POST['title'];
                            $message = $_POST['message'];

                            if (empty($title)) {

                            }elseif (empty($message)) {

                            }else {
                                $user = $_SESSION['patients'];

                                $query = "INSERT INTO reports(title, message, username) VALUES('$title', '$message','$user')";

                                $response = mysqli_query($connect, $query);

                                if ($response) {
                                    echo "<script>alert('Your report sent successfully')</script>";
                                }
                            }
                        }
                    
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                                <div class="col-md-6 bg-info my-5">
                                    <h5 class="text-center my-2">Send a Report</h5>
                                    <form method="POST">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Report Title">
                                        <label>Message</label>
                                        <input type="text" name="message" class="form-control" placeholder="Enter your Report">
                                        <input type="submit" name="report" class="btn btn-success my-2" value="Post Report">
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