<?php 	

require_once 'core.php';

$productId = $_GET['i'];

$sql = "SELECT tests_file FROM tests WHERE tests_id = {$productId}";
$data = $connect->query($sql);
$result = $data->fetch_row();

$connect->close();

echo "stock/" . $result[0];
