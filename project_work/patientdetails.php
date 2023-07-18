<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Assuming you pass the patient's SSN as a parameter (adjust this accordingly)
    if (isset($_GET['patient_ssn'])) {
        $patient_ssn = $_GET['patient_ssn'];

        $sql = "SELECT * FROM patient WHERE SSN=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $patient_ssn);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Invalid query: " . $conn->error);
        } else {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='active-row'>";
                echo "<td>" . $row["SSN"] . "</td>";
                echo "<td>" . $row["First_name"] . "</td>";
                echo "<td>" . $row["Last_name"] . "</td>";
                echo "<td>" . $row["Email_Address"] . "</td>";
                echo "<td>" . $row["DateOfBirth"] . "</td>";
                echo "<td>" . $row["City_Address"] . "</td>";
                echo "<td>" . $row["InsuranceNO"] . "</td>";
                echo "<td>" . $row["InsuranceCo"] . "</td>";
                echo "<td>" . $row["PhoneNo"] . "</td>";
                echo "</tr>";
            }
        }
        $stmt->close();
    } else {
        echo "Patient SSN not provided.";
    }
    $conn->close();
}
?>
