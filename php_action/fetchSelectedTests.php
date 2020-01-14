<?php 	

require_once 'core.php';

$categoriesId = $_POST['categoriesId'];

$sql = "SELECT tests_id, tests_company, tests_pg, tests_date, tests_formula, tests_mp, tests_output, tests_result, tests_by FROM tests WHERE tests_id = $categoriesId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);