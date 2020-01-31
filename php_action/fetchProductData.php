<?php 	

require_once 'core.php';

$sql = "SELECT tests_id, tests_name FROM tests";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);