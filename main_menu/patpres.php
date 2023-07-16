<!DOCTYPE html>
<html>
<head>
    <title> PRESCRIPTION TABLE</title>
    <link rel="stylesheet" href="/project_work/html_tables/tables.css">
    <link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>LIST OF PRESCRIPTIONS</h1>

    <br><br><hr><br><br>
    <a class="btn btn-primary" href="/project_work/main_menu/companymenu.html">BACK TO MAIN MENU</a>
    <br><br>
    <table class="table1">
        <tr>
        <th>Prescription ID</th>
            <th>Date Of Prescription</th>
            <th>Trade Name</th>
            <th>Dosage</th>
            <th>Doctor's SSN</th>
            <th>Doctor's Name</th>
          
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
            $sql = "SELECT PresID,PresDate,TradeName,Dosage,DSSN,DName FROM prescription WHERE SSN=?";
            $result = $conn->query($sql);
            if (!$result) {
                die("Invalid query: " . $conn->error);
            } else {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='active-row'>";
                    echo "<td>" . $row["PresID"] . "</td>";
                    echo "<td>" . $row["PresDate"] . "</td>";
                    echo "<td>" . $row["TradeName"] . "</td>";
                    echo "<td>" . $row["Dosage"] . "</td>";
                    echo "<td>" . $row["DSSN"] . "</td>";
                    echo "<td>" . $row["DName"] . "</td>";
             
                   
    
                    echo "</tr>";
                }
            }
            $conn->close();
        }
        ?>
    </table>
</body>
</html>
