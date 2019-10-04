<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$customerName 		= $_POST['customerName'];
  // $productImage 	= $_POST['productImage'];
  $contact 			= $_POST['contact'];
//   $rate 					= $_POST['rate'];
//   $brandName 			= $_POST['brandName'];
//   $categoryName 	= $_POST['categoryName'];
//   $productStatus 	= $_POST['productStatus'];

	// $type = explode('.', $_FILES['productImage']['name']);
	// $type = $type[count($type)-1];		
	// $url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	// if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	// 	if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
	// 		if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
				
				$sql = "INSERT INTO customer (customer_name, customer_contact) 
				VALUES ('$customerName', '$contact' )";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

	// 		}	else {
	// 			return false;
	// 		}	// /else	
	// 	} // if
	// } // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST