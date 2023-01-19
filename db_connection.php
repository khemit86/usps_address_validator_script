<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$conn = new mysqli("localhost","root","","usps_address");
// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>