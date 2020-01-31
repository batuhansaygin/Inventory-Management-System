<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoriesId 			= $_POST['editCategoriesId'];

	$productsName 			= $_POST['editProductsName'];
	$productsDetails 		= $_POST['editProductsDetails'];

	$sql = "UPDATE products SET products_name = '$productsName', products_detail = '$productsDetails' WHERE products_id = '$categoriesId'";

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