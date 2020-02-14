<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoriesId 			= $_POST['editCategoriesId'];

	$customersName 			= $_POST['editCustomersName'];
	$customersProduct 		= $_POST['editCustomersProduct'];
	$customersMB 			= $_POST['editCustomersMB'];
	$customersApplication 	= $_POST['editCustomersApplication'];
	$customersPB 			= $_POST['editCustomersPB'];
	$customersPF 			= $_POST['editCustomersPF'];
	$customersEquivalent 	= $_POST['editCustomersEquivalent'];

	$sql = "UPDATE customers SET companies_id = '$customersName', customers_product = '$customersProduct', customers_mb = '$customersMB', customers_application = '$customersApplication', customers_pb = '$customersPB', customers_pf = '$customersPF', customers_equivalent = '$customersEquivalent' WHERE customers_id = '$categoriesId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Başarıyla değiştirildi.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Değiştirilirken bir hata ile karşılaşıldı.";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST