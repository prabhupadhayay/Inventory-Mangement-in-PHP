<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>


<!DOCTYPE html>
<html lang = "en">
	<head>
	</head>
<body>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
			<li><a href="dashboard.php">Home</a></li>
			<li class="active">Customer</li>
		</ol>

        <div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Customer</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
            <div class="remove-messages"></div>
		
			
				<div>
					<form class = "form-inline" id="customerform">
                    <div class="div-action pull pull-right" style="padding-bottom:20px; ">
						<div class = "form-group">
							<label>Customer Name:</label>
							<input type  = "text" id = "customername" class = "form-control" placeholder="customer name">
						</div>
						<div class = "form-group">
							<label>Customer Contact:</label>
							<input type="number"  oninput="this.value = Math.abs(this.value)" class="form-control" id="customercontact" placeholder="contact"  autocomplete="off">
                        </div>
                        
                        <div class="div-action pull pull-right" style="padding-bottom:20px; margin-left:20px;">
							<button type = "button" id="addnew" class = "btn btn-primary" autocomplete="off" ><span class = "glyphicon glyphicon-plus"></span> Add</button>
                         </div>
                         </div> 
                        
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
            <div id="userTable"></div>
</div>
			</div>
		</div>
	</div>
</body>

<script type = "text/javascript">
	$(document).ready(function(){
		showCustomer();
		//Add New
		$('#navCustomer').addClass('active');
		$(document).on('click', '#addnew', function(){
			if ($('#customername').val()=="" || $('#customercontact').val()=="")    {
				alert('Please input data first');
			}	else{
			$customername=$('#customername').val();
            $customercontact=$('#customercontact').val();
            		
				$.ajax({
					type: "POST",
					url: "addnewcustomer.php",
					data: {
						customername: $customername,
                        customercontact: $customercontact,
                      
						add: 1,
					},
					success: function(){
						showCustomer();
						$('#customerform')[0].reset();
					}
				});
			}
		});
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
				$.ajax({
					type: "POST",
					url: "deletecustomer.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(){
						showCustomer();
					}
				});
		});
		//Update
		$(document).on('click', '.updatecustomer', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$ucustomername=$('#ucustomername'+$uid).val();
            $ucustomercontact=$('#ucustomercontact'+$uid).val();
           
				$.ajax({
					type: "POST",
					url: "updatecustomer.php",
					data: {
						id: $uid,
						customername: $ucustomername,
                        customercontact: $ucustomercontact,
                        
						edit: 1,
					},
					success: function(){
						showCustomer();
					}
				});
		});
 
	});
 
	//Showing our Table
	function showCustomer(){
		$.ajax({
			url: 'show_customer.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
 

	

</script>
</html>