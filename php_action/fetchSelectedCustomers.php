<?php 	

require_once 'core.php';

$categoriesId = $_POST['categoriesId'];

$sql = "SELECT customers_id, customers_company, customers_product, customers_mb, customers_application, customers_pb, customers_pf, customers_equivalent FROM customers WHERE customers_id = $categoriesId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);