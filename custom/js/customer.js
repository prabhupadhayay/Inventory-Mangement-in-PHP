var manageCustomerTable;

$(document).ready(function() {
	// top nav bar 
	$('#navCustomer').addClass('active');
	// manage product data table
	manageCustomerTable = $('#manageCustomerTable').DataTable({
		'ajax': 'php_action/fetchCustomer.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addCustomerModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitCustomerForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// $("#productImage").fileinput({
	 //      overwriteInitial: true,
		//     maxFileSize: 2500,
		//     showClose: false,
		//     showCaption: false,
		//     browseLabel: '',
		//     removeLabel: '',
		//     browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
		//     removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
		//     removeTitle: 'Cancel or reset changes',
		//     elErrorContainer: '#kv-avatar-errors-1',
		//     msgErrorClass: 'alert alert-block alert-danger',
		//     defaultPreviewContent: '<img src="assests/images/photo_default.png" alt="Profile Image" style="width:100%;">',
		//     layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
	 //  		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
		// 	});   

		// submit product form
		$("#submitCustomerForm").unbind('submit').bind('submit', function() {

			// form validation
			// var productImage = $("#productImage").val();
			var customerName = $("#customerName").val();
			var contact = $("#contact").val();
			// var rate = $("#rate").val();
			// var brandName = $("#brandName").val();
			// var categoryName = $("#categoryName").val();
			// var productStatus = $("#productStatus").val();
	
			// if(productImage == "") {
			// 	$("#productImage").closest('.center-block').after('<p class="text-danger">Product Image field is required</p>');
			// 	$('#productImage').closest('.form-group').addClass('has-error');
			// }	else {
			// 	// remov error text field
			// 	$("#productImage").find('.text-danger').remove();
			// 	// success out for form 
			// 	$("#productImage").closest('.form-group').addClass('has-success');	  	
			// }	// /else

			if(customerName == "") {
				$("#customerName").after('<p class="text-danger">Customer Name field is required</p>');
				$('#customerName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#customerName").find('.text-danger').remove();
				// success out for form 
				$("#customerName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(contact == "") {
				$("#contact").after('<p class="text-danger">Contact field is required</p>');
				$('#contact').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#contact").find('.text-danger').remove();
				// success out for form 
				$("#contact").closest('.form-group').addClass('has-success');	  	
			}	// /else

			// if(rate == "") {
			// 	$("#rate").after('<p class="text-danger">Rate field is required</p>');
			// 	$('#rate').closest('.form-group').addClass('has-error');
			// }	else {
			// 	// remov error text field
			// 	$("#rate").find('.text-danger').remove();
			// 	// success out for form 
			// 	$("#rate").closest('.form-group').addClass('has-success');	  	
			// }	// /else

			// if(brandName == "") {
			// 	$("#brandName").after('<p class="text-danger">Brand Name field is required</p>');
			// 	$('#brandName').closest('.form-group').addClass('has-error');
			// }	else {
			// 	// remov error text field
			// 	$("#brandName").find('.text-danger').remove();
			// 	// success out for form 
			// 	$("#brandName").closest('.form-group').addClass('has-success');	  	
			// }	// /else

			// if(categoryName == "") {
			// 	$("#categoryName").after('<p class="text-danger">Category Name field is required</p>');
			// 	$('#categoryName').closest('.form-group').addClass('has-error');
			// }	else {
			// 	// remov error text field
			// 	$("#categoryName").find('.text-danger').remove();
			// 	// success out for form 
			// 	$("#categoryName").closest('.form-group').addClass('has-success');	  	
			// }	// /else

			// if(productStatus == "") {
			// 	$("#productStatus").after('<p class="text-danger">Product Status field is required</p>');
			// 	$('#productStatus').closest('.form-group').addClass('has-error');
			// }	else {
			// 	// remov error text field
			// 	$("#productStatus").find('.text-danger').remove();
			// 	// success out for form 
			// 	$("#productStatus").closest('.form-group').addClass('has-success');	  	
			// }	// /else

			if( customerName && contact ) {
				// submit loading button
				$("#createCustomerBtn").button('loading');

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
							$("#createCustomerBtn").button('reset');
							
							$("#submitCustomerForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-customer-messages').html('<div class="alert alert-success">'+
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
							manageCustomerTable.ajax.reload(null, true);

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
	

	// remove product 	

}); // document.ready fucntion

function editCustomer(customerId = null) {

	if(customerId) {
		$("#customerId").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedCustomer.php',
			type: 'post',
			data: {customerId: customerId},
			dataType: 'json',
			success:function(response) {		
			// alert(response.product_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				

				// $("#getProductImage").attr('src', 'stock/'+response.product_image);

				// $("#editProductImage").fileinput({		      
				// });  

				// $("#editProductImage").fileinput({
		  //     overwriteInitial: true,
			 //    maxFileSize: 2500,
			 //    showClose: false,
			 //    showCaption: false,
			 //    browseLabel: '',
			 //    removeLabel: '',
			 //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			 //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			 //    removeTitle: 'Cancel or reset changes',
			 //    elErrorContainer: '#kv-avatar-errors-1',
			 //    msgErrorClass: 'alert alert-block alert-danger',
			 //    defaultPreviewContent: '<img src="stock/'+response.product_image+'" alt="Profile Image" style="width:100%;">',
			 //    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
		  // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
				// });  

				// product id 
				$(".editCustomerFooter").append('<input type="hidden" name="customerId" id="customerId" value="'+response.customer_id+'" />');				
				// $(".editProductPhotoFooter").append('<input type="hidden" name="productId" id="productId" value="'+response.product_id+'" />');				
				
				// product name
				$("#editCustomerName").val(response.customer_name);
				// quantity
				$("#editContact").val(response.contact);
				// rate
				// $("#editRate").val(response.rate);
				// // brand name
				// $("#editBrandName").val(response.brand_id);
				// // category name
				// $("#editCategoryName").val(response.categories_id);
				// // status
				// $("#editProductStatus").val(response.active);

				// update the product data function
				$("#editCustomerForm").unbind('submit').bind('submit', function() {

					// form validation
					// var productImage = $("#editProductImage").val();
					var customerName = $("#editCustomerName").val();
					var contact = $("#editContact").val();
					// var rate = $("#editRate").val();
					// var brandName = $("#editBrandName").val();
					// var categoryName = $("#editCategoryName").val();
					// var productStatus = $("#editProductStatus").val();
								

					if(customerName == "") {
						$("#editCustomerName").after('<p class="text-danger">Customer Name field is required</p>');
						$('#editCustomerName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editCustomerName").find('.text-danger').remove();
						// success out for form 
						$("#editCustomerName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(contact == "") {
						$("#editContact").after('<p class="text-danger">Quantity field is required</p>');
						$('#editContact').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editContact").find('.text-danger').remove();
						// success out for form 
						$("#editContact").closest('.form-group').addClass('has-success');	  	
					}	// /else

					// if(rate == "") {
					// 	$("#editRate").after('<p class="text-danger">Rate field is required</p>');
					// 	$('#editRate').closest('.form-group').addClass('has-error');
					// }	else {
					// 	// remov error text field
					// 	$("#editRate").find('.text-danger').remove();
					// 	// success out for form 
					// 	$("#editRate").closest('.form-group').addClass('has-success');	  	
					// }	// /else

					// if(brandName == "") {
					// 	$("#editBrandName").after('<p class="text-danger">Brand Name field is required</p>');
					// 	$('#editBrandName').closest('.form-group').addClass('has-error');
					// }	else {
					// 	// remov error text field
					// 	$("#editBrandName").find('.text-danger').remove();
					// 	// success out for form 
					// 	$("#editBrandName").closest('.form-group').addClass('has-success');	  	
					// }	// /else

					// if(categoryName == "") {
					// 	$("#editCategoryName").after('<p class="text-danger">Category Name field is required</p>');
					// 	$('#editCategoryName').closest('.form-group').addClass('has-error');
					// }	else {
					// 	// remov error text field
					// 	$("#editCategoryName").find('.text-danger').remove();
					// 	// success out for form 
					// 	$("#editCategoryName").closest('.form-group').addClass('has-success');	  	
					// }	// /else

					// if(productStatus == "") {
					// 	$("#editProductStatus").after('<p class="text-danger">Product Status field is required</p>');
					// 	$('#editProductStatus').closest('.form-group').addClass('has-error');
					// }	else {
					// 	// remov error text field
					// 	$("#editProductStatus").find('.text-danger').remove();
					// 	// success out for form 
					// 	$("#editProductStatus").closest('.form-group').addClass('has-success');	  	
					// }	// /else					

					if(customerName && contact ) {
						// submit loading button
						$("#editCustomerBtn").button('loading');

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
									$("#editCustomerBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-customer-messages').html('<div class="alert alert-success">'+
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
									manageCustomerTable.ajax.reload(null, true);

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
		// 		$("#updateProductImageForm").unbind('submit').bind('submit', function() {					
		// 			// form validation
		// 			var productImage = $("#editProductImage").val();					
					
		// 			if(productImage == "") {
		// 				$("#editProductImage").closest('.center-block').after('<p class="text-danger">Product Image field is required</p>');
		// 				$('#editProductImage').closest('.form-group').addClass('has-error');
		// 			}	else {
		// 				// remov error text field
		// 				$("#editProductImage").find('.text-danger').remove();
		// 				// success out for form 
		// 				$("#editProductImage").closest('.form-group').addClass('has-success');	  	
		// 			}	// /else

		// 			if(productImage) {
		// 				// submit loading button
		// 				$("#editProductImageBtn").button('loading');

		// 				var form = $(this);
		// 				var formData = new FormData(this);

		// 				$.ajax({
		// 					url : form.attr('action'),
		// 					type: form.attr('method'),
		// 					data: formData,
		// 					dataType: 'json',
		// 					cache: false,
		// 					contentType: false,
		// 					processData: false,
		// 					success:function(response) {
								
		// 						if(response.success == true) {
		// 							// submit loading button
		// 							$("#editProductImageBtn").button('reset');																		

		// 							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
		// 							// shows a successful message after operation
		// 							$('#edit-productPhoto-messages').html('<div class="alert alert-success">'+
		// 		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		// 		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		// 		          '</div>');

		// 							// remove the mesages
		// 		          $(".alert-success").delay(500).show(10, function() {
		// 								$(this).delay(3000).hide(10, function() {
		// 									$(this).remove();
		// 								});
		// 							}); // /.alert

		// 		          // reload the manage student table
		// 							manageProductTable.ajax.reload(null, true);

		// 							$(".fileinput-remove-button").click();

		// 							$.ajax({
		// 								url: 'php_action/fetchProductImageUrl.php?i='+productId,
		// 								type: 'post',
		// 								success:function(response) {
		// 								$("#getProductImage").attr('src', response);		
		// 								}
		// 							});																		

		// 							// remove text-error 
		// 							$(".text-danger").remove();
		// 							// remove from-group error
		// 							$(".form-group").removeClass('has-error').removeClass('has-success');

		// 						} // /if response.success
								
		// 					} // /success function
		// 				}); // /ajax function
		// 			}	 // /if validation is ok 					

		// 			return false;
		// 		}); // /update the product image

		// 	} // /success function
		// }); // /ajax to fetch product image

				
	// } else {
	// 	alert('error please refresh the page');
			}
 }); // /edit product function
	
// remove product 
function removeCustomer(customerId = null) {
	if(customerId) {
		// remove product button clicked
		$("#removeCustomerBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeCustomerBtn").button('loading');
			$.ajax({
				url: 'php_action/removeCustomer.php',
				type: 'post',
				data: {customerId: customerId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeCustomerBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeCustomerModal").modal('hide');

						// update the product table
						manageCustomerTable.ajax.reload(null, false);

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
						$(".removeCustomerMessages").html('<div class="alert alert-success">'+
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
	}}
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