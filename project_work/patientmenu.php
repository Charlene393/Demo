<?php
// Start session (Add this line at the beginning of the file)
session_start();

if (isset($_SESSION['uname'])) {
    $patientSSN = $_SESSION['uname'];

    // Get the patient's details based on the SSN from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "drug_dispensing_tool";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM patient WHERE SSN=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $SSN);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $firstName = $row["First_name"];
        $lastName = $row["Last_name"];

        echo "<p>Welcome, " . $firstName . " " . $lastName . " (Patient SSN: " . $SSN . ")</p>";
    } else {
        echo "Error retrieving patient details";
    }

    $conn->close();
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: Sign_in.html");
    exit;
}
?>
