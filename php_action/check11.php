<?php 	

require_once 'core.php';

// $valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);
// if($_POST) {	
	// $date = date('Y-m-d H:i:s');
	$orderDate 						= gmdate('Y-m-d H:i:s');	
  $clientName 					='raman' ;
  $clientContact 				= '2389832928';
  $subTotalValue 				= '1212';
  $vatValue 						=	'12312';
  $totalAmountValue     = '121212';
  $discount 						= '12121';
  $grandTotalValue 			= '12121';
  $paid 								= '1121';
  $dueValue 						= '12121';
  $paymentType 					= '12212';
  $paymentStatus 				= '2';

				
	$sql = "INSERT INTO orders (order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status, order_status) VALUES ('$orderDate', '$clientName', '$clientContact', '$subTotalValue', '$vatValue', '$totalAmountValue', '$discount', '$grandTotalValue', '$paid', '$dueValue', $paymentType, $paymentStatus, 1)";
	
	
	$order_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$order_id = $connect->insert_id;
		$valid['order_id'] = $order_id;	

		$orderStatus = true;
    }
    echo $order_id;
		
	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_name = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];							
				// update product table
				$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_name = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable);
				$sum = "SELECT product_id from product where product_name= '".$_POST['productName'][$x]."'";
				$result1 = $connect->query($sum);
				
				 
				 while  ($row= mysqli_fetch_array($result1)){
				 $zone= $row['product_id'];
				} // if num_rows
				//  echo $zone;
				 

				// add into order_item
				$orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, rate, total, order_item_status) 
				VALUES ('$order_id','$zone', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."', 1)";

				$connect->query($orderItemSql);		

				// if($x == count($zone)) {
				// 	$orderItemStatus = true;
				// }		
		} // while	
	} // /for quantity

// 	$valid['success'] = true;
// 	$valid['messages'] = "Successfully Added";		
	
// 	$connect->close();

// 	echo json_encode($valid);
 
// } // /if $_POST
// echo json_encode($valid);

?>



