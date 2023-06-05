<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";
$conn = new mysqli($servername, $username, $password, $database);
$sql = "CREATE TABLE PharmContract(
    ContractId varchar(255) PRIMARY KEY,
    CoPhoneNo int,
    SupervisorID int,
    SupName varchar(255),
    CoName varchar(255),
    PharPhoneNo int,
    PharName varchar(255),
    StartDate varchar(255),
    EndDate varchar(255),
    ContractText varchar(1000000)

)";
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error . "\n";
} else {
    echo "Connection successful \n";
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
$conn->close();
?>
