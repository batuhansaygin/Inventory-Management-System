<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$brandId = $_POST['brandId'];

if($brandId) { 

 $sql = "UPDATE brands SET brand_status = 2 WHERE brand_id = {$brandId}";

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