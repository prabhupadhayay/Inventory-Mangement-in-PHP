<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$customerId = $_POST['customerId'];
	$customerName 		= $_POST['editCustomerName']; 
  $contact 			= $_POST['editcontact'];
  

				
	$sql = "UPDATE customer SET customer_name = '$customerName', customer_contact = '$contact' WHERE id = $customerId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
