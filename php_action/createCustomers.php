<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$customersName 			= $_POST['customersName'];
	$customersProduct 		= $_POST['customersProduct'];
	$customersMB 			= $_POST['customersMB'];
	$customersApplication 	= $_POST['customersApplication'];
	$customersPB 			= $_POST['customersPB'];
	$customersPF 			= $_POST['customersPF'];
	$customersEquivalent 	= $_POST['customersEquivalent'];

	$sqlCustomers = "INSERT INTO customers (customers_company, customers_product, customers_mb, customers_application, customers_pb, customers_pf, customers_equivalent) 
	VALUES ('$customersName', '$customersProduct', '$customersMB', '$customersApplication', '$customersPB', '$customersPF', '$customersEquivalent')";

	if($connect->query($sqlCustomers) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Başarıyla Eklendi.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Eklenirken bir hata ile karşılaşıldı.";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST