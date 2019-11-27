<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$categoriesName = $_POST['editCategoriesName'];
	$categoriesStatus = $_POST['editCategoriesStatus']; 
	$categoriesId = $_POST['editCategoriesId'];
	$categoriesDescription = $_POST['editCategoriesDescription'];

	$sql = "UPDATE categories SET categories_name = '$categoriesName', categories_active = '$categoriesStatus', categories_description = '$categoriesDescription' WHERE categories_id = '$categoriesId'";

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