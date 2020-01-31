<?php 	

require_once 'core.php';

$sql = "SELECT products_id, products_name, products_detail FROM products";
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
 		"<center>$button</center>"
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);