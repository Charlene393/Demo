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
    $Sales_ID= $_POST['SalesID'];
    $Trade_Name=$_POST['TradeName'];
    $Pharmacys_Phone_Number=$_POST['PharPhoneNo'];
    $Pharmacist_SSN=$_POST['PharSSN'];
    $Pharmacist_First_Name=$_POST['Pharfname'];
    $Pharmacist_Last_Name=$_POST['Pharlname'];
    $Patients_SSN=$_POST['SSN'];
    $Patients_First_Name=$_POST['Pfname'];
    $Patients_Last_Name=$_POST['Plname'];
    $Dosage=$_POST['Dosage'];


  
    $sql = "UPDATE sales SET TradeName=?,PharPhoneNo=?,PharSSN=?,Pharfname=?,Pharlname=?,SSN=?,Pfname=,Plname=?,Dosage=? WHERE SalesID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssisss", $Trade_Name,$Pharmacys_Phone_Number,$Pharmacist_SSN,$Pharmacist_First_Name,$Pharmacist_Last_Name,$Patients_SSN,$Patients_First_Name,$Patients_Last_Name,$Sales_ID);

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
