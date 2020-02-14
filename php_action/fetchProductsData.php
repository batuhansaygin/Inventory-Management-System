<?php 	

require_once 'core.php';

$sql = "SELECT products_id, products_name, products_detail FROM products";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);