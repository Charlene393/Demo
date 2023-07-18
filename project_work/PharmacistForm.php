<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $PSSN = $_POST["PSSN"];
    $pharfname = $_POST["Pharfname"];
    $pharlname = $_POST["Pharlname"];
    $email = $_POST["Email_Address"];
    $pharPhoneNo = $_POST["PharPhoneNo"];
    $gender = $_POST["Gender"];
    $dateOfBirth = $_POST["DateOfBirth"];
    $address = $_POST["address"];
    $yearsOfExperience = $_POST["Years_of_Experience"];
   
    $password = $_POST["Create_Password"];
    $confirmPassword = $_POST["Confirm_Password"];

    // Perform any necessary validation on the form data
    // ...

    // Store the pharmacist data in the database
    $query = "INSERT INTO pharmacist (PSSN, pharfname, pharlname, EmailAddress, pharPhoneNo, gender, dateOfBirth, yearsOfExperience, password) VALUES 
    ('$PSSN', '$pharfname', '$pharlname', '$email', '$pharPhoneNo', '$gender', '$dateOfBirth', '$yearsOfExperience',  '$password')";
    $select =mysqli_query($conn, "Select*FROM pharmacist where PSSN='$PSSN' AND Password='$password'");


    if (mysqli_query($connection, $query)) {
        echo "Pharmacist registered successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    // Handle cases where the form is not submitted
    // Redirect the user to the registration form or display an error message
    header("Location: pharmacist-form.html");
    exit();
}

// Close the database connection
mysqli_close($connection);
?>
