<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Anasayfa</a></li>		  
		  <li class="active">Test Bazlı Arama</li>
		</ol>

		<div class="div-action pull pull-right" style="padding: 4px 20px 20px 0;">
					<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Test Ekle </button>
		</div> <!-- /div-action -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-check"></i> Kayıtlı Testler</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="remove-messages"></div>
				<table class="table table-hover table-striped" id="manageCategoriesTable">
					<thead>
						<tr>							
							<th style="text-align:center;">Müşteri Adı</th>
							<th style="text-align:center;">Ürün Grubu</th>
							<th style="text-align:center;">Test Tarihi</th>
							<th style="text-align:center;">Testi Gerçekleştiren</th>
							<th style="text-align:center;">Test Sonucu</th>
							<th style="text-align:center;">İşlem</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add categories -->
<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitCategoriesForm" action="php_action/createTests.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Yeni Test</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-categories-messages"></div>
			
			<!--testsCustomer form-group-->
			<div class="form-group">
	        	<label for="testsFile" class="col-sm-4 control-label">Product Image: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="testsFile" placeholder="Product Name" name="testsFile" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div>
			<!--/testsCustomer form-group-->
			
	        <!--testsCustomer form-group-->
			<div class="form-group">
			<label for="testsCustomer" class="col-sm-4 control-label">Müşteri Adı</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" id="testsCustomer" name="testsCustomer" placeholder="Örn: Baerlocher Kimya" />
			  <div id="customersList"></div>
			</div>
			</div> 
			<!--/testsCustomer form-group-->
			
			<!--testsPG form-group-->
			<div class="form-group">
			<label for="testsPG" class="col-sm-4 control-label">Ürün Grubu</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select class="form-control" id="testsPG" name="testsPG">
							<option value="">~~ Lütfen Ürün Grubunu Seçin ~~</option>
							<option value="Rnk.Pnc.Prf-Ca">Renkli Pencere Profili (Ca)</option>
							<option value="Rnk.Pnc.Prf-Pb">Renkli Pencere Profili (Pb)</option>
							<option value="Byz.Pnc.Prf-Ca">Beyaz Pencere Profili (Ca)</option>
							<option value="Byz.Pnc.Prf-Pb">Beyaz Pencere Profili (Pb)</option>
							<option value="Atk.Su.Bor-Ca">Atık Su Borusu (Ca)</option>
							<option value="Atk.Su.Bor-Pb">Atık Su Borusu (Pb)</option>
							<option value="Enj.Bor-Ca">Enjeksiyonluk Boru (Ca)</option>
							<option value="Enj.Bor-Pb">Enjeksiyonluk Boru (Pb)</option>
							<option value="Tmz.Su.Bor-Ca">Temiz Su Borusu (Ca)</option>
							<option value="Tmz.Su.Bor-Pb">Temiz Su Borusu (Pb)</option>
							<option value="Kbl-Ca">Kablo (Ca)</option>
							<option value="Kbl-Pb">Kablo (Pb)</option>
					</select>
				</div>
			</div>
			<!--/testsPG form-group-->

			<!--testsDate form-group-->
			<div class="form-group">
			<label for="testsDate" class="col-sm-4 control-label">Test Tarihi</label>
			<label class="col-sm-1 control-label">: </label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="testsDate" name="testsDate" placeholder="Örn: 11/07/2017" autocomplete="off"/>
			    </div>
			</div> 
			<!--/testsDate form-group-->
			
			<!--testsFormula form-group-->
			<div class="form-group">
			<label for="testsFormula" class="col-sm-4 control-label">Test Edilen Formül</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" id="testsFormula" placeholder="Örn: Şu maddeden şu kadar kullanıldı." name="testsFormula" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/testsFormula form-group-->
			
			<!--testsMP form-group-->
			<div class="form-group">
			<label for="testsMP" class="col-sm-4 control-label">Makine Parametreleri</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" id="testsMP" placeholder="Örn: Şu makinenin parametreleri şunlardır." name="testsMP" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/testsMP form-group-->

			<!--testsOutput form-group-->
			<div class="form-group">
			<label for="testsOutput" class="col-sm-4 control-label">Test Çıktıları</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" id="testsOutput" placeholder="Örn: Şu maddenin çıktısı şudur. Bu maddenin sonucu budur." name="testsOutput" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/testsOutput form-group-->
			
			<!--testsResult form-group-->
			<div class="form-group">
			<label for="testsResult" class="col-sm-4 control-label">Test Sonucu</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select class="form-control" id="testsResult" name="testsResult">
							<option value="">~~ Lütfen Test Sonucunu Seçin ~~</option>
							<option value="1">Onaylandı</option>
							<option value="2">Modifiye Edilecek</option>
							<option value="3">Onaylanmadı</option>
					</select>
				</div>
			</div>
			<!--/testsResult form-group-->
			
			<!--testsBy form-group-->
			<div class="form-group">
			<label for="testsBy" class="col-sm-4 control-label">Testi Gerçekleştiren</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select class="form-control" id="testsBy" name="testsBy">
							<option value="">~~ Lütfen Testi Gerçekleştireni Seçin ~~</option>
							<option value="aksoy.fatih">Fatih AKSOY</option>
							<option value="ergun.bekir">Bekir Sıtkı ERGÜN</option>
							<option value="kucukbayrak.ruchan">Rüçhan KÜÇÜKBAYRAK</option>
							<option value="citak.omer">Ömer ÇITAK</option>
							<option value="kunt.kenan">Kenan KUNT</option>
							<option value="oztekin.meric">Meriç ÖZTEKİN</option>
							<option value="akkaynak.ali">Ali AKKAYNAK</option>
					</select>
				</div>
			</div>
			<!--/testsBy form-group-->
			
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> İptal Et</button>
	        
	        <button type="submit" class="btn btn-success" id="createCategoriesBtn" data-loading-text="Yükleniyor..." autocomplete="off"> <i class="glyphicon glyphicon-ok"></i> Kaydet</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editCategoriesForm" action="php_action/editTests.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Test Bilgilerini Düzenle</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-categories-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Yükleniyor...</span>
					</div>

		      <div class="edit-categories-result">
		      	
			<!--editTestsCustomer form-group-->
			<div class="form-group">
			<label for="editTestsCustomer" class="col-sm-4 control-label">Müşteri Adı</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" id="editTestsCustomer" name="editTestsCustomer" placeholder="Örn: Baerlocher Kimya" />
			  <div id="customersList"></div>
			</div>
			</div> 
			<!--/editTestsCustomer form-group-->
			
			<!--editTestsPG form-group-->
			<div class="form-group">
			<label for="editTestsPG" class="col-sm-4 control-label">Ürün Grubu</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select class="form-control" id="editTestsPG" name="editTestsPG">
							<option value="">~~ Lütfen Ürün Grubunu Seçin ~~</option>
							<option value="Rnk.Pnc.Prf-Ca">Renkli Pencere Profili (Ca)</option>
							<option value="Rnk.Pnc.Prf-Pb">Renkli Pencere Profili (Pb)</option>
							<option value="Byz.Pnc.Prf-Ca">Beyaz Pencere Profili (Ca)</option>
							<option value="Byz.Pnc.Prf-Pb">Beyaz Pencere Profili (Pb)</option>
							<option value="Atk.Su.Bor-Ca">Atık Su Borusu (Ca)</option>
							<option value="Atk.Su.Bor-Pb">Atık Su Borusu (Pb)</option>
							<option value="Enj.Bor-Ca">Enjeksiyonluk Boru (Ca)</option>
							<option value="Enj.Bor-Pb">Enjeksiyonluk Boru (Pb)</option>
							<option value="Tmz.Su.Bor-Ca">Temiz Su Borusu (Ca)</option>
							<option value="Tmz.Su.Bor-Pb">Temiz Su Borusu (Pb)</option>
							<option value="Kbl-Ca">Kablo (Ca)</option>
							<option value="Kbl-Pb">Kablo (Pb)</option>
					</select>
				</div>
			</div>
			<!--/editTestsPG form-group-->

			<!--editTestsDate form-group-->
			<div class="form-group">
			<label for="editTestsDate" class="col-sm-4 control-label">Test Tarihi</label>
			<label class="col-sm-1 control-label">: </label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="editTestsDate" name="editTestsDate" placeholder="Örn: 05/09/2019" autocomplete="off" />
			    </div>
			</div> 
			<!--/editTestsDate form-group-->
			
			<!--editTestsFormula form-group-->
			<div class="form-group">
			<label for="editTestsFormula" class="col-sm-4 control-label">Test Edilen Formül</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" id="editTestsFormula" placeholder="Örn: Şu maddeden şu kadar kullanıldı." name="editTestsFormula" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/editTestsFormula form-group-->
			
			<!--editTestsMP form-group-->
			<div class="form-group">
			<label for="editTestsMP" class="col-sm-4 control-label">Makine Parametreleri</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" id="editTestsMP" placeholder="Örn: Şu makinenin parametreleri şunlardır." name="editTestsMP" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/editTestsMP form-group-->

			<!--editTestsOutput form-group-->
			<div class="form-group">
			<label for="editTestsOutput" class="col-sm-4 control-label">Test Çıktıları</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" id="editTestsOutput" placeholder="Örn: Şu maddenin çıktısı şudur. Bu maddenin sonucu budur." name="editTestsOutput" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/editTestsOutput form-group-->
			
			<!--editTestsResult form-group-->
			<div class="form-group">
			<label for="editTestsResult" class="col-sm-4 control-label">Test Sonucu</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select class="form-control" id="editTestsResult" name="editTestsResult">
							<option value="">~~ Lütfen Test Sonucunu Seçin ~~</option>
							<option value="1">Onaylandı</option>
							<option value="2">Modifiye Edilecek</option>
							<option value="3">Onaylanmadı</option>
					</select>
				</div>
			</div>
			<!--/editTestsResult form-group-->
			
			<!--editTestsBy form-group-->
			<div class="form-group">
			<label for="editTestsBy" class="col-sm-4 control-label">Testi Gerçekleştiren</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select class="form-control" id="editTestsBy" name="editTestsBy">
							<option value="">~~ Lütfen Testi Gerçekleştireni Seçin ~~</option>
							<option value="aksoy.fatih">Fatih AKSOY</option>
							<option value="ergun.bekir">Bekir Sıtkı ERGÜN</option>
							<option value="kucukbayrak.ruchan">Rüçhan KÜÇÜKBAYRAK</option>
							<option value="citak.omer">Ömer ÇITAK</option>
							<option value="kunt.kenan">Kenan KUNT</option>
							<option value="oztekin.meric">Meriç ÖZTEKİN</option>
							<option value="akkaynak.ali">Ali AKKAYNAK</option>
					</select>
				</div>
			</div>
			<!--/editTestsBy form-group-->
				
		    </div>         	        
		    <!-- /edit categories result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editCategoriesFooter">
	        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> İptal Et</button>
	        
	        <button type="submit" class="btn btn-success" id="editCategoriesBtn" data-loading-text="Yükleniyor..." autocomplete="off"> <i class="glyphicon glyphicon-ok"></i> Değişiklikleri Kaydet</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Testi Sil</h4>
      </div>
      <div class="modal-body">
        <p>Seçili testi silmek istediğinize emin misiniz ?</p>
      </div>
      <div class="modal-footer removeCategoriesFooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> İptal Et</button>
        <button type="button" class="btn btn-success" id="removeCategoriesBtn" data-loading-text="Yükleniyor..."> <i class="glyphicon glyphicon-ok"></i> Onayla</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->

