<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 

if($_GET['o'] == 'add') { 
// add order
	echo "<div class='div-request div-hide'>add</div>";
} else if($_GET['o'] == 'manord') { 
	echo "<div class='div-request div-hide'>manord</div>";
} else if($_GET['o'] == 'editOrd') { 
	echo "<div class='div-request div-hide'>editOrd</div>";
} // /else manage order


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li>Recipe</li>
  <li class="active">
  	<?php if($_GET['o'] == 'add') { ?>
  		Add Recipe
		<?php } else if($_GET['o'] == 'manord') { ?>
			Manage Recipe
		<?php } // /else manage order ?>
  </li>
</ol>

<div class="div-action pull pull-right" style="padding: 35px 20px 20px 0;">
			<button class="btn btn-default button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal" ><a href="recipes.php?o=add"><i class="glyphicon glyphicon-plus"></i> New Recipe</a></button>
		</div> <!-- /div-action -->

<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php if($_GET['o'] == 'add') {
		echo "New Recipe Registration";
	} else if($_GET['o'] == 'manord') { 
		echo "Manage Recipes";
	} else if($_GET['o'] == 'editOrd') { 
		echo "Registered Recipe Details";
	}
	?>
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		<?php if($_GET['o'] == 'add') { ?>
  		<i class="glyphicon glyphicon-info-sign"></i> Recipe Information
		<?php } else if($_GET['o'] == 'manord') { ?>
			<i class="glyphicon glyphicon-edit"></i> Registered Recipes
		<?php } else if($_GET['o'] == 'editOrd') { ?>
			<i class="glyphicon glyphicon-info-sign"></i> Recipe Information
		<?php } ?>

	</div> <!--/panel-->	
	<div class="panel-body">
			
		<?php if($_GET['o'] == 'add') { 
			// add order
			?>			

			<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createOrder.php" id="createOrderForm">

			  
			  <div class="form-group">
			    <label for="recipeName" class="col-sm-3 control-label">Recipe Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="recipeName" name="recipeName" placeholder="Recipe Name" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="customerName" class="col-sm-3 control-label">Customers Using The Recipe</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Customers Using The Recipe" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->			  

			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="text-align:center; width:30%;">Product</th>
						<th style="text-align:center; width:10%;">Quantity</th>
			  			<th style="text-align:center; width:60%;">Product Detail / Explanation</th>
			  			<th style="text-align:center; width:10%;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 4; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td>
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="">~~SELECT~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM products";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								echo "<option value='".$row['products_id']."' id='changeProduct".$row['products_id']."'>".$row['products_name']."</option>";
										 	} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
			  				<td style="padding-left:35px;">
			  					<div class="form-group">
			  					<input type="number" step="any" required  name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="0" />
			  					</div>
			  				</td>
							<td style="padding-left:20px;">
			  					<input type="text" name="productsDetail[]" id="productsDetail<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />			  					
			  					<input type="hidden" name="hiddenProductsDetail[]" id="hiddenProductsDetail<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td>
			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
			  	</tbody>
			  </table>
			  <div class="form-group submitButtonFooter">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>
						<button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
						<button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
					</div>
			  </div> <!--submitButtonFooter-->
			  </div> <!--/col-md-6-->


			  
			</form>
		<?php } else if($_GET['o'] == 'manord') { 
			// manage order
			?>

			<div id="success-messages"></div>
			
			<table class="table" id="manageOrderTable">
				<thead>
					<tr>
						<th>#</th>
						<th style="text-align:center;">Recipe Name</th>
						<th style="text-align:center;">Customers</th>
						<th style="text-align:center;">Recipe Created By</th>
						<th style="text-align:center;">Operation</th>
					</tr>
				</thead>
			</table>

		<?php 
		// /else manage order
		} else if($_GET['o'] == 'editOrd') {
			// get order
			?>	
			<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/editOrder.php" id="editOrderForm">

  			<?php $orderId = $_GET['i'];

  			$sql = "SELECT recipes.recipe_id, recipes.recipe_name, recipes.customer_name FROM recipes 	
					WHERE recipes.recipe_id = {$orderId}";

				$result = $connect->query($sql);
				$data = $result->fetch_row();
  			?>
			
			  <div class="form-group">
			    <label class="col-sm-3 control-label">Recipe Name</label>
			    <div class="col-sm-9">
			      <input type="text" style="font-weight: bold; pointer-events: none; background-color: white;" class="form-control" id="recipeName" name="recipeName" placeholder="Recipe Name" autocomplete="off" value="<?php echo $data[1] ?>" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label class="col-sm-3 control-label">Customers Using The Recipe</label>
			    <div class="col-sm-9">
			      <input type="text" style="font-weight: bold; pointer-events: none; background-color: white;" class="form-control" id="customerName" name="customerName" placeholder="Customers Using The Recipe" autocomplete="off" value="<?php echo $data[2] ?>" />
			    </div>
			  </div> <!--/form-group-->			  

			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="text-align:center; width:30%;">Product</th>
						<th style="text-align:center; width:10%;">Quantity</th>
			  			<th style="text-align:center; width:60%;">Product Detail / Explanation</th>
			  			<th style="text-align:center; width:10%;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php

			  		$orderItemSql = "SELECT recipe_item.recipe_item_id, recipe_item.recipe_id, recipe_item.products_id, recipe_item.quantity, recipe_item.products_detail
					FROM recipe_item WHERE recipe_item.recipe_id = {$orderId}";
					
					$orderItemResult = $connect->query($orderItemSql);
						
			  		$arrayNumber = 0;
					
			  		$x = 1;
					
			  		while($orderItemData = $orderItemResult->fetch_array()) { 
			  		
					?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-left:20px;">
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" style="font-weight: bold; pointer-events: none; background-color: white; -webkit-appearance: none;" disabled>
			  						<option value="">~~SELECT~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM products";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								$selected = "";
			  								if($row['products_id'] == $orderItemData['products_id']) {
			  									$selected = "selected";
			  								} else {
			  									$selected = "";
			  								}

			  								echo "<option value='".$row['products_id']."' id='changeProduct".$row['products_id']."' ".$selected." >".$row['products_name']."</option>";
										 	} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
							<td style="padding-left:35px;">
			  					<div class="form-group">
			  					<input type="number" style="font-weight: bold; pointer-events: none; background-color: white;" name="quantity[]" step="any" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" value="<?php echo $orderItemData['quantity']; ?>" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="productsDetail[]" id="productsDetail<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" value="<?php echo $orderItemData['products_detail']; ?>" />			  					
			  					<input type="hidden" name="hiddenProductsDetail[]" id="hiddenProductsDetail<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['products_detail']; ?>" />
			  				</td>
			  				<td>
			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
		  			$x++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>

			  <div class="col-md-6">
			  	
			  </div> <!--/col-md-6-->


			  <div class="form-group editButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <!-- <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button> -->

			    <input type="hidden" name="orderId" id="orderId" value="<?php echo $_GET['i']; ?>" />
				
				<button type="button" class="btn btn-default button1" ><a href="recipes.php?o=manord"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></button>
			    <!-- <button type="submit" id="editOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button> -->
			      
			    </div>
			  </div>
			</form>

			<?php
		} // /get order else  ?>


	</div> <!--/panel-->	
