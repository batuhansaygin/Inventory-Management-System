<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Anasayfa</a></li>		  
		  <li class="active">Test Bazlı Arama</li>
		</ol>
		
		<div class="div-action pull pull-right" style="padding: 4px 20px 20px 0;">
			<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Test Ekle </button>
		</div> <!-- /div-action -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Kayıtlı Testler</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>
				
				<b>Toggle: </b>
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="0">Görsel</a> - 
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="1">Müşteri Adı</a> - 
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="2">Ürün Grubu</a> - 
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="3">Tarih</a> - 
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="4">Gerçekleştiren</a> - 
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="5">Test Sonucu</a> - 
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="6">Formül</a> - 
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="7">Mp</a> - 
				<a class="toggle-vis" onclick="javascript:toggle_link(this)" style="text-decoration: none; cursor: pointer; color:blue;" data-column="8">Test Çıktıları</a>
				
				<script>
					function toggle_link(select){
						var color = select.style.color;
						select.style.color = (color == "blue" ? "grey" : "blue");
					}
				</script>
				
				<table id="manageProductTable" class="table table-hover table-striped display" style="width:100%">
					<thead>
						<tr>
							<th style="text-align:center;">Görsel</th>
							<th style="text-align:center;">Müşteri Adı</th>
							<th style="text-align:center;">Ürün Grubu</th>
							<th style="text-align:center;">Tarih</th>
							<th style="text-align:center;">Gerçekleştiren</th>
							<th style="text-align:center;">Test Sonucu</th>
							<th style="text-align:center;">Formül</th>
							<th style="text-align:center;">Mp</th>
							<th style="text-align:center;">Test Çıktıları</th>
							<th style="text-align:center;">Eylem</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Görsel</th>
							<th>Müşteri Adı</th>
							<th>Ürün Grubu</th>
							<th>Tarih</th>
							<th>Gerçekleştiren</th>
							<th>Test Sonucu</th>
							<th>Formül</th>
							<th>Mp</th>
							<th>Test Çıktıları</th>
							<th>Eylem</th>
						</tr>
					</tfoot>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Yeni Test</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	      	<div class="form-group">
	        	<label for="productImage" class="col-sm-4 control-label">Ürün Görseli</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
					    <!-- the avatar markup -->
						<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;" multiple>
					    </div>
				      
				    </div>
	        </div> <!-- /form-group-->	     	           	       

	        <!--testsCustomer form-group-->
			<div class="form-group">
	        	<label for="testsCustomer" class="col-sm-4 control-label">Customer Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <select class="form-control" id="testsCustomer" name="testsCustomer">
				      	<option value="">Search and choose customer...</option>
				      	<?php 
				      	$sql = "SELECT companies_id, companies_name FROM companies";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[1]."'>".$row[1]."</option>";
								} // while
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->
			<!--/testsCustomer form-group-->
			
			<!--testsPG form-group-->
			<div class="form-group">
			<label for="testsPG" class="col-sm-4 control-label">Ürün Grubu</label>
			<label class="col-sm-1 control-label">: </label>
				<div class="col-sm-7">
					<select class="form-control" id="testsPG" name="testsPG">
							<option value="">Choose product group...</option>
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
	        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> İptal Et</button>
	        
	        <button type="submit" class="btn btn-success" id="createProductBtn" data-loading-text="Yükleniyor..." autocomplete="off"> <i class="glyphicon glyphicon-ok"></i> Kaydet</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Test Bilgilerini Düzenle</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#productInfo" aria-controls="home" role="tab" data-toggle="tab">Test Bilgileri</a></li>
					<li role="presentation"><a href="#photo" aria-controls="profile" role="tab" data-toggle="tab">Görsel</a></li>
				    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    <div role="tabpanel" class="tab-pane" id="photo">
				    	<form action="php_action/editProductImage.php" method="POST" id="updateProductImageForm" class="form-horizontal" enctype="multipart/form-data">

				    	<br />
				    	<div id="edit-productPhoto-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Mevcut Görsel: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">							    				   
						      <img src="" id="getProductImage" class="thumbnail" style="width:250px; height:250px;" multiple>
						    </div>
			        </div> <!-- /form-group-->	     	           	       
				    	
			      	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Yeni Görsel: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
							    <!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
							    <div class="kv-avatar center-block">					        
							        <input type="file" class="form-control" id="editProductImage" placeholder="Product Name" name="editProductImage" class="file-loading" style="width:auto;" multiple>
							    </div>
						      
						    </div>
			        </div> <!-- /form-group-->	     	           	       

			        <div class="modal-footer editProductPhotoFooter">
				        <button type="button" class="btn btn-success" data-dismiss="modal"> <i class="glyphicon glyphicon-ok"></i> Tamam</button>
				        
				        <!-- <button type="submit" class="btn btn-success" id="editProductImageBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button> -->
				      </div>
				      <!-- /modal-footer -->
				      </form>
				      <!-- /form -->
				    </div>
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane active" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

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

			        <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> İptal Et</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Yükleniyor..."> <i class="glyphicon glyphicon-ok"></i> Değişiklikleri Kaydet</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Testi Sil</h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Seçili testi silmek istediğinize emin misiniz ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Kapat</button>
        <button type="button" class="btn btn-success" id="removeProductBtn" data-loading-text="Yükleniyor..."> <i class="glyphicon glyphicon-ok"></i> Onayla</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>