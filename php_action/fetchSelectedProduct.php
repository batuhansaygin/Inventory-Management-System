<?php 	

require_once 'core.php';

$productId = $_POST['productId'];

$sql = "SELECT tests_id, tests_company, tests_pg, tests_date, tests_formula, tests_mp, tests_output, tests_result, tests_by, tests_file FROM tests WHERE tests_id = $productId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);