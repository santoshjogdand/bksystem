<?php
$servername = "sql300.infinityfree.com";
$username = "if0_36106232";
$password = "cgDhZlmSPIo";
$dbname = "if0_36106232_test1";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
