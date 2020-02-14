var manageCategoriesTable;

$(document).ready(function() {
	
	// search customer_name for customer
	// $('#customersName').keyup(function(){
		   // var query = $(this).val();
		   // if(query != '')
		   // {
				// $.ajax({
					 // url:"php_action/searchCustomers.php",
					 // method:"POST",
					 // data:{query:query},
					 // success:function(data)
					 // {
						  // $('#customersList').fadeIn();
						  // $('#customersList').html(data);
					 // }
				// });
		   // }
	  // });
	  // $(document).on('click', 'li', function(){
		   // $('#customersName').val($(this).text());
		   // $('#customersList').fadeOut();
	  // });
	
	// active top navbar categories
	$('#navCustomers').addClass('active');	
	
	// selectize for createCustomers
	var $select = $('#customersName').selectize({
		sortField: 'text'
	});
	var control = $select[0].selectize;
	
	// Individual column searching (text inputs) Data Table
    $('#manageCategoriesTable tfoot th').each( function () {
        var title = $('#manageCategoriesTable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    manageCategoriesTable = $('#manageCategoriesTable').DataTable( {
        "ajax" : "php_action/fetchCustomers.php",
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

			var customersName 			= $("#customersName").val();
			var customersProduct 		= $("#customersProduct").val();
			var customersMB 			= $("#customersMB").val();
			var customersApplication 	= $("#customersApplication").val();
			var customersPB 			= $("#customersPB").val();
			var customersPF 			= $("#customersPF").val();
			var customersEquivalent 	= $("#customersEquivalent").val();

			if(customersName == "") {
				$("#customersName").after('<p class="text-danger">This section cannot be left blank.<br/>If you cannot find your customer in the list, please add a new company from "Companies" tab.</p>');
				$('#customersName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#customersName").find('.text-danger').remove();
				// success out for form 
				$("#customersName").closest('.form-group').addClass('has-success');	  	
			}
			
			if(customersProduct == "") {
				$("#customersProduct").after('<p class="text-danger">This section cannot be left blank.</p>');
				$('#customersProduct').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#customersProduct").find('.text-danger').remove();
				// success out for form 
				$("#customersProduct").closest('.form-group').addClass('has-success');	  	
			}
			
			if(customersMB == "") {
				$("#customersMB").after('<p class="text-danger">This section cannot be left blank.</p>');
				$('#customersMB').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#customersMB").find('.text-danger').remove();
				// success out for form 
				$("#customersMB").closest('.form-group').addClass('has-success');	  	
			}
			
			if(customersApplication == "") {
				$("#customersApplication").after('<p class="text-danger">This section cannot be left blank.</p>');
				$('#customersApplication').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#customersApplication").find('.text-danger').remove();
				// success out for form 
				$("#customersApplication").closest('.form-group').addClass('has-success');	  	
			}
			
			if(customersPB == "") {
				$("#customersPB").after('<p class="text-danger">This section cannot be left blank.</p>');
				$('#customersPB').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#customersPB").find('.text-danger').remove();
				// success out for form 
				$("#customersPB").closest('.form-group').addClass('has-success');	  	
			}
			
			if(customersPF == "") {
				$("#customersPF").after('<p class="text-danger">This section cannot be left blank.</p>');
				$('#customersPF').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#customersPF").find('.text-danger').remove();
				// success out for form 
				$("#customersPF").closest('.form-group').addClass('has-success');	  	
			}
			
			if(customersEquivalent == "") {
				$("#customersEquivalent").after('<p class="text-danger">This section cannot be left blank.</p>');
				$('#customersEquivalent').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#customersEquivalent").find('.text-danger').remove();
				// success out for form 
				$("#customersEquivalent").closest('.form-group').addClass('has-success');	  	
			}

			if(customersName && customersProduct && customersMB && customersApplication && customersPB && customersPF && customersEquivalent) {
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

							// clear selectize state
							control.clear();

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
			url: 'php_action/fetchSelectedCustomers.php',
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
				$("#showCustomersName").val(response.companies_id);
				$("#showCustomersProduct").val(response.customers_product);
				$("#showCustomersMB").val(response.customers_mb);
				$("#showCustomersApplication").val(response.customers_application);
				$("#showCustomersPB").val(response.customers_pb);
				$("#showCustomersPF").val(response.customers_pf);
				$("#showCustomersEquivalent").val(response.customers_equivalent);
				
				// add the categories id 
				$(".showCategoriesFooter").after('<input type="hidden" name="showCategoriesId" id="showCategoriesId" value="'+response.customers_id+'" />');
				
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
			url: 'php_action/fetchSelectedCustomers.php',
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
				$("#editCustomersName").val(response.companies_id);
				$("#editCustomersProduct").val(response.customers_product);
				$("#editCustomersMB").val(response.customers_mb);
				$("#editCustomersApplication").val(response.customers_application);
				$("#editCustomersPB").val(response.customers_pb);
				$("#editCustomersPF").val(response.customers_pf);
				$("#editCustomersEquivalent").val(response.customers_equivalent);
				
				// add the categories id 
				$(".editCategoriesFooter").after('<input type="hidden" name="editCategoriesId" id="editCategoriesId" value="'+response.customers_id+'" />');


				// submit of edit categories form
				$("#editCategoriesForm").unbind('submit').bind('submit', function() {
					
					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');
					
					var customersName 			= $("#editCustomersName").val();
					var customersProduct 		= $("#editCustomersProduct").val();
					var customersMB 			= $("#editCustomersMB").val();
					var customersApplication 	= $("#editCustomersApplication").val();
					var customersPB 			= $("#editCustomersPB").val();
					var customersPF 			= $("#editCustomersPF").val();
					var customersEquivalent 	= $("#editCustomersEquivalent").val();

					if(customersName == "") {
						$("#editCustomersName").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editCustomersName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCustomersName").find('.text-danger').remove();
						// success out for form 
						$("#editCustomersName").closest('.form-group').addClass('has-success');	  	
					}
					
					if(customersProduct == "") {
						$("#editCustomersProduct").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editCustomersProduct').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCustomersProduct").find('.text-danger').remove();
						// success out for form 
						$("#editCustomersProduct").closest('.form-group').addClass('has-success');	  	
					}
					
					if(customersMB == "") {
						$("#editCustomersMB").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editCustomersMB').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCustomersMB").find('.text-danger').remove();
						// success out for form 
						$("#editCustomersMB").closest('.form-group').addClass('has-success');	  	
					}
					
					if(customersApplication == "") {
						$("#editCustomersApplication").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editCustomersApplication').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCustomersApplication").find('.text-danger').remove();
						// success out for form 
						$("#editCustomersApplication").closest('.form-group').addClass('has-success');	  	
					}
					
					if(customersPB == "") {
						$("#editCustomersPB").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editCustomersPB').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCustomersPB").find('.text-danger').remove();
						// success out for form 
						$("#editCustomersPB").closest('.form-group').addClass('has-success');	  	
					}
					
					if(customersPF == "") {
						$("#editCustomersPF").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editCustomersPF').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCustomersPF").find('.text-danger').remove();
						// success out for form 
						$("#editCustomersPF").closest('.form-group').addClass('has-success');	  	
					}
					
					if(customersEquivalent == "") {
						$("#editCustomersEquivalent").after('<p class="text-danger">This section cannot be left blank.</p>');
						$('#editCustomersEquivalent').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCustomersEquivalent").find('.text-danger').remove();
						// success out for form 
						$("#editCustomersEquivalent").closest('.form-group').addClass('has-success');	  	
					}

					if(customersName && customersProduct && customersMB && customersApplication && customersPB && customersPF && customersEquivalent) {
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
		url: 'php_action/fetchSelectedCustomers.php',
		type: 'post',
		data: {categoriesId: categoriesId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeCategoriesBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCategoriesBtn").button('loading');

				$.ajax({
					url: 'php_action/removeCustomers.php',
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