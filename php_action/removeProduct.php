<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productId'];

if($productId) { 

 $sql = "DELETE FROM tests WHERE tests_id = {$productId}";

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