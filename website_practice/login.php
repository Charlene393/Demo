<?php
// Start session (Add this line at the beginning of the file)
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['Login'])) {
    $uname = $_POST['uname']; // Corrected the field name
    $pass = $_POST['pass']; // Corrected the field name

    // Note the corrected field name "Password"
    $select = mysqli_query($conn, "SELECT * FROM patient WHERE SSN='$uname' AND Password='$pass'");
    $row = mysqli_fetch_array($select);

    if (is_array($row)) {
        $_SESSION["uname"] = $row['SSN']; // Corrected variable name
        // No need to store the password in the session for security reasons. You can remove this line: $_SESSION["pass"]=$row['Password'];
        header("Location: main_menu\patientmenu.html"); // Redirect to the main menu after successful login
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid access")';
        echo 'window.location.href="main_menu\patientmenu.html"';
        echo '</script>';
    }
}

// Close the database connection
$conn->close();
?>
