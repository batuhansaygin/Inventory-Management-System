<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Anasayfa</a></li>		  
		  <li class="active">Formüller</li>
		</ol>

		<div class="div-action pull pull-right" style="padding: 4px 20px 20px 0;">
					<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Yeni Formül </button>
		</div> <!-- /div-action -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Formül Yönetimi</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="remove-messages"></div>
				<table class="table table-hover" id="manageCategoriesTable">
					<thead>
						<tr>							
							<th style="width:70%;">Formül Adı</th>
							<th style="width:15%; text-align:center;">Durum</th>
							<th style="width:15%; text-align:center;">İşlem</th>
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

    	<form class="form-horizontal" id="submitCategoriesForm" action="php_action/createCategories.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Formül Ekle</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-categories-messages"></div>

	        <div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Formül Adı</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" placeholder="Örn: Polietilen Teraftalat" name="categoriesName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<label for="categoriesStatus" class="col-sm-4 control-label">Durum</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <select class="form-control" id="categoriesStatus" name="categoriesStatus">
				      	<option value="">~~ SEÇİM YAP ~~</option>
				      	<option value="1">Aktif</option>
				      	<option value="2">Pasif</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->
			<!-- /new-features-->
			<div class="form-group">
				<label for="categoriesDescription" class="col-sm-4 control-label">Formül Açıklaması</label>
				<label class="col-sm-1 control-label">: </label>
					<div class="col-sm-7">
						<textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" rows="5" id="categoriesDescription" placeholder="Örn: Şu maddeden şu kadar kullanıldı." name="categoriesDescription" autocomplete="off"></textarea>
					</div>
			</div>
<hr/> <p style="color:red;font-size:24px;">
      Bu bölüm <strong>Deneyimsel Geliştirme</strong> alanıdır.</p>

<div class="checkbox">
  <label for="checkbox" class="col-sm-4 control-label">Formül İçeriği</label>
  <label class="col-sm-1 control-label">: </label>
  <div class="col-sm-7">
  <label><input type="checkbox" value="icerik1">1. İçerik</label><br>
  <label><input type="checkbox" value="icerik2">2. İçerik</label><br>
  <label><input type="checkbox" value="icerik3" disabled class="">3. İçerik</label>
</div>
</div>

<label class="checkbox-inline"><input type="checkbox" value="" class="col-sm-4 control-label">Option 1</label>
<label class="checkbox-inline"><input type="checkbox" value="" class="col-sm-4 control-label">Option 2</label>
<label class="checkbox-inline"><input type="checkbox" value="" class="col-sm-4 control-label">Option 3</label>

<div class="radio">
  <label><input type="radio" name="optradio" checked class="col-sm-4 control-label">Option 1</label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio" class="col-sm-4 control-label">Option 2</label>
</div>
<div class="radio disabled">
  <label><input type="radio" name="optradio" disabled class="col-sm-4 control-label">Option 3</label>
</div>

<label class="radio-inline"><input type="radio" name="optradio" checked class="col-sm-4 control-label">Option 1</label>
<label class="radio-inline"><input type="radio" name="optradio" class="col-sm-4 control-label">Option 2</label>
<label class="radio-inline"><input type="radio" name="optradio" class="col-sm-4 control-label">Option 3</label>

<div class="form-group">
  <label for="sel1" class="col-sm-4 control-label">Select list:</label>
  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>


<!-- /new-features-->			
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
	        
	        <button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Yükleniyor..." autocomplete="off">Kaydet</button>
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
    	
    	<form class="form-horizontal" id="editCategoriesForm" action="php_action/editCategories.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Formülü Düzenle</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-categories-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Yükleniyor...</span>
					</div>

		      <div class="edit-categories-result">
		      	<div class="form-group">
		        	<label for="editCategoriesName" class="col-sm-4 control-label">Formül Adı: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="editCategoriesName" placeholder="Örn: Polietilen Teraftalat" name="editCategoriesName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editCategoriesStatus" class="col-sm-4 control-label">Durum: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <select class="form-control" id="editCategoriesStatus" name="editCategoriesStatus">
					      	<option value="">~~ SEÇİM YAP ~~</option>
					      	<option value="1">Aktif</option>
					      	<option value="2">Pasif</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->
				<div class="form-group">
				<label for="editCategoriesDescription" class="col-sm-4 control-label">Formül Açıklaması</label>
				<label class="col-sm-1 control-label">: </label>
					<div class="col-sm-7">
						<textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" rows="5" id="editCategoriesDescription" placeholder="Örn: Şu maddeden şu kadar kullanıldı." name="editCategoriesDescription" autocomplete="off"></textarea>
					</div>
			</div> <!-- /form-group-->	 
		    </div>         	        
		    <!-- /edit categories result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editCategoriesFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Kapat</button>
	        
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
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Formülü Sil</h4>
      </div>
      <div class="modal-body">
        <p>Formülü silmek istediğinize emin misiniz ?</p>
      </div>
      <div class="modal-footer removeCategoriesFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> İptal Et</button>
        <button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Yükleniyor..."> <i class="glyphicon glyphicon-ok"></i> Onayla</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->

<!-- show categories brand -->
<div class="modal fade" id="showCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="showCategoriesForm" action="php_action/editCategories.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="glyphicon glyphicon-list-alt"></i> Formül Ayrıntıları</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="show-categories-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Yükleniyor...</span>
					</div>

		      <div class="show-categories-result">
		      	<div class="form-group">
		        	<label for="showCategoriesName" class="col-sm-4 control-label">Formül Adı: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <input type="text" style="pointer-events: none; background-color: white;" class="form-control" id="showCategoriesName" name="showCategoriesName" autocomplete="off" readonly="true">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="showCategoriesStatus" class="col-sm-4 control-label">Durum: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-7">
					      <select style="pointer-events: none; background-color: white; -webkit-appearance: none;" class="form-control" id="showCategoriesStatus" name="showCategoriesStatus" disabled>
					      	<option value="">~~ SEÇİM YAP ~~</option>
					      	<option value="1">Aktif</option>
					      	<option value="2">Pasif</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->
				<div class="form-group">
				<label for="showCategoriesDescription" class="col-sm-4 control-label">Formül Açıklaması</label>
				<label class="col-sm-1 control-label">: </label>
					<div class="col-sm-7">
						<textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px; background-color: white;" class="form-control" rows="5" id="showCategoriesDescription" name="showCategoriesDescription" autocomplete="off" readonly="true"></textarea>
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

<script src="custom/js/categories.js"></script>

<?php require_once 'includes/footer.php'; ?>