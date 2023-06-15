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
 First_name VARCHAR(20) NOT NULL,
 Last_name VARCHAR(30) NOT NULL,
 Email_Address VARCHAR(30),
 Gender Varchar(4),
   Age INT NOT NULL,
   City_Address VARCHAR(20),
   DSSN INT,
   PhoneNo Varchar(30),

    PRIMARY KEY (SSN),
    Foreign key(DSSN) reference doctor table (DSSN)
)";


if ($conn->query($sql)===TRUE) {
    echo "Table products created successfully.";
} else {
    echo "Could not create table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
