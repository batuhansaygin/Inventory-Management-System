<?php

require_once 'core.php';

$sql = "SELECT tests.tests_id, tests.tests_pg, tests.tests_date, tests.tests_formula, 
tests.tests_mp, tests.tests_output, tests.tests_result, tests.tests_by, tests.tests_file, 
companies.companies_name FROM tests 
INNER JOIN companies ON tests.companies_id = companies.companies_id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {

 while($row = $result->fetch_array()) {
 	$productId = $row[0];
	
	$company = $row[9];
	$testsPG = "";
	$testsBy = "";
	$testsResult = "";
	
	// if testsPG
	if($row[1] == "Rnk.Pnc.Prf-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Renkli Pencere Profili (Ca)</label>";
 	} else if($row[1] == "Rnk.Pnc.Prf-Pb") { 		
 		$testsPG = "<label class='label label-info'>Renkli Pencere Profili (Pb)</label>";
 	} else if($row[1] == "Byz.Pnc.Prf-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Beyaz Pencere Profili (Ca)</label>";
 	} else if($row[1] == "Byz.Pnc.Prf-Pb") { 		
 		$testsPG = "<label class='label label-info'>Beyaz Pencere Profili (Pb)</label>";
 	} else if($row[1] == "Atk.Su.Bor-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Atık Su Borusu (Ca)</label>";
 	} else if($row[1] == "Atk.Su.Bor-Pb") { 		
 		$testsPG = "<label class='label label-info'>Atık Su Borusu (Pb)</label>";
 	} else if($row[1] == "Enj.Bor-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Enjeksiyonluk Boru (Ca</label>";
 	} else if($row[1] == "Enj.Bor-Pb") { 		
 		$testsPG = "<label class='label label-info'>Enjeksiyonluk Boru (Pb)</label>";
 	} else if($row[1] == "Tmz.Su.Bor-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Temiz Su Borusu (Ca)</label>";
 	} else if($row[1] == "Tmz.Su.Bor-Pb") { 		
 		$testsPG = "<label class='label label-info'>Temiz Su Borusu (Pb)</label>";
 	} else if($row[1] == "Kbl-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Kablo (Ca)</label>";
 	} else if($row[1] == "Kbl-Pb") { 		
 		$testsPG = "<label class='label label-info'>Kablo (Pb)</label>";
 	}else { 		
 		$testsPG = "<label class='label label-danger'>HATA! Eksik ya da silinmiş veri</label>";
 	} // else testsPG
	
	// if testsBy
	if($row[7] == "aksoy.fatih") { 		
 		$testsBy = "<label class='label label-default'>Fatih AKSOY</label>";
 	} else if($row[7] == "ergun.bekir") { 		
 		$testsBy = "<label class='label label-default'>Bekir Sıtkı ERGÜN</label>";
 	} else if($row[7] == "kucukbayrak.ruchan") { 		
 		$testsBy = "<label class='label label-default'>Rüçhan KÜÇÜKBAYRAK</label>";
 	} else if($row[7] == "citak.omer") { 		
 		$testsBy = "<label class='label label-default'>Ömer ÇITAK</label>";
 	} else if($row[7] == "kunt.kenan") { 		
 		$testsBy = "<label class='label label-default'>Kenan KUNT</label>";
 	} else if($row[7] == "oztekin.meric") { 		
 		$testsBy = "<label class='label label-default'>Meriç ÖZTEKİN</label>";
 	} else if($row[7] == "akkaynak.ali") { 		
 		$testsBy = "<label class='label label-default'>Ali AKKAYNAK</label>";
 	} else { 		
 		$testsBy = "<label class='label label-danger'>HATA! Eksik ya da silinmiş veri</label>";
 	} // else testsBy
	
	// if testsResult 
 	if($row[6] == 1) { 		
 		$testsResult = "<label class='label label-success'>Approved</label>";
 	} else if($row[6] == 2) { 		
 		$testsResult = "<label class='label label-warning'>Need Modify</label>";
 	} else { 		
 		$testsResult = "<label class='label label-danger'>Unapproved</label>";
 	} // else testsResult

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Actions <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu dropdown-menu-right">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> Show / Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

	$imageUrl = substr($row[8], 3);
	$productImage = "<img class='img-round' src='".$imageUrl."' style='height:30px; width:50px;' />";

 	$output['data'][] = array( 		
 		// image
 		"<center>$productImage</center>",
		$company,
		"<center>$testsPG</center>",
		"<center>$row[2]</center>",
		"<center>$testsBy</center>",
		"<center>$testsResult</center>",
		$row[3],
		$row[4],
		$row[5],
 		$button
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);