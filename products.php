<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Dashboard</a></li>		  
		  <li class="active">Product Based Search</li>
		</ol>

		<div class="div-action pull pull-right" style="padding: 4px 20px 20px 0;">
			<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus"></i> Add Product </button>
		</div> <!-- /div-action -->

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-briefcase"></i> Registered Products</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<div class="remove-messages"></div>
				
				<table id="manageCategoriesTable" class="table table-hover table-striped display" cellspacing="0" width="100%">
					<thead>
						<tr>							
							<th style="text-align:center;">Product Name</th>
							<th style="text-align:center;">Product Detail / Explanation</th>
							<th style="text-align:center;">Operations</th>
						</tr>
					</thead>
					<tfoot>
						<tr>							
							<th>Product Name</th>
							<th>Product Detail / Explanation</th>
							<th>Operations</th>
						</tr>
					</tfoot>
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

    	<form class="form-horizontal" id="submitCategoriesForm" action="php_action/createProducts.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus-sign"></i> New Product Registration </h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-categories-messages"></div>

	        <div class="form-group">
	        	<label for="productsName" class="col-sm-3 control-label">Product Name</label>
	        	<label class="col-sm-1 control-label">:</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productsName" placeholder="e.g., PVC - K 66 / 67" name="productsName">
						<div id="customersList"></div>
					</div>
	        </div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="productsDetails" class="col-sm-3 control-label">Product Detail</label>
	        	<label class="col-sm-1 control-label">:</label>
				    <div class="col-sm-8">
				      <textarea type="text" style="max-width: 100%; min-width: 100%; min-height:100px;" class="form-control" rows="5" id="productsDetails" placeholder="e.g., Şu maddeden şu kadar kullanıldı." name="productsDetails" autocomplete="off"></textarea>
					</div>
	        </div> <!-- /form-group-->
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
	        
	        <button type="submit" class="btn btn-success" id="createCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok"></i> Save</button>
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
    	
    	<form class="form-horizontal" id="editCategoriesForm" action="php_action/editProducts.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product Information</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-categories-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-categories-result">
		      	
				<div class="form-group">
					<label for="editProductsName" class="col-sm-3 control-label">Product Name </label>
					<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="editProductsName" placeholder="e.g., X Plastik San. Tic. Ltd. Şti." name="editProductsName">
							<div id="customersList"></div>
						</div>
				</div> <!-- /form-group-->

				<div class="form-group">
					<label for="editProductsDetails" class="col-sm-3 control-label">Product Detail</label>
					<label class="col-sm-1 control-label">: </label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" id="editProductsDetails" placeholder="e.g., Beyaz Renkli Pencere Profili" name="editProductsDetails" autocomplete="off">
						</div>
				</div> <!-- /form-group-->
		    </div>         	        
		    <!-- /edit categories result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editCategoriesFooter">
	        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Cancel</button>
	        
	        <button type="submit" class="btn btn-success" id="editCategoriesBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok"></i> Save Changes</button>
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
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Delete Registered Product</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the selected product ?</p>
      </div>
      <div class="modal-footer removeCategoriesFooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Cancel</button>
        <button type="button" class="btn btn-success" id="removeCategoriesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok"></i> Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->

<!-- show categories brand -->
<div class="modal fade" id="showCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="showCategoriesForm" action="php_action/editProducts.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="glyphicon glyphicon-list-alt"></i> Product Information Details</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="show-categories-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="show-categories-result">
		      	<div class="form-group">
	        	<label for="showProductsName" class="col-sm-3 control-label">Product Name</label>
	        	<label class="col-sm-1 control-label">:</label>
				    <div class="col-sm-8">
				      <input type="text" style="font-weight: bold; pointer-events: none; background-color: white;" class="form-control" id="showProductsName" placeholder="e.g., X Plastik San. Tic. Ltd. Şti." name="showProductsName">
					</div>
				</div> <!-- /form-group-->
				
				<div class="form-group">
					<label for="showProductsDetails" class="col-sm-3 control-label">Product Detail</label>
					<label class="col-sm-1 control-label">:</label>
						<div class="col-sm-8">
						  <textarea type="text" style="font-weight: bold; max-width: 100%; min-width: 100%; min-height:100px; background-color: white;" class="form-control" rows="5" id="showProductsDetails" placeholder="e.g., Şu maddeden şu kadar kullanıldı." name="showProductsDetails" autocomplete="off" readonly="true"></textarea>
						</div>
				</div> <!-- /form-group-->
		      </div>         	        
		      <!-- /show brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer showCategoriesFooter">
	        <button type="submit" class="btn btn-success" data-dismiss="modal"> <i class="glyphicon glyphicon-ok"></i> Okay</button>
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

<script src="custom/js/products.js"></script>

<?php require_once 'includes/footer.php'; ?>