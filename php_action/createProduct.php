<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	// $productImage 	= $_POST['productImage'];
	$testsCustomer	= $_POST['testsCustomer'];
	$testsPG		= $_POST['testsPG'];
	$testsDate		= date('Y-m-d', strtotime($_POST['testsDate']));
	$testsFormula 	= $_POST['testsFormula'];
	$testsMP		= $_POST['testsMP'];
	$testsOutput	= $_POST['testsOutput'];
	$testsResult	= $_POST['testsResult'];
    $testsBy 		= $_POST['testsBy'];

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];		
	$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
				
				$sql = "INSERT INTO tests (tests_file, companies_id, tests_pg, tests_date, tests_formula, tests_mp, tests_output, tests_result, tests_by) 
				VALUES ('$url', '$testsCustomer', '$testsPG', '$testsDate', '$testsFormula', '$testsMP', '$testsOutput', '$testsResult', '$testsBy')";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Başarıyla Eklendi.";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Eklenirken bir hata ile karşılaşıldı.";
				}

			}	else {
				return false;
			}	// /else	
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST