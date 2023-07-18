<?php
session_start();

if (isset($_SESSION['uname'])) {
    $patientSSN = $_SESSION['uname'];

    // Redirect to the patientmenu.html page
    header("Location: patientmenu.php");
    exit;
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: Sign_in.html");
    exit;
}
?>
