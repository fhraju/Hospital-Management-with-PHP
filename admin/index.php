<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                    <h4 class="my-2 mx-1">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $admin = mysqli_query($connect, "SELECT * FROM admin");
                                                $num_admin = mysqli_num_rows($admin);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num_admin; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <a href="admin.php"><i class="fa fa-users-cog fa-3x my-4" 
                                            style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $doctor = mysqli_query($connect, "SELECT * FROM doctor");
                                                $num_doctor = mysqli_num_rows($doctor);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;">
                                            <?php echo $num_doctor; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <a href=""><i class="fa fa-user-md fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $patient = mysqli_query($connect, "SELECT * FROM patients");
                                                $num_patient = mysqli_num_rows($patient);
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size: 30px;">
                                                <?php echo $num_doctor; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patients</h5>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <a href=""><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Reports</h5>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <a href=""><i class="fa fa-flag fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>
                                        <div class="col-md-4 my-2">
                                            <a href=""><i class="fa fa-money-check-alt fa-3x my-4" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>