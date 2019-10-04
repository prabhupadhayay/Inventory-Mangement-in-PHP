<?php 	

require_once 'core.php';


$userId=  $_SESSION['userId'];
$sql="SELECT  timezone FROM users where user_id='$userId'";
$result= $connect->query($sql);
$output= array('data'=> array());
if($result-> num_rows >0){
	while($row = $result->fetch_assoc()) {
	$timezone= $row['timezone'];
}
}
else{
	echo "no";
}


// $sql = "SELECT  order_date FROM orders where order_status=1";
// $result = $connect->query($sql);



// $output = array('data' => array());
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
// 		//  echo $row["order_date"]. "<br>";
// // 		 date_default_timezone_set("UTC");
// // date_default_timezone_get()."<br>"; //UTC
// $datetime = $row['order_date'];
 

// date_default_timezone_set("UTC");
// date_default_timezone_get()."<br>"; //UTC
// $datetime1 = $datetime;
// $asia_timestamp1 = strtotime($datetime1);
// date_default_timezone_set($timezone);
// date_default_timezone_get()."<br>"; //UTC
// echo " ".$asia_time = date("Y-m-d H:i:s", $asia_timestamp1)."<br>";


// $asia_timestamp1 = strtotime($datetime);
// date_default_timezone_set($timezone);
// date_default_timezone_get()."<br>"; //UTC
// echo "Local time: ".$asia_time = date("Y-m-d H:i:s", $asia_timestamp1);
//     }
// } else {
//     echo "0 results";
// }
// print_r($datetime);


$sql = "SELECT order_id, order_date, client_name, client_contact, payment_status FROM orders WHERE order_status = 1";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];
$time= $row[1];
 	 $countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 	// active 
 	if($row[4] == 1) { 		
 		$paymentStatus = "<label class='label label-success'>Full Payment</label>";
 	} else if($row[4] == 2) { 		
 		$paymentStatus = "<label class='label label-info'>Advance Payment</label>";
 	} else { 		
 		$paymentStatus = "<label class='label label-warning'>No Payment</label>";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="orders.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    
	    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$orderId.')"> <i class="glyphicon glyphicon-save"></i> Payment</a></li>

	    <li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';		

	date_default_timezone_set("UTC");
	date_default_timezone_get()."<br>"; //UTC
	$datetime1 = $time;
	$asia_timestamp1 = strtotime($datetime1);
	date_default_timezone_set("$timezone");
	date_default_timezone_get()."<br>"; //UTC
	  " ".$asia_time = date("Y-m-d H:i:s", $asia_timestamp1)."<br>";


 	$output['data'][] = array( 		
 		// image
 		$x,
 		// order date
 		$asia_time,
 		// client name
 		$row[2], 
 		// client contact
 		$row[3], 		 	
 		$itemCountRow, 		 	
 		$paymentStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

//   require_once 'php_action/fetchtimezone.php';
//   print_r($asia_time);
  
$connect->close();

echo json_encode($output);
?>
  
  

