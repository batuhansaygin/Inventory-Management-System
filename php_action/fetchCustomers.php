<?php 	

require_once 'core.php';

$sql = "SELECT customers_id, customers_company, customers_product, customers_mb, customers_application, customers_pb, customers_pf, customers_equivalent FROM customers";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$categoriesId = $row[0];

 	$button = '<!-- Single button -->
	<div class="btn-group" style="display: flex; justify-content: center;">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
		<li><a type="button" data-toggle="modal" id="showCategoriesModalBtn" data-target="#showCategoriesModal" onclick="showCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-eye-open"></i> Details</a></li>
	    <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-trash"></i> Delete</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		// wordwrap($row[1],45,"<br>\n"),
		$row[1],
		$row[2],
		$row[3],
		$row[4],
		$row[5],
		$row[6],
		$row[7],
 		"<center>$button</center>"
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);