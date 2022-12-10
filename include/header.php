<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark">
    <a class="navbar-brand text-white ms-5" href="index.php">Hospital Management System</a>

      <div class="ms-auto me-5">
        <ul class="navbar-nav">
          <?php
            if (isset($_SESSION['admin'])) {
              $user = $_SESSION['admin'];
              echo '

                <li class="nav-item">
                  <a class="nav-link text-white" href="#">'.$user.'</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="logout.php">Logout</a>
                </li>
              ';
            } else {
              echo '
                <li class="nav-item">
                  <a class="nav-link text-white" aria-current="page" href="admin_login.php">Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Doctor</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Patient</a>
                </li>
              ';
            }
          ?>
        </ul>
      </div>
  </nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>