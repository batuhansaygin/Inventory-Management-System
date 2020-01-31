var manageProductTable;

$(document).ready(function() {
	// top nav bar 
	$('#navProduct').addClass('active');
	
	// Test Tarihi datepicker
	$("#testsDate").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#editTestsDate").datepicker({ dateFormat: 'yy-mm-dd' });
	
	// selectize
	var $select = $('#testsCustomer').selectize({
		sortField: 'text'
	});
	var control = $select[0].selectize;
	
	// Individual column searching (text inputs) Data Table
	
    $('#manageProductTable tfoot th').each( function () {
        var title = $('#manageProductTable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
  
    // DataTable
    manageProductTable = $('#manageProductTable').DataTable( {
        "ajax" : "php_action/fetchProduct.php",
		"order": [],
		colReorder: true,
        scrollX: true,
		scrollY: '50vh',
        scrollCollapse: true,
        paging: false
    } );
      
    $( manageProductTable.table().container() ).on( 'keyup change', 'tfoot input', function () {
       manageProductTable
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );
	// Individual column searching (text inputs) Data Table
	
	// Show / hide columns dynamically Data Table
	$('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
		
        // Get the column API object
        var column = manageProductTable.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
	// Show / hide columns dynamically Data Table
	
    // Column Highlight
    $('#manageProductTable tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );
	// Column Highlight

	// add product modal btn clicked
	$("#addProductModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitProductForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		$("#productImage").fileinput({
	      overwriteInitial: true,
		    maxFileSize: 2500,
		    showClose: false,
		    showCaption: false,
		    browseLabel: '',
		    removeLabel: '',
		    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
		    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
		    removeTitle: 'Cancel or reset changes',
		    elErrorContainer: '#kv-avatar-errors-1',
		    msgErrorClass: 'alert alert-block alert-danger',
		    defaultPreviewContent: '<img src="assests/images/photo_default.png" alt="Default Image" style="width:100%;">',
		    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
	  		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
			});   

		// submit product form
		$("#submitProductForm").unbind('submit').bind('submit', function() {

			// remove the error text
			$(".text-danger").remove();
			// remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');

			// form validation
			// var productImage 	= $("#productImage").val();
			var testsCustomer	= $("#testsCustomer").val();
			var testsPG      	= $("#testsPG").val();
			var testsDate    	= $("#testsDate").val();
			var testsFormula  	= $("#testsFormula").val();
			var testsMP      	= $("#testsMP").val();
			var testsOutput  	= $("#testsOutput").val();
			var testsResult  	= $("#testsResult").val();
			var testsBy      	= $("#testsBy").val();
	
			/*
			if(productImage == "") {
				$("#productImage").closest('.center-block').after('<p class="text-danger">Bu kısım boş bırakılamaz.</p>');
				$('#productImage').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#productImage").find('.text-danger').remove();
				// success out for form 
				$("#productImage").closest('.form-group').addClass('has-success');	  	
			}	// /else
			*/

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
				// submit loading button
				$("#createProductBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {

						if(response.success == true) {
							// submit loading button
							$("#createProductBtn").button('reset');
							
							$("#submitProductForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
							
							// clear selectize state
							control.clear();

							// shows a successful message after operation
							$('#add-product-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          // reload the manage student table
							manageProductTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success
						
					} // /success function
				}); // /ajax function
			}	 // /if validation is ok 					

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked

}); // document.ready fucntion

function editProduct(productId = null) {

	if(productId) {
		$("#productId").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedProduct.php',
			type: 'post',
			data: {productId: productId},
			dataType: 'json',
			success:function(response) {		
			// alert(response.product_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				

				$("#getProductImage").attr('src', 'stock/'+response.tests_file);

				$("#editProductImage").fileinput({		      
				});

				// product id 
				$(".editProductFooter").append('<input type="hidden" name="productId" id="productId" value="'+response.tests_id+'" />');				
				$(".editProductPhotoFooter").append('<input type="hidden" name="productId" id="productId" value="'+response.tests_id+'" />');				
				
				$("#editTestsCustomer").val(response.tests_company);
				$("#editTestsPG").val(response.tests_pg);
				$("#editTestsDate").val(response.tests_date);
				$("#editTestsFormula").val(response.tests_formula);
				$("#editTestsMP").val(response.tests_mp);
				$("#editTestsOutput").val(response.tests_output);
				$("#editTestsResult").val(response.tests_result);
				$("#editTestsBy").val(response.tests_by);

				// update the product data function
				$("#editProductForm").unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');
					
					// form validation
					// var productImage 	= $("#editProductImage").val();
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
						// submit loading button
						$("#editProductBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editProductBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-product-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageProductTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the product data function

				// update the product image				
				$("#updateProductImageForm").unbind('submit').bind('submit', function() {					
					// form validation
					var productImage = $("#editProductImage").val();					
					
					if(productImage == "") {
						$("#editProductImage").closest('.center-block').after('<p class="text-danger">Product Image field is required</p>');
						$('#editProductImage').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editProductImage").find('.text-danger').remove();
						// success out for form 
						$("#editProductImage").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(productImage) {
						// submit loading button
						$("#editProductImageBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								
								if(response.success == true) {
									// submit loading button
									$("#editProductImageBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-productPhoto-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageProductTable.ajax.reload(null, true);

									$(".fileinput-remove-button").click();

									$.ajax({
										url: 'php_action/fetchProductImageUrl.php?i='+productId,
										type: 'post',
										success:function(response) {
										$("#getProductImage").attr('src', response);		
										}
									});																		

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // /update the product image

			} // /success function
		}); // /ajax to fetch product image

				
	} else {
		alert('error please refresh the page');
	}
} // /edit product function

// remove product 
function removeProduct(productId = null) {
	if(productId) {
		// remove product button clicked
		$("#removeProductBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeProductBtn").button('loading');
			$.ajax({
				url: 'php_action/removeProduct.php',
				type: 'post',
				data: {productId: productId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeProductBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeProductModal").modal('hide');

						// update the product table
						manageProductTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeProductMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if productid
} // /remove product function

function clearForm(oForm) {
	// var frm_elements = oForm.elements;									
	// console.log(frm_elements);
	// 	for(i=0;i<frm_elements.length;i++) {
	// 		field_type = frm_elements[i].type.toLowerCase();									
	// 		switch (field_type) {
	// 	    case "text":
	// 	    case "password":
	// 	    case "textarea":
	// 	    case "hidden":
	// 	    case "select-one":	    
	// 	      frm_elements[i].value = "";
	// 	      break;
	// 	    case "radio":
	// 	    case "checkbox":	    
	// 	      if (frm_elements[i].checked)
	// 	      {
	// 	          frm_elements[i].checked = false;
	// 	      }
	// 	      break;
	// 	    case "file": 
	// 	    	if(frm_elements[i].options) {
	// 	    		frm_elements[i].options= false;
	// 	    	}
	// 	    default:
	// 	        break;
	//     } // /switch
	// 	} // for
}