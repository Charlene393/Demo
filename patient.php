<?php
$host = "localhost";
$username = "";
$password = "";
$database = "DrugDispensingTool";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
}

echo "Connected Successfully<br/>";

$sql = "CREATE TABLE Patient(
    SSN INT AUTO_INCREMENT,
    PName VARCHAR(20) NOT NULL,
   Age INT NOT NULL,
   Address VARCHAR(20),
   DSSN INT,
   PhoneNo int,

    PRIMARY KEY (SSN),
    Foreign key(DSSN)
)";


if ($conn->query($sql)===TRUE) {
    echo "Table products created successfully.";
} else {
    echo "Could not create table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
