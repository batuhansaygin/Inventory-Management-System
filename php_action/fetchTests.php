<?php 	

require_once 'core.php';

$sql = "SELECT tests_id, tests_company, tests_pg, tests_date, tests_formula, tests_mp, tests_output, tests_result, tests_by FROM tests";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$categoriesId = $row[0];
	$testsPG = "";
	$testsBy = "";
	$testsResult = "";
	
	// if testsPG
	if($row[2] == "Rnk.Pnc.Prf-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Renkli Pencere Profili (Ca)</label>";
 	} else if($row[2] == "Rnk.Pnc.Prf-Pb") { 		
 		$testsPG = "<label class='label label-info'>Renkli Pencere Profili (Pb)</label>";
 	} else if($row[2] == "Byz.Pnc.Prf-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Beyaz Pencere Profili (Ca)</label>";
 	} else if($row[2] == "Byz.Pnc.Prf-Pb") { 		
 		$testsPG = "<label class='label label-info'>Beyaz Pencere Profili (Pb)</label>";
 	} else if($row[2] == "Atk.Su.Bor-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Atık Su Borusu (Ca)</label>";
 	} else if($row[2] == "Atk.Su.Bor-Pb") { 		
 		$testsPG = "<label class='label label-info'>Atık Su Borusu (Pb)</label>";
 	} else if($row[2] == "Enj.Bor-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Enjeksiyonluk Boru (Ca</label>";
 	} else if($row[2] == "Enj.Bor-Pb") { 		
 		$testsPG = "<label class='label label-info'>Enjeksiyonluk Boru (Pb)</label>";
 	} else if($row[2] == "Tmz.Su.Bor-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Temiz Su Borusu (Ca)</label>";
 	} else if($row[2] == "Tmz.Su.Bor-Pb") { 		
 		$testsPG = "<label class='label label-info'>Temiz Su Borusu (Pb)</label>";
 	} else if($row[2] == "Kbl-Ca") { 		
 		$testsPG = "<label class='label label-primary'>Kablo (Ca)</label>";
 	} else if($row[2] == "Kbl-Pb") { 		
 		$testsPG = "<label class='label label-info'>Kablo (Pb)</label>";
 	}else { 		
 		$testsPG = "<label class='label label-danger'>HATA! Eksik ya da silinmiş veri</label>";
 	} // else testsPG
	
	// if testsBy
	if($row[8] == "aksoy.fatih") { 		
 		$testsBy = "<label class='label label-default'>Fatih AKSOY</label>";
 	} else if($row[8] == "ergun.bekir") { 		
 		$testsBy = "<label class='label label-default'>Bekir Sıtkı ERGÜN</label>";
 	} else if($row[8] == "kucukbayrak.ruchan") { 		
 		$testsBy = "<label class='label label-default'>Rüçhan KÜÇÜKBAYRAK</label>";
 	} else if($row[8] == "citak.omer") { 		
 		$testsBy = "<label class='label label-default'>Ömer ÇITAK</label>";
 	} else if($row[8] == "kunt.kenan") { 		
 		$testsBy = "<label class='label label-default'>Kenan KUNT</label>";
 	} else if($row[8] == "oztekin.meric") { 		
 		$testsBy = "<label class='label label-default'>Meriç ÖZTEKİN</label>";
 	} else if($row[8] == "akkaynak.ali") { 		
 		$testsBy = "<label class='label label-default'>Ali AKKAYNAK</label>";
 	} else { 		
 		$testsBy = "<label class='label label-danger'>HATA! Eksik ya da silinmiş veri</label>";
 	} // else testsBy
	
	// if testsResult 
 	if($row[7] == 1) { 		
 		$testsResult = "<label class='label label-success'>Onaylandı</label>";
 	} else if($row[7] == 2) { 		
 		$testsResult = "<label class='label label-warning'>Modifiye Edilecek</label>";
 	} else { 		
 		$testsResult = "<label class='label label-danger'>Onaylanmadı</label>";
 	} // else testsResult
	
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
 		"<center>$testsPG</center>",
		"<center>$row[3]</center>",
		"<center>$testsBy</center>",
		"<center>$testsResult</center>",
 		"<center>$button</center>"
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);