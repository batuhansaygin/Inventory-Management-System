<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$categoriesId = $_POST['categoriesId'];

if($categoriesId) { 

 $sql = "DELETE FROM customers WHERE customers_id = {$categoriesId}";
 
 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Başarıyla Silindi.";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Silinirken bir hata ile karşılaşıldı.";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST