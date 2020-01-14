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
	    Eylem <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
		<li><a type="button" data-toggle="modal" id="showCategoriesModalBtn" data-target="#showCategoriesModal" onclick="showCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-eye-open"></i> Ayrıntılar</a></li>
	    <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-edit"></i> Düzenle</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-trash"></i> Sil</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 		
 		$row[2],
		$row[3],
		$row[5],
		$row[6],
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);