<?php
$servername="localhost";
$username="root";
$password="";
$database="drug_dispensing_tool";

$conn=new mysqli($servername, $username,$password,$database);
if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}else{
    echo "Connection successful";
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$TRADE_NAME=$_POST["TradeName"];
$FORMULA=$_POST["Formula"];
}
$sql=("INSERT INTO drugs(TradeName,Formula)VALUES(?,?)");
$stmt=$conn->prepare($sql);

$stmt=$conn->prepare($sql);
$stmt->bind_param("ss",$TRADE_NAME,$FORMULA);
$stmt->execute();
if($conn->affected_rows>0){
    echo "Data saved successfully.";
}else{
    echo "Error:Data was not saved";
}
$stmt->close();





























?>