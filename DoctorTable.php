ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "DrugDispensingTool";


// Create a database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    // Rest of the code to handle the registration process 
    $Firstname = $_POST["pname"];
    $Lastname = $_POST["last name"];
    $Address = $_POST["address"];
    $Age =$_POST["age"];

    $PhoneNo = $_POST["phone"];
 

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO Patient (Firstname, Lastname, PhoneNo,Address, Age) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $Firstname, $Lastname,$PhoneNo,$Address,$Age );

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful.";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>