<!-- show categories brand -->
<div class="modal fade" id="showCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="showCategoriesForm" action="php_action/editTests.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="glyphicon glyphicon-list-alt"></i> Test Ayrıntıları</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="show-categories-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Yükleniyor...</span>
					</div>

		      <div class="show-categories-result">
		      	
				<!--showTestsCustomer form-group-->
			<div class="form-group">
			<label for="showTestsCustomer" class="col-sm-4 control-label">Müşteri Adı</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <input type="text" style="font-weight: bold; pointer-events: none; background-color: white;" class="form-control" id="showTestsCustomer" name="showTestsCustomer" placeholder="HATA! Eksik ya da silinmiş veri" />
			  <div id="customersList"></div>
			</div>
			</div> 
			<!--/showTestsCustomer form-group-->
			
			<!--showTestsPG form-group-->
			<div class="form-group">
			<label for="showTestsPG" class="col-sm-4 control-label">Ürün Grubu</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select style="font-weight: bold; pointer-events: none; background-color: white; -webkit-appearance: none;" class="form-control" id="showTestsPG" name="showTestsPG">
							<option value="">HATA! Eksik ya da silinmiş veri</option>
							<option value="Rnk.Pnc.Prf-Ca">Renkli Pencere Profili (Ca)</option>
							<option value="Rnk.Pnc.Prf-Pb">Renkli Pencere Profili (Pb)</option>
							<option value="Byz.Pnc.Prf-Ca">Beyaz Pencere Profili (Ca)</option>
							<option value="Byz.Pnc.Prf-Pb">Beyaz Pencere Profili (Pb)</option>
							<option value="Atk.Su.Bor-Ca">Atık Su Borusu (Ca)</option>
							<option value="Atk.Su.Bor-Pb">Atık Su Borusu (Pb)</option>
							<option value="Enj.Bor-Ca">Enjeksiyonluk Boru (Ca)</option>
							<option value="Enj.Bor-Pb">Enjeksiyonluk Boru (Pb)</option>
							<option value="Tmz.Su.Bor-Ca">Temiz Su Borusu (Ca)</option>
							<option value="Tmz.Su.Bor-Pb">Temiz Su Borusu (Pb)</option>
							<option value="Kbl-Ca">Kablo (Ca)</option>
							<option value="Kbl-Pb">Kablo (Pb)</option>
					</select>
				</div>
			</div>
			<!--/showTestsPG form-group-->

			<!--showTestsDate form-group-->
			<div class="form-group">
			<label for="showTestsDate" class="col-sm-4 control-label">Test Tarihi</label>
			<label class="col-sm-1 control-label">: </label>
			    <div class="col-sm-7">
			      <input type="text" style="font-weight: bold; pointer-events: none; background-color: white;" class="form-control" id="showTestsDate" name="showTestsDate" placeholder="HATA! Eksik ya da silinmiş veri" autocomplete="off" />
			    </div>
			</div> 
			<!--/showTestsDate form-group-->
			
			<!--showTestsFormula form-group-->
			<div class="form-group">
			<label for="showTestsFormula" class="col-sm-4 control-label">Test Edilen Formül</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="font-weight: bold; max-width: 100%; min-width: 100%; min-height:100px; pointer-events: none; background-color: white;" class="form-control" id="showTestsFormula" placeholder="HATA! Eksik ya da silinmiş veri" name="showTestsFormula" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/showTestsFormula form-group-->
			
			<!--showTestsMP form-group-->
			<div class="form-group">
			<label for="showTestsMP" class="col-sm-4 control-label">Makine Parametreleri</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="font-weight: bold; max-width: 100%; min-width: 100%; min-height:100px; pointer-events: none; background-color: white;" class="form-control" id="showTestsMP" placeholder="HATA! Eksik ya da silinmiş veri" name="showTestsMP" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/showTestsMP form-group-->

			<!--showTestsOutput form-group-->
			<div class="form-group">
			<label for="showTestsOutput" class="col-sm-4 control-label">Test Çıktıları</label>
			<label class="col-sm-1 control-label">: </label>
			<div class="col-sm-7">
			  <textarea type="text" style="font-weight: bold; max-width: 100%; min-width: 100%; min-height:100px; pointer-events: none; background-color: white;" class="form-control" id="showTestsOutput" placeholder="HATA! Eksik ya da silinmiş veri" name="showTestsOutput" autocomplete="off"></textarea>
			</div>
			</div>
			<!--/showTestsOutput form-group-->
			
			<!--showTestsResult form-group-->
			<div class="form-group">
			<label for="showTestsResult" class="col-sm-4 control-label">Test Sonucu</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select style="font-weight: bold; pointer-events: none; background-color: white; -webkit-appearance: none;" class="form-control" id="showTestsResult" name="showTestsResult">
							<option value="">HATA! Eksik ya da silinmiş veri</option>
							<option value="1">Onaylandı</option>
							<option value="2">Modifiye Edilecek</option>
							<option value="3">Onaylanmadı</option>
					</select>
				</div>
			</div>
			<!--/showTestsResult form-group-->
			
			<!--showTestsBy form-group-->
			<div class="form-group">
			<label for="showTestsBy" class="col-sm-4 control-label">Testi Gerçekleştiren</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select style="font-weight: bold; pointer-events: none; background-color: white; -webkit-appearance: none;" class="form-control" id="showTestsBy" name="showTestsBy">
							<option value="">HATA! Eksik ya da silinmiş veri</option>
							<option value="aksoy.fatih">Fatih AKSOY</option>
							<option value="ergun.bekir">Bekir Sıtkı ERGÜN</option>
							<option value="kucukbayrak.ruchan">Rüçhan KÜÇÜKBAYRAK</option>
							<option value="citak.omer">Ömer ÇITAK</option>
							<option value="kunt.kenan">Kenan KUNT</option>
							<option value="oztekin.meric">Meriç ÖZTEKİN</option>
							<option value="akkaynak.ali">Ali AKKAYNAK</option>
					</select>
				</div>
			</div>
			<!--/showTestsBy form-group-->
		      </div>         	        
		      <!-- /show brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer showCategoriesFooter">
	        <button type="submit" class="btn btn-success" data-dismiss="modal"> <i class="glyphicon glyphicon-ok"></i> Tamam</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<script src="custom/js/tests.js"></script>

<?php require_once 'includes/footer.php'; ?>