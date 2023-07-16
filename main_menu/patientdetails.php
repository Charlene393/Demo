<!DOCTYPE html>
<html>
<head>
    <title> PATIENTS' TABLE</title>
    <link rel="stylesheet" href="/project_work/html_tables/tables.css">
    <link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>LIST OF PATIENTS</h1>

    <br><br><hr><br><br>
     <a class="btn btn-primary" href="/project_work/main_menu/companymenu.html">BACK TO MAIN MENU</a>
    <br><br>
    <table class="table1">
        <tr>
        <th>Patients SSN</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Age</th>
         <th>Location</th>
    
         <th>Email</th>
         
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "drug_dispensing_tool";

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sql = "SELECT * FROM patient WHERE SSN=?";
            $result = $conn->query($sql);
            if (!$result) {
                die("Invalid query: " . $conn->error);
            } else {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='active-row'>";
                    echo "<td>" . $row["SSN"] . "</td>";
                    echo "<td>" . $row["Pfname"] . "</td>";
                    echo "<td>" . $row["Plname"] . "</td>";
                    echo "<td>" . $row["Age"] . "</td>";
                    echo "<td>" . $row["LAddress"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                 
                    echo "</tr>";
                }
            }
            $conn->close();
        }
        ?>
    </table>
</body>
</html>
