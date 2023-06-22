<!DOCTYPE html>
<html>
    <head>
        <title>YAMADA PHARMACISTS</title>
        
      


</head>
    <body>
        <h2>YAMADA PHARMACISTS</h2>
        <table border="2px" cellpadding=6px>
         <tr bgcolor="grey">
            <th>Pharmacists SSN</th>
            <th>Pharmacists first Name</th>
            <th>Pharmacists Last Name</th>
            <th>Operations</th>
        
            
         
         <?php
$servername="localhost";
$username="root";
$password="";
$database="drug_dispensing_tool";
$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_error){
    die("Connection failed");
}else{
    echo"Connection is successful" ."<br>";
}
$sql="SELECT PharSSN,Pharfname,Pharlname FROM pharmacist WHERE PharName='Yamada Meds'";
$result=$conn->query($sql);

if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
     echo "<tr><td>" ." ".$row["PharSSN" ] ." ". "<td>" ." ".$row["Pharfname"] ." "."<td>" ." ".$row["Pharlname"]."<br>";
    
     echo "<td><a href='edit.php?id=" . $row['PharSSN'] . "'>Edit</a></td>";
      echo "<td><a href='delete.php?id=" . $row['PharSSN'] . "'>Delete</a></td>";
       echo "</tr>";

        


    }
echo "</table>";
}else{
    echo "0 results";
}
$conn->close();
?>
        </table>
    </body>
</html>