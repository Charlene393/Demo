<?php
$servername="localhost";
$username="root";
$password="";
$database="drug_dispensing_tool";


$conn=new mysqli($servername,$username,$password,$database);
if ($conn ->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else{
echo "Connected successfully";}
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $first_name=$_POST["pname"];
    $last_name=$_POST["last name"];
    $SSN=$_POST["id"];
    $Gender=$_POST["gender"];
    $Address=$_POST["Address"];
    $Age=$_POST["Age"];
    $InsuranceNo=$_POST["InsuranceNo"]
    $InsuranceCo=$_POST["InsuranceCo"]
    $email=$_POST["email"];
}
$sql="INSERT INTO patient(First_name,Last_name,SSN,Age,Gender,City_Address,email,DSSN,InsuranceNo,InsuranceCo)VALUES(?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $first_name, $last_name, $SSN, $Age, $Gender, $Address, $email, $InsuranceNo,$InsuranceCo);


$stmt->execute();
if ($conn->affected_rows > 0) {
    echo "Data saved successfully.";
} else {
    echo "Error: Data was not saved.";
}
$stmt->close();








