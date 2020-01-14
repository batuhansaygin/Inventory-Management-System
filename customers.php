<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Anasayfa</a></li>		  
		  <li class="active">Müşteri Bazlı Arama</li>
		</ol>

		<div class="div-action pull pull-right" style="padding: 4px 20px 20px 0;">
					<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Müşteri Ekle </button>
		</div> <!-- /div-action -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-briefcase"></i> Kayıtlı Müşteriler</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="remove-messages"></div>
				<table class="table table-hover table-striped" id="manageCategoriesTable">
					<thead>
						<tr>							
							<th style="text-align:center;">Müşteri Adı</th>
							<th style="text-align:center;">Ürün</th>
							<th style="text-align:center;">MB</th>
							<th style="text-align:center;">Ürün Bazı</th>
							<th style="text-align:center;">Ürün Formu</th>
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

    	<form class="form-horizontal" id="submitCategoriesForm" action="php_action/createCustomers.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Yeni Müşteri</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-categories-messages"></div>

	        <div class="form-group">
	        	<label for="customersName" class="col-sm-3 control-label">Müşteri Adı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="customersName" placeholder="Örn: X Plastik San. Tic. Ltd. Şti." name="customersName">
						<div id="customersList"></div>
					</div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="customersProduct" class="col-sm-3 control-label">Ürün Adı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="customersProduct" placeholder="Örn: Beyaz Renkli Pencere Profili" name="customersProduct" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="customersMB" class="col-sm-3 control-label">M.B. </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="customersMB" name="customersMB">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="customersApplication" class="col-sm-3 control-label">Uygulama </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" rows="5" id="customersApplication" placeholder="Örn: Şu maddeden şu kadar kullanıldı." name="customersApplication" autocomplete="off"></textarea>
					</div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="customersPB" class="col-sm-3 control-label">Ürün Bazı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="customersPB" name="customersPB">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="customersPF" class="col-sm-3 control-label">Ürün Formu </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="customersPF" name="customersPF">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="customersEquivalent" class="col-sm-3 control-label">Muadil </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="customersEquivalent" placeholder="Örn: Muadil şudur." name="customersEquivalent" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
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
    	
    	<form class="form-horizontal" id="editCategoriesForm" action="php_action/editCustomers.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Müşteri Bilgilerini Düzenle</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-categories-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Yükleniyor...</span>
					</div>

		      <div class="edit-categories-result">
		      	
			<div class="form-group">
	        	<label for="editCustomersName" class="col-sm-3 control-label">Müşteri Adı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editCustomersName" placeholder="Örn: X Plastik San. Tic. Ltd. Şti." name="editCustomersName">
						<div id="customersList"></div>
					</div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="editCustomersProduct" class="col-sm-3 control-label">Ürün Adı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editCustomersProduct" placeholder="Örn: Beyaz Renkli Pencere Profili" name="editCustomersProduct" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="editCustomersMB" class="col-sm-3 control-label">M.B. </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="editCustomersMB" name="editCustomersMB">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="editCustomersApplication" class="col-sm-3 control-label">Uygulama </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" rows="5" id="editCustomersApplication" placeholder="Örn: Şu maddeden şu kadar kullanıldı." name="editCustomersApplication" autocomplete="off"></textarea>
					</div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="editCustomersPB" class="col-sm-3 control-label">Ürün Bazı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="editCustomersPB" name="editCustomersPB">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="editCustomersPF" class="col-sm-3 control-label">Ürün Formu </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="editCustomersPF" name="editCustomersPF">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="editCustomersEquivalent" class="col-sm-3 control-label">Muadil </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="editCustomersEquivalent" placeholder="Örn: Muadil şudur." name="editCustomersEquivalent" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
				
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
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Kayıtlı Müşteriyi Sil</h4>
      </div>
      <div class="modal-body">
        <p>Seçili müşteri silmek istediğinize emin misiniz ?</p>
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
    	
    	<form class="form-horizontal" id="showCategoriesForm" action="php_action/editCustomers.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="glyphicon glyphicon-list-alt"></i> Müşteri Bilgileri Ayrıntıları</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="show-categories-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Yükleniyor...</span>
					</div>

		      <div class="show-categories-result">
		      	<div class="form-group">
	        	<label for="showCustomersName" class="col-sm-3 control-label">Müşteri Adı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" style="font-weight: bold; pointer-events: none; background-color: white;" class="form-control" id="showCustomersName" placeholder="Örn: X Plastik San. Tic. Ltd. Şti." name="showCustomersName">
					</div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="showCustomersProduct" class="col-sm-3 control-label">Ürün Adı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" style="font-weight: bold; pointer-events: none; background-color: white;" class="form-control" id="showCustomersProduct" placeholder="Örn: Beyaz Renkli Pencere Profili" name="showCustomersProduct" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="showCustomersMB" class="col-sm-3 control-label">M.B. </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select style="font-weight: bold; pointer-events: none; background-color: white; -webkit-appearance: none;" class="form-control" id="showCustomersMB" name="showCustomersMB">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="showCustomersApplication" class="col-sm-3 control-label">Uygulama </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <textarea type="text" style="font-weight: bold; max-width: 100%; min-width: 100%; min-height:100px; pointer-events: none; background-color: white;" class="form-control" rows="5" id="showCustomersApplication" placeholder="Örn: Şu maddeden şu kadar kullanıldı." name="showCustomersApplication" autocomplete="off" readonly="true"></textarea>
					</div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="showCustomersPB" class="col-sm-3 control-label">Ürün Bazı </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select style="font-weight: bold; pointer-events: none; background-color: white; -webkit-appearance: none;" class="form-control" id="showCustomersPB" name="showCustomersPB">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="showCustomersPF" class="col-sm-3 control-label">Ürün Formu </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select style="font-weight: bold; pointer-events: none; background-color: white; -webkit-appearance: none;" class="form-control" id="showCustomersPF" name="showCustomersPF">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Seçim 1</option>
				      	<option value="2">Seçim 2</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="showCustomersEquivalent" class="col-sm-3 control-label">Muadil </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" style="font-weight: bold; pointer-events: none; background-color: white;" class="form-control" id="showCustomersEquivalent" placeholder="Örn: Muadil şudur." name="showCustomersEquivalent" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
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

<script src="custom/js/customers.js"></script>

<?php require_once 'includes/footer.php'; ?>