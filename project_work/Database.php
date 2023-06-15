<?php
$host = "localhost";
$username = "root";
$password = "";
$database ="drug_dispensing_tool";
$conn = mysqli_connect($host,$username,$password,$database);
if (!$conn) {
    die ("connection failed: ". mysqli_connect_error());
}
echo "connection sucessful"."<br>";
?>
