<?php
include_once('db_connection.php');
$address_line_1 = $_POST['address_line_1'];
$address_line_2 = $_POST['address_line_2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$request_doc_template = <<<EOT
<?xml version="1.0"?>
<AddressValidateRequest USERID="326GLOBA4273">
	<Revision>1</Revision>
	<Address ID="0">
		<Address1>$address_line_1</Address1>
		<Address2>$address_line_2</Address2>
		<City>$city</City>
		<State>$state</State>
		<Zip5>$zip_code</Zip5>
		<Zip4/>
	</Address>
</AddressValidateRequest>
EOT;
// prepare xml doc for query string
$doc_string = preg_replace('/[\t\n]/', '', $request_doc_template);
$doc_string = urlencode($doc_string);
$url = "https://secure.shippingapis.com/ShippingAPI.dll?API=Verify&XML=" . $doc_string;
//echo $url . "\n\n";

// perform the get
$response = file_get_contents($url);

$xml=simplexml_load_string($response) or die("Error: Cannot create object");
$json_data = json_decode(json_encode($xml),true);
#print_r($json_data);

$error_msg = '';
$data = array();
if(isset($json_data['Address']['Error'])){
	$error_msg = $json_data['Address']['Error']['Description'];
}else{
	
	$data['Address1'] = $json_data['Address']['Address1'];
	$data['Address2'] = $json_data['Address']['Address2'];
	$data['City'] = $json_data['Address']['City'];
	$data['State'] = $json_data['Address']['State'];
	$data['Zip5'] = $json_data['Address']['Zip5'];
	
	$result = $conn ->query("SELECT * FROM states WHERE code='".$data['State']."'");
	$row = $result->fetch_array(MYSQLI_ASSOC);
	
	
	
	$usps_address = 'Address Line1: '.$json_data['Address']['Address1'].PHP_EOL.'Address Line2: '.$json_data['Address']['Address2'].PHP_EOL.'City: '.$json_data['Address']['City'].PHP_EOL.'State: '.$row['Name'].PHP_EOL.'Zip Code: '.$data['Zip5'];
	
	$original_address = 'Address Line1: '.$address_line_1.PHP_EOL.'Address Line2: '.$address_line_2.PHP_EOL.'City: '.$city.PHP_EOL.'State: '.$row['Name'].PHP_EOL.'Zip Code: '.$zip_code;
	$data = array('usps_address'=>$usps_address,'original_address'=>$original_address);
}
echo json_encode(array('data'=>$data,'error_msg'=>$error_msg));exit;

?>