</div> <!--/panel-->	


<!-- edit order -->
<div class="modal fade" tabindex="-1" role="dialog" id="paymentOrderModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i> Edit Payment</h4>
      </div>      

      <div class="modal-body form-horizontal" style="max-height:500px; overflow:auto;" >

      	<div class="paymentOrderMessages"></div>

      	     				 				 
			  <div class="form-group">
			    <label for="due" class="col-sm-3 control-label">Due Amount</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="due" name="due" disabled="true" />					
			    </div>
			  </div> <!--/form-group-->		
			  <div class="form-group">
			    <label for="payAmount" class="col-sm-3 control-label">Pay Amount</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="payAmount" name="payAmount"/>					      
			    </div>
			  </div> <!--/form-group-->		
			  <div class="form-group">
			    <label for="customerName" class="col-sm-3 control-label">Payment Type</label>
			    <div class="col-sm-9">
			      <select class="form-control" name="paymentType" id="paymentType" >
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Cheque</option>
			      	<option value="2">Cash</option>
			      	<option value="3">Credit Card</option>
			      </select>
			    </div>
			  </div> <!--/form-group-->							  
			  <div class="form-group">
			    <label for="customerName" class="col-sm-3 control-label">Payment Status</label>
			    <div class="col-sm-9">
			      <select class="form-control" name="paymentStatus" id="paymentStatus">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Full Payment</option>
			      	<option value="2">Advance Payment</option>
			      	<option value="3">No Payment</option>
			      </select>
			    </div>
			  </div> <!--/form-group-->							  				  
      	        
      </div> <!--/modal-body-->
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="updatePaymentOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>	
      </div>           
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /edit order-->

<!-- remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Order</h4>
      </div>
      <div class="modal-body">

      	<div class="removeOrderMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove order-->


<script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>


	