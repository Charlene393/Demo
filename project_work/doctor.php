<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

//create connection
$conn = new mysqli($servername, $username, $password, $database);
$sql = "CREATE TABLE doctor (DSSN int PRIMARY KEY, FirstName Varchar(30), 
LastName varchar(30), Age int, PhoneNo VARCHAR(39),Email_Address varchar(40),Specialty varchar(255), 
YearsOfExperience int, DoctorSalary int, DoctorPassword Varchar(45))";
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connection successful";
    
    if (mysqli_query($conn, $sql)) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
}
?>
