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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Rest of the code to handle the registration process
    $SSN = $_POST["SSN"];
    $First_name = $_POST["pname"];
    $Last_name = $_POST["last_name"];
    $Email_Address = $_POST["Email_Address"];
    $Gender = $_POST["Gender"];
    $DateOfBirth = $_POST["DateOfBirth"];
    $City_Address = $_POST["address"];
    $InsuranceNO = $_POST["InsuranceNo"];
    $InsuranceCo = $_POST["InsuranceCo"];
    $PhoneNo = $_POST["phone"];
    $Create_Password = $_POST["Create_Password"];
    $Confirm_Password = $_POST["Confirm_Password"];

    // Validate email address
    if (!filter_var($Email_Address, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit;
    }

    // Validate password match
    if ($Create_Password !== $Confirm_Password) {
        echo "Passwords do not match";
        exit;
    }

    // Hash the password for storage
    $hashedPassword = password_hash($Create_Password, PASSWORD_DEFAULT);

    // Prepare and execute the INSERT statement
    $stmt = $conn->prepare("INSERT INTO patient (SSN, First_name, Last_name, Email_Address, Gender, DateOfBirth, City_Address, InsuranceNO, InsuranceCo, PhoneNo, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $SSN, $First_name, $Last_name, $Email_Address, $Gender, $DateOfBirth, $City_Address, $InsuranceNO, $InsuranceCo, $PhoneNo, $hashedPassword);

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
