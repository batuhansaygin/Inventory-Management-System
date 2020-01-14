<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$testsCustomer	= $_POST['testsCustomer'];
	$testsPG		= $_POST['testsPG'];
	$testsDate		= date('Y-m-d', strtotime($_POST['testsDate']));
	$testsFormula 	= $_POST['testsFormula'];
	$testsMP		= $_POST['testsMP'];
	$testsOutput	= $_POST['testsOutput'];
	$testsResult	= $_POST['testsResult'];
    $testsBy 		= $_POST['testsBy'];
	 
	$sqlTests = "INSERT INTO tests (tests_company, tests_pg, tests_date, tests_formula, tests_mp, tests_output, tests_result, tests_by) 
	VALUES ('$testsCustomer', '$testsPG', '$testsDate', '$testsFormula', '$testsMP', '$testsOutput', '$testsResult', '$testsBy')";

	$sqlCompanies = "INSERT INTO companies (companies_name) VALUES ('$testsCustomer');";

	if($connect->query($sqlTests) === TRUE && $connect->query($sqlCompanies) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Başarıyla Eklendi.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Eklenirken bir hata ile karşılaşıldı.";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST