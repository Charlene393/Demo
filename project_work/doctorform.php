<?php
$servername="localhost";
$username="root";
$password="";
$database="drug_dispensing_tool";
$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_error){
    die("Connection failed" .$conn->connect_error);

}else{
    echo"Connection successful";
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $FirstName=$_POST["FirstName"];
    $LastName =$_POST["LastName"];
    $Age =$_POST["age"];
    $PhoneNo =$_POST["PhoneNO"];
    $Email=$_POST["Email_Address"];
    $Specialty=$_POST["Specialty"];
    $Years_of_Experience=$_POST["YearsofExperience"];
    $Doctor_Salary=$_POST["DoctorSalary"];
    $Doctor_password=$_POST["DoctorPassword"];
  

}
$sql=("INSERT INTO doctor(DSSN,DName,Specialty,YearsofExperience,Email,DoctorPassword)VALUES(?,?,?,?,?)");
$stmt=$conn->prepare($sql);

$stmt=$conn->prepare($sql);
$stmt->bind_param("issis",$Doctors_SSN,$Doctors_Name,$Specialty,$Years_of_Experience,$Email,$Doctor_password);

$stmt->execute();
if($conn->affected_rows>0){
    echo "Data saved successfully";
}else{
    echo "Error: Data was not saved";

}
$stmt->close();



























?>