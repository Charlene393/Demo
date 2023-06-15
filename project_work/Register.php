<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    // Rest of the code to handle the registration process 
    $First_name = $_POST["pname"];
    $Last_name = $_POST["last_name"];
    $Email_Address = $_POST["Email_Address"];
    $Gender = $_POST["Gender"];
    $Age = $_POST["age"];
    $City_Address = $_POST["address"];
    $PhoneNo = $_POST["phone"];
    $Create_Password = $_POST["Create_Password"];
    $Confirm_password = $_POST["Confirm_password"];

    if (!filter_var($Email_Address, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit;
    }

    if (strcmp($Create_Password, $Confirm_password) !== 0) {
        echo "Passwords do not match";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO Patient (First_name, Last_name, Email_Address, Gender, PhoneNo, City_Address, Age, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $First_name, $Last_name, $Email_Address, $Gender, $PhoneNo, $City_Address, $Age, $Confirm_password);
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
