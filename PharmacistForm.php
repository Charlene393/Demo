<?php
$host="localhost";
$username="";
$password="";
$database="drug_dispensing_tool";
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
    $pharmacistSalary = $_POST["PharmacistSalary"];
    $password = $_POST["Create_Password"];
    $confirmPassword = $_POST["Confirm_Password"];

    // Perform any necessary validation on the form data
    // ...

    // Store the pharmacist data in the database
    $query = "INSERT INTO pharmacists (PSSN,pharfname, pharlname, email, pharPhoneNo, gender, dateOfBirth, address, yearsOfExperience, pharmacistSalary, password) VALUES 
    ('$PSSN, $pharfname', '$pharlname', '$email', '$pharPhoneNo', '$gender', '$dateOfBirth', '$address', '$yearsOfExperience', '$pharmacistSalary', '$password')";

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
