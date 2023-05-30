<?php
$host = "localhost";
$username = "root";
$password = "";
$database ="drugdispensingtool";
$conn = mysqli_connect($host,$username,$database);
if (!$conn) {
    die ("connection failed: ". mysqli_connect_error());
}
echo "connection sucessful"."<br>";
?>
