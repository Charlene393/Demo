<!DOCTYPE html>
<html>
<head>
    <title> SALES TABLE</title>
    <link rel="stylesheet" href="/project_work/html_tables/tables.css">
    <link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>LIST OF SALES</h1>

    <br><br><hr><br><br>
    
    <table class="table1">
        <tr>
            <th>Trade Name</th>
           
            <th>Pharmacist's SSN</th>
            <th>Pharmacist's First Name</th>
            <th>Pharmacist's Last Name</th>
            <th>Patient's SSN</th>
            <th>Patient's First Name</th>
            <th>Patient's Last Name</th>
            <th>Dosage</th>
            <th>Operations</th>
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
            $sql = "SELECT SalesID,TradeName,PharSSN,Pharfname,Pharlname,SSN,pfname,Plname,Dosage FROM sales WHERE PharPhoneNo=?";
            $result = $conn->query($sql);
            if (!$result) {
                die("Invalid query: " . $conn->error);
            } else {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='active-row'>";
                    echo "<td>" . $row["SalesID"] . "</td>";
                    echo "<td>" . $row["TradeName"] . "</td>";
                  
                    echo "<td>" . $row["PharSSN"] . "</td>";
                    echo "<td>" . $row["Pharfname"] . "</td>";
                    echo "<td>" . $row["Pharlname"] . "</td>";
                    echo "<td>" . $row["SSN"] . "</td>";
                    echo "<td>" . $row["Pfname"] . "</td>";
                    echo "<td>" . $row["Plname"] . "</td>";
                    echo "<td>" . $row["Dosage"] . "</td>";
                   
                    echo "</tr>";
                }
            }
            $conn->close();
        }
        ?>
    </table>
</body>
</html>
