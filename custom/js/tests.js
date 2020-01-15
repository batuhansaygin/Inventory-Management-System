var manageCategoriesTable;

$(document).ready(function() {
	
	// search customer_name for customer
	$('#testsCustomer').keyup(function(){
           var query = $(this).val();
           if(query != '')
           {
                $.ajax({
                     url:"php_action/searchCustomers.php",
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
           $('#testsCustomer').val($(this).text());
           $('#customersList').fadeOut();
      });
	
	// active top navbar for Testler
	$('#navTests').addClass('active');	
	
	// Test Tarihi datepicker
	$("#testsDate").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#editTestsDate").datepicker({ dateFormat: 'yy-mm-dd' });
	
	// Ek Dosya fileinput 
	$("#testsFile").fileinput({
        showPreview: false,
        //allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
        elErrorContainer: "#errorBlock"
    });

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'php_action/fetchTests.php',
		'order': []
	}); // manage categories Data Table

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

			var testsCustomer	= $("#testsCustomer").val();
			var testsPG      	= $("#testsPG").val();
			var testsDate    	= $("#testsDate").val();
			var testsFormula  	= $("#testsFormula").val();
			var testsMP      	= $("#testsMP").val();
			var testsOutput  	= $("#testsOutput").val();
			var testsResult  	= $("#testsResult").val();
			var testsBy      	= $("#testsBy").val();

			if(testsCustomer == "") {
				$("#testsCustomer").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#testsCustomer').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#testsCustomer").find('.text-danger').remove();
				// success out for form 
				$("#testsCustomer").closest('.form-group').addClass('has-success');	  	
			}
			
			if(testsPG == "") {
				$("#testsPG").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#testsPG').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#testsPG").find('.text-danger').remove();
				// success out for form 
				$("#testsPG").closest('.form-group').addClass('has-success');	  	
			}
			
			if(testsDate == "") {
				$("#testsDate").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#testsDate').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#testsDate").find('.text-danger').remove();
				// success out for form 
				$("#testsDate").closest('.form-group').addClass('has-success');	  	
			}
			
			if(testsFormula == "") {
				$("#testsFormula").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#testsFormula').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#testsFormula").find('.text-danger').remove();
				// success out for form 
				$("#testsFormula").closest('.form-group').addClass('has-success');	  	
			}
			
			if(testsMP == "") {
				$("#testsMP").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#testsMP').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#testsMP").find('.text-danger').remove();
				// success out for form 
				$("#testsMP").closest('.form-group').addClass('has-success');	  	
			}
			
			if(testsOutput == "") {
				$("#testsOutput").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#testsOutput').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#testsOutput").find('.text-danger').remove();
				// success out for form 
				$("#testsOutput").closest('.form-group').addClass('has-success');	  	
			}
			
			if(testsResult == "") {
				$("#testsResult").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#testsResult').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#testsResult").find('.text-danger').remove();
				// success out for form 
				$("#testsResult").closest('.form-group').addClass('has-success');	  	
			}
			
			if(testsBy == "") {
				$("#testsBy").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#testsBy').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#testsBy").find('.text-danger').remove();
				// success out for form 
				$("#testsBy").closest('.form-group').addClass('has-success');	  	
			}

			if(testsCustomer && testsPG && testsDate && testsFormula && testsMP && testsOutput && testsResult && testsBy) {
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
			url: 'php_action/fetchSelectedTests.php',
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

				// set the categories
				$("#showTestsCustomer").val(response.tests_company);
				$("#showTestsPG").val(response.tests_pg);
				$("#showTestsDate").val(response.tests_date);
				$("#showTestsFormula").val(response.tests_formula);
				$("#showTestsMP").val(response.tests_mp);
				$("#showTestsOutput").val(response.tests_output);
				$("#showTestsResult").val(response.tests_result);
				$("#showTestsBy").val(response.tests_by);
				
				// add the categories id 
				$(".showCategoriesFooter").after('<input type="hidden" name="showCategoriesId" id="showCategoriesId" value="'+response.tests_id+'" />');
				
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
			url: 'php_action/fetchSelectedTests.php',
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
				$("#editTestsCustomer").val(response.tests_company);
				$("#editTestsPG").val(response.tests_pg);
				$("#editTestsDate").val(response.tests_date);
				$("#editTestsFormula").val(response.tests_formula);
				$("#editTestsMP").val(response.tests_mp);
				$("#editTestsOutput").val(response.tests_output);
				$("#editTestsResult").val(response.tests_result);
				$("#editTestsBy").val(response.tests_by);
				
				// add the categories id 
				$(".editCategoriesFooter").after('<input type="hidden" name="editCategoriesId" id="editCategoriesId" value="'+response.tests_id+'" />');


				// submit of edit categories form
				$("#editCategoriesForm").unbind('submit').bind('submit', function() {
					
					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');
					
					var testsCustomer 	= $("#editTestsCustomer").val();
					var testsPG 		= $("#editTestsPG").val();
					var testsDate		= $("#editTestsDate").val();
					var testsFormula 	= $("#editTestsFormula").val();
					var testsMP 		= $("#editTestsMP").val();
					var testsOutput 	= $("#editTestsOutput").val();
					var testsResult 	= $("#editTestsResult").val();
					var testsBy 		= $("#editTestsBy").val();

					if(testsCustomer == "") {
						$("#editTestsCustomer").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
						$('#editTestsCustomer').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTestsCustomer").find('.text-danger').remove();
						// success out for form 
						$("#editTestsCustomer").closest('.form-group').addClass('has-success');	  	
					}
					
					if(testsPG == "") {
						$("#editTestsPG").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
						$('#editTestsPG').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTestsPG").find('.text-danger').remove();
						// success out for form 
						$("#editTestsPG").closest('.form-group').addClass('has-success');	  	
					}
					
					if(testsDate == "") {
						$("#editTestsDate").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
						$('#editTestsDate').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTestsDate").find('.text-danger').remove();
						// success out for form 
						$("#editTestsDate").closest('.form-group').addClass('has-success');	  	
					}
					
					if(testsFormula == "") {
						$("#editTestsFormula").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
						$('#editTestsFormula').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTestsFormula").find('.text-danger').remove();
						// success out for form 
						$("#editTestsFormula").closest('.form-group').addClass('has-success');	  	
					}
					
					if(testsMP == "") {
						$("#editTestsMP").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
						$('#editTestsMP').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTestsMP").find('.text-danger').remove();
						// success out for form 
						$("#editTestsMP").closest('.form-group').addClass('has-success');	  	
					}
					
					if(testsOutput == "") {
						$("#editTestsOutput").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
						$('#editTestsOutput').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTestsOutput").find('.text-danger').remove();
						// success out for form 
						$("#editTestsOutput").closest('.form-group').addClass('has-success');	  	
					}
					
					if(testsResult == "") {
						$("#editTestsResult").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
						$('#editTestsResult').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTestsResult").find('.text-danger').remove();
						// success out for form 
						$("#editTestsResult").closest('.form-group').addClass('has-success');	  	
					}
					
					if(testsBy == "") {
						$("#editTestsBy").after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
						$('#editTestsBy').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editTestsBy").find('.text-danger').remove();
						// success out for form 
						$("#editTestsBy").closest('.form-group').addClass('has-success');	  	
					}

					if(testsCustomer && testsPG && testsDate && testsFormula && testsMP && testsOutput && testsResult && testsBy) {
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
		alert('HATA! Lutfen sayfayi yenileyin.');
	}
} // /edit categories function

// remove categories function
function removeCategories(categoriesId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectedTests.php',
		type: 'post',
		data: {categoriesId: categoriesId},
		dataType: 'json',
		success:function(response) {			

			// remove categories btn clicked to remove the categories function
			$("#removeCategoriesBtn").unbind('click').bind('click', function() {
				// remove categories btn
				$("#removeCategoriesBtn").button('loading');

				$.ajax({
					url: 'php_action/removeTests.php',
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