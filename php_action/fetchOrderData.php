<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$valid = array('order' => array(), 'recipe_item' => array());

$sql = "SELECT recipes.recipe_id, recipes.recipe_name, recipes.customer_name FROM recipes 
		WHERE recipes.recipe_id = {$orderId}";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$connect->close();

echo json_encode($valid);