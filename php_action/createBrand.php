<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$brandName 		= $_POST['brandName'];
	$brandStatus 	= $_POST['brandStatus']; 

	$sql = "INSERT INTO brands (brand_name, brand_active, brand_status) VALUES ('$brandName', '$brandStatus', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Sirket Basariyla Eklendi.";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Ekleme sirasinda bir hata ile karsilasildi.";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST