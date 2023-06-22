<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the pharmacist's information
    $sql = "SELECT * FROM pharmacist WHERE PharSSN = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $pharSSN = $row['PharSSN'];
        $pharfname = $row['Pharfname'];
        $pharlname = $row['Pharlname'];
        // Populate the HTML form with the current values
        ?>
        <form action="update.php" method="POST">
            <h2>UPDATE RECORD</h2>
            <br><br>
            <input type="hidden" name="id" value="<?php echo $pharSSN; ?>">
            <label for="fname">First Name:</label>
        
            <input type="text" name="fname" value="<?php echo $pharfname; ?>">
            <br>  <br><br>
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" value="<?php echo $pharlname; ?>">
            <br><br>
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "Pharmacist not found.";
    }
} else {
    echo "Invalid request.";
}
$conn->close();
?>
