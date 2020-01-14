<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoriesId 	= $_POST['editCategoriesId'];

	$testsCustomer 	= $_POST['editTestsCustomer'];
	$testsPG 		= $_POST['editTestsPG'];
	$testsDate 		= $_POST['editTestsDate'];
	$testsFormula 	= $_POST['editTestsFormula'];
	$testsMP 		= $_POST['editTestsMP'];
	$testsOutput 	= $_POST['editTestsOutput'];
	$testsResult 	= $_POST['editTestsResult'];
	$testsBy 		= $_POST['editTestsBy'];

	$sql = "UPDATE tests SET tests_company = '$testsCustomer', tests_pg = '$testsPG', tests_date = '$testsDate', tests_formula = '$testsFormula', tests_mp = '$testsMP', tests_output = '$testsOutput', tests_result = '$testsResult', tests_by = '$testsBy' WHERE tests_id = '$categoriesId'";

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