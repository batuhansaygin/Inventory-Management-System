<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$orderId 			= $_POST['orderId'];

	$recipeName 		= $_POST['recipeName'];
	$customerName 		= $_POST['customerName'];
	$userid 			= $_SESSION['userId'];
	
	$orderItemSql = "UPDATE recipes SET recipe_name = '$recipeName', customer_name = '$customerName', recipe_status = 1 ,user_id = '$userid' WHERE recipe_id = {$orderId}";

	$connect->query($orderItemSql);	
	
	$orderItemStatus = false;
	
	for($x = 0; $x < count($_POST['productName']); $x++) {

			if($x == count($_POST['productName'])) {
				$orderItemStatus = true;
			}
	} // for

	$valid['success'] = true;
	$valid['messages'] = "Successfully Updated";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);