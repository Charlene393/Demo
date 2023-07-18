<?php
// Start session (Add this line at the beginning of the file)
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $ssn = $_POST['uname']; // Assuming the username is the SSN itself
    $pass = $_POST['pass'];
    $user = $_POST['user'];

    // Note: Perform proper validation and authentication here

    // Example redirection based on the selected actor
    switch($user) {
        case 'Patient':
        // Check if the patient with the given SSN exists in the database
        $sql = "SELECT * FROM patient WHERE SSN=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $ssn);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION["uname"] = $ssn; // Store the SSN in the session
            header("Location: patientmenu.html");
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid access")';
            echo 'window.location.href="patientmenu.html"';
            echo '</script>';
        }
        break;
        case 'Doctor':
            $sql = "SELECT * FROM doctor WHERE DSSN=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $ssn);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $_SESSION["uname"] = $ssn; // Store the SSN in the session
                header("Location: doctormenu.html");
                exit;
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Invalid access")';
                echo 'window.location.href="doctormenu.html"';
                echo '</script>';
            }
            break;
            case 'Pharmacist':
                // Check if the pharmacist with the given SSN exists in the database
                $sql = "SELECT * FROM pharmacist WHERE PSSN=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $ssn);
                $stmt->execute();
                $result = $stmt->get_result();
    
                if ($result->num_rows === 1) {
                    $_SESSION["uname"] = $ssn; // Store the SSN in the session
                    header("Location: pharmacymenu.html");
                    exit;
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Invalid access")';
                    echo 'window.location.href="pharmacymenu.html"';
                    echo '</script>';
                }
                break;
                    case 'Admin':
                        // Check if the admin with the given SSN exists in the database
                        $sql = "SELECT * FROM admin WHERE ASSN=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $ssn);
                        $stmt->execute();
                        $result = $stmt->get_result();
            
                        if ($result->num_rows === 1) {
                            $_SESSION["uname"] = $ssn; // Store the SSN in the session
                            header("Location: companymenu.html");
                            exit;
                        } else {
                            echo '<script type="text/javascript">';
                            echo 'alert("Invalid access")';
                            echo 'window.location.href="companymenu.html"';
                            echo '</script>';
                        }
                        break;
        
                default:
                    echo "Invalid actor selected";
                    break;

    }
}

// Close the database connection
$conn->close();
?>
