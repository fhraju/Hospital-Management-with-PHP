<?php 
    session_start();

    if (isset($_SESSION['patients'])) {
        unset($_SESSION['patients']);

        header("Location: ../index.php");
    }
?>