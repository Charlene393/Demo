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
    $Trade_Name=$_POST['TradeName'];
    $Formula=$_POST['Formula'];
       


   
    $sql = "UPDATE drugs SET  Formula = ? WHERE TradeName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$Formula,$Trade_Name);
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
