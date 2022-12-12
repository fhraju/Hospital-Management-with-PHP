<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
</head>
<body>
    <?php 
        include("include/header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row my-4 ms-2">
                    <div class="col-md-3 mx-1 shadow">
                        <img src="images/more_info.jpg" style="width: 250px; height: 250px;" />

                        <h5 class="text-center">Click for more info</h5>
                        <a href="#">
                            <button class="btn btn-success mt-2" style="margin-left: 70px;">
                                More Info
                            </button>
                        </a>
                    </div>
                    <div class="col-md-4 mx-1 shadow">
                        <img src="images/paitient.jpg" style="width: 100%;" />

                        <h5 class="text-center">Create Account for Doctors Care</h5>
                        <a href="patients_create.php">
                            <button class="btn btn-success mt-4" style="margin-left: 100px;">
                                Create Account
                            </button>
                        </a>
                    </div>
                    <div class="col-md-4 mx-1 shadow">
                        <img src="images/doctors.jpg" style="width: 100%;" />

                        <h5 class="text-center">If you are a doctor and want to help people then apply.</h5>
                        <a href="apply.php">
                            <button class="btn btn-success my-4" style="margin-left: 100px;">
                                Apply Now
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>