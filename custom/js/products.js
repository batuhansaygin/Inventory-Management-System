var manageCategoriesTable;

$(document).ready(function() {
	
	// search customer_name for customer
	$('#customersName').keyup(function(){
           var query = $(this).val();
           if(query != '')
           {
                $.ajax({
                     url:"php_action/searchProducts.php",
                     method:"POST",
                     data:{query:query},
                     success:function(data)
                     {
                          $('#customersList').fadeIn();
                          $('#customersList').html(data);
                     }
                });
           }
      });
      $(document).on('click', 'li', function(){
           $('#customersName').val($(this).text());
           $('#customersList').fadeOut();
      });
	
	// active top navbar categories
	$('#navCategories').addClass('active');	
	
	// Individual column searching (text inputs) Data Table
    $('#manageCategoriesTable tfoot th').each( function () {
        var title = $('#manageCategoriesTable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    manageCategoriesTable = $('#manageCategoriesTable').DataTable( {
        "ajax" : "php_action/fetchProducts.php",
		"order": [],
		colReorder: true,
        scrollX: true,
		scrollY: '50vh',
        scrollCollapse: true,
        paging: false,
		dom: 'Bfrtip',
        buttons: [
			'columnsToggle'
        ]
    } );
	
    $( manageCategoriesTable.table().container() ).on( 'keyup change', 'tfoot input', function () {
       manageCategoriesTable
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );
	// Individual column searching (text inputs) Data Table
	
	$('#manageCategoriesTable').css('min-height','50vh'); // DataTables for default minimum size

	// on click on submit categories form modal
	$('#addCategoriesModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitCategoriesForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit categories form function
		$("#submitCategoriesForm").unbind('submit').bind('submit', function() {
			
			// remove the error text
			$(".text-danger").remove();
			// remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');

			var productsName 			= $("#productsName").val();
			var productsDetails 		= $("#productsDetails").val();

			if(productsName == "") {
				$("#productsName").after('<p class="text-danger">This section cannot be left blank.</p>');
				$('#productsName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#productsName").find('.text-danger').remove();
				// success out for form 
				$("#productsName").closest('.form-group').addClass('has-success');	  	
			}
			
			if(productsDetails == "") {
				$("#productsDetails").after('<p class="text-danger">This section cannot be left blank.</p>');
				$('#productsDetails').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#productsDetails").find('.text-danger').remove();
				// success out for form 
				$("#productsDetails").closest('.form-group').addClass('has-success');	  	
			}
			
			if(productsName && productsDetails) {
				var form = $(this);
				// button loading
				$("#createCategoriesBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loading
						$("#createCategoriesBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageCategoriesTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitCategoriesForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-categories-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						}  // if

					} // /success
				}); // /ajax	
			} // if

			return false;
		}); // submit categories form function
	}); // /on click on submit categories form modal	

}); // /document

// show categories function
function showCategories(categoriesId = null) {
	if(categoriesId) {
		
		$.ajax({
			url: 'php_action/fetchSelectedProducts.php',
			type: 'post',
			data: {categoriesId: categoriesId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.show-categories-result').removeClass('div-hide');
				//modal footer
				$(".showCategoriesFooter").removeClass('div-hide');	

				// set the categories name
				$("#showProductsName").val(response.products_name);
				$("#showProductsDetails").val(response.products_detail);
				
				// add the categories id 
				$(".showCategoriesFooter").after('<input type="hidden" name="showCategoriesId" id="showCategoriesId" value="'+response.products_id+'" />');
				
			} // /success
		}); // /fetch the selected categories data

	} else {
		alert('HATA! Lutfen sayfayi yenileyin.');
	}
} // /show categories function

// edit categories function
function editCategories(categoriesId = null) {
	if(categoriesId) {
		// remove the added categories id 
		$('#editCategoriesId').remove();
		// reset the form text
		$("#editCategoriesForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit categories messages
		$("#edit-categories-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-categories-result').addClass('div-hide');
		//modal footer
		$(".editCategoriesFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectedProducts.php',
			type: 'post',
			data: {categoriesId: categoriesId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-categories-result').removeClass('div-hide');
				//modal footer
				$(".editCategoriesFooter").removeClass('div-hide');	

				// set the categories name
				$("#editProductsName").val(response.products_name);
				$("#editProductsDetails").val(response.products_detail);
				
				// add the categories id 
				$(".editCategoriesFooter").after('<input type="hidden" name="editCategoriesId" id="editCategoriesId" value="'+response.products_id+'" />');


				// submit of edit categories form
				$("#editCategoriesForm").unbind('submit').bind('submit', function() {
					
					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');
					
					var productsName 			= $("#editProductsName").val();
					var productsDetails 		= $("#editProductsDetails").val();

					if(productsName == "") {
						$("#editProductsName").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editProductsName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductsName").find('.text-danger').remove();
						// success out for form 
						$("#editProductsName").closest('.form-group').addClass('has-success');	  	
					}
					
					if(productsDetails == "") {
						$("#editProductsDetails").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editProductsDetails').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductsDetails").find('.text-danger').remove();
						// success out for form 
						$("#editProductsDetails").closest('.form-group').addClass('has-success');	  	
					}

					if(productsName && productsDetails) {
						var form = $(this);
						// button loading
						$("#editCategoriesBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editCategoriesBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageCategoriesTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-categories-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}  // if

							} // /success
						}); // /ajax	
					} // if


					return false;
				}); // /submit of edit categories form

			} // /success
		}); // /fetch the selected categories data

	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit categories function

// remove categories function
function removeCategories(categoriesId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedProducts.php',
		type: 'post',
		data: {categoriesId: categoriesId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeCategoriesBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCategoriesBtn").button('loading');

				$.ajax({
					url: 'php_action/removeProducts.php',
					type: 'post',
					data: {categoriesId: categoriesId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove categories btn
							$("#removeCategoriesBtn").button('reset');
							// close the modal 
							$("#removeCategoriesModal").modal('hide');
							// update the manage categories table
							manageCategoriesTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} else {
 							// close the modal 
							$("#removeCategoriesModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else
						
						
					} // /success function
				}); // /ajax function request server to remove the categories data
			}); // /remove categories btn clicked to remove the categories function

		} // /response
	}); // /ajax function to fetch the categories data
} // remove categories function