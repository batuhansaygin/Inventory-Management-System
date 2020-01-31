<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$testsCustomer 	= $_POST['editTestsCustomer'];
	$testsPG 		= $_POST['editTestsPG'];
	$testsDate 		= $_POST['editTestsDate'];
	$testsFormula 	= $_POST['editTestsFormula'];
	$testsMP 		= $_POST['editTestsMP'];
	$testsOutput 	= $_POST['editTestsOutput'];
	$testsResult 	= $_POST['editTestsResult'];
	$testsBy 		= $_POST['editTestsBy'];

				
	//$sql = "UPDATE product SET product_name = '$productName', brand_id = '$brandName', categories_id = '$categoryName', quantity = '$quantity', rate = '$rate', active = '$productStatus', status = 1 WHERE product_id = $productId ";
	$sql = "UPDATE tests SET tests_company = '$testsCustomer', tests_pg = '$testsPG', tests_date = '$testsDate', tests_formula = '$testsFormula', tests_mp = '$testsMP', tests_output = '$testsOutput', tests_result = '$testsResult', tests_by = '$testsBy' WHERE tests_id = '$productId'";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Başarıyla değiştirildi.";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Değiştirilirken bir hata ile karşılaşıldı.";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
