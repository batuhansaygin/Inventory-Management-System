<?php 	

require_once 'core.php';

$categoriesId = $_POST['categoriesId'];

$sql = "SELECT products_id, products_name, products_detail FROM products WHERE products_id = $categoriesId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);