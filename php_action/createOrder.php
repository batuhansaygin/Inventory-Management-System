<?php
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'recipe_id' => '');
// print_r($valid);
if($_POST) {	

	$recipeName 		= $_POST['recipeName'];
	$customerName 		= $_POST['customerName'];
	$userid 			= $_SESSION['userId'];
	  
	$sql = "INSERT INTO recipes (recipe_name, customer_name,recipe_status,user_id) VALUES ('$recipeName', '$customerName', 1, $userid)";
	
	$recipe_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$recipe_id = $connect->insert_id;
		$valid['recipe_id'] = $recipe_id;

		$orderStatus = true;
	}
		
	// echo $_POST['productName'];
	$orderItemStatus = false;
	
	for($x = 0; $x < count($_POST['productName']); $x++) {	
	// add into recipe_item
	$orderItemSql = "INSERT INTO recipe_item (recipe_id, products_id, quantity, products_detail, recipe_item_status) 
	VALUES ('$recipe_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['hiddenProductsDetail'][$x]."',  1)";

	$connect->query($orderItemSql);	

			if($x == count($_POST['productName'])) {
				$orderItemStatus = true;
			}
	} // for
	
	$valid['success'] = true;
	$valid['messages'] = "Successfully Added";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);