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
    $Patients_SSN=$_POST['SSN'];
    $Patients_First_Name=$_POST['Pfname'];
    $Patients_Last_Name=$_POST['Plname'];
    $Age=$_POST['Age'];
    $Email=$_POST['Email'];
    $Location_Address=$_POST['LAddress'];



  
    $sql = "UPDATE patient SET Pfname=?,Plname=?,Age=?,LAddress=?,Email=? WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissi",$Patients_First_Name,$Patients_Last_Name,$Age,$Location_Address,$Email,$Patients_SSN);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>
