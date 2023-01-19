<?php
include_once('db_connection.php');
$sql = "INSERT INTO usps_addresses (address) VALUES ('".$_POST['address']."')";
if ($conn->query($sql) === TRUE) {
  $sucess = '1';
} else {
    $sucess = '0';
}
echo $sucess ;exit();
?>