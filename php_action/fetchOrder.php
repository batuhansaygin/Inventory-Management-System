<?php 	

require_once 'core.php';

$sql = "SELECT recipe_id, recipe_name, customer_name, user_id FROM recipes WHERE recipe_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 
 
$x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM recipe_item WHERE recipe_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 	// if user_id
	if($row[3] == 3) { 		
 		$recipeBy = "<label class='label label-default'>Fatih AKSOY</label>";
 	} else if($row[3] == 4) { 		
 		$recipeBy = "<label class='label label-default'>Bekir Sıtkı ERGÜN</label>";
 	} else if($row[3] == 5) { 		
 		$recipeBy = "<label class='label label-default'>Rüçhan KÜÇÜKBAYRAK</label>";
 	} else if($row[3] == 6) { 		
 		$recipeBy = "<label class='label label-default'>Ömer ÇITAK</label>";
 	} else if($row[3] == 7) { 		
 		$recipeBy = "<label class='label label-default'>Kenan KUNT</label>";
 	} else if($row[3] == 8) { 		
 		$recipeBy = "<label class='label label-default'>Meriç ÖZTEKİN</label>";
 	} else if($row[3] == 9) { 		
 		$recipeBy = "<label class='label label-default'>Ali AKKAYNAK</label>";
 	} else { 		
 		$recipeBy = "<label class='label label-danger'>Administrator</label>";
 	} // else user_id

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li><a href="recipes.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Details</a></li>
	    
	    
	    <li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';		

 	$output['data'][] = array( 		
 		// recipe no
 		$x,
 		// recipe name
 		$row[1],
 		// customer name
 		$row[2], 
 		// user_id
 		"<center>$recipeBy</center>",
 		"<center>$button</center>"		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);