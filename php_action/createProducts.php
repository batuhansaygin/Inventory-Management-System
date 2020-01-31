<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$productsName 			= $_POST['productsName'];
	$productsDetails 		= $_POST['productsDetails'];

	$sqlProducts = "INSERT INTO products (products_name, products_detail) 
	VALUES ('$productsName', '$productsDetails')";

	if($connect->query($sqlProducts) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Başarıyla Eklendi.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Eklenirken bir hata ile karşılaşıldı.";
	}

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST