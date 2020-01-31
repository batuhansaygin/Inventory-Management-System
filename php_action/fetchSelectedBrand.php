<?php 	

require_once 'core.php';

$brandId = $_POST['brandId'];

$sql = "SELECT companies_id, companies_name FROM companies WHERE companies_id = $brandId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);