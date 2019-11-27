<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoriesName = $_POST['categoriesName'];
	$categoriesStatus = $_POST['categoriesStatus'];
	$categoriesDescription = $_POST['categoriesDescription'];

	$sql = "INSERT INTO categories (categories_name, categories_active, categories_status, categories_description) 
	VALUES ('$categoriesName', '$categoriesStatus', 1, '$categoriesDescription')";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Başarıyla Eklendi.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Ekleme esnasında hata ile karşılaşıldı.";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST