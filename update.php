<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    // Update the pharmacist's information
    $sql = "UPDATE pharmacist SET Pharfname='$fname', Pharlname='$lname' WHERE PharSSN='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
$conn->close();
?>
