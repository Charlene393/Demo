<!DOCTYPE html>
<html>
<head>
    <title> CONTRACT TABLE</title>
    <link rel="stylesheet" href="/project_work/html_tables/tables.css">
    <link href="https://fonts.googleapis.com/css2?family=Bacasime+Antique&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>LIST OF CONTRACTS</h1>

    <br><br><hr><br><br>
    <a class="btn btn-primary" href="/project_work/main_menu/companymenu.html">BACK TO MAIN MENU</a>
    <br><br>
    <table class="table1">
        <tr>
            <th>Contract ID</th>
            <th>Company's Name</th>
            <th>Company's Phone Number</th>
            <th>Supervisor's ID</th>
            <th>Supervisor's Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Contract's Text</th>
            <
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
            $sql = "SELECT ContractId,SupervisorID,SupName,CoPhoneNo,CoName,StartDate,EndDate,ContractsText FROM pharmcontract WHERE PharPhoneNo=?";
            $result = $conn->query($sql);
            if (!$result) {
                die("Invalid query: " . $conn->error);
            } else {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='active-row'>";
                    echo "<td>" . $row["ContractId"] . "</td>";
               
                    echo "<td>" . $row["SupervisorID"] . "</td>";
                    echo "<td>" . $row["SupName"] . "</td>";
              
                    echo "<td>" . $row["CoPhoneNo"] . "</td>";
                    echo "<td>" . $row["CoName"] . "</td>";
                    echo "<td>" . $row["StartDate"] . "</td>";
                    echo "<td>" . $row["EndDate"] . "</td>";
                    echo "<td>" . $row["ContractsText"] . "</td>";

                    echo "</tr>";
                }
            }
            $conn->close();
        }
        ?>
    </table>
</body>
</html>